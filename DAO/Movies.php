<?php 
namespace DAO;

use Models\Movie as Movie;
use DAO\Connection;
use DAO\Genres as D_genres;
use Models\Genre;
use PDOException;

class Movies{
	
	private $connection;

	/*----------------------------- DB -----------------------------*/
	public function add(Movie $item)
	{
		$value=0;
			try {
				$query = "INSERT INTO movies (id_api_movie,name_movie,overview,poster,background,score,uploading_date) 
				VALUES (:id_api_movie,:name_movie,:overview,:poster,:background,:score,:uploading_date)";
				$parameters["id_api_movie"] = $item->getId();
				$parameters["name_movie"] = $item->getTitle();
				$parameters["overview"] = $item->getOverview();
				$parameters["poster"] = $item->getImage();
				$parameters["background"] = $item->getBackground();
				$parameters["score"] = $item->getScore();
				$parameters["uploading_date"] = $item->getRelease_date();
				$this->connection = Connection::getInstance();
				$value = $this->connection->ExecuteNonQuery($query,$parameters);

				$arrayOfGenres = $item->getGenre_ids();
				foreach($arrayOfGenres as $genre) {
         
					$queryIdBd = "SELECT m.id_movie FROM movies m where m.id_api_movie=" . $item->getId();
					$resultSet = $this->connection->execute($queryIdBd);
					$idBd = $resultSet[0]["id_movie"];

					$queryIdGenre = "SELECT g.id_genre FROM genres g where g.id_api_genre=" . $genre;
					$resultSetGenre = $this->connection->execute($queryIdGenre);
					$idBdGenre = $resultSetGenre[0]["id_genre"];


					$parametersGenres["id_movie"] = $idBd;
					$parametersGenres["id_genre"] = $idBdGenre;
	
					$queryGenres = "INSERT INTO genres_per_movie (id_movie, id_genre) VALUES (:id_movie, :id_genre)";
	
					$value = $this->connection->executeNonQuery($queryGenres, $parametersGenres);
				}

			} catch (PDOException $e) {
				throw $e;
			}
			return $value;
	}

	public function RetrieveDB(){
		$moviesList = array();

		try {
			$sql = "SELECT  * FROM movies";
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql);

			if(!empty($statement))
			{
				foreach ($statement as $value) {
					$movieAux = $this->create($value);
					array_push($moviesList,$movieAux);
				}
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $moviesList;
    }

	//busca en genres_per_movie segun id_movie y devuelve los id de generos incluidos en la pelicula
	private function getGenresById($id)
	{
		$array = array();
		//$parameters['id']=$id;
		$sql= "SELECT g.id_api_genre FROM genres_per_movie gxm INNER JOIN genres g ON gxm.id_genre = g.id_genre WHERE gxm.id_movie =".$id;
		$this->connection = Connection::getInstance();
		$statement = $this->connection->execute($sql);
		foreach($statement as $genreNumber){
			array_push($array,$genreNumber['id_api_genre']);
		}
		return $array;
	}

	//crea model movie 
	private function create($statementRes)
	{
		$array = array();
		$movie = new Movie();
		$movie->setId($statementRes['id_api_movie']);
		$movie->setIdBd($statementRes['id_movie']);
		$movie->setScore($statementRes['score']);
		$movie->setTitle($statementRes['name_movie']);
		$movie->setOverview($statementRes['overview']);
		$movie->setBackground($statementRes['background']);
		$movie->setRelease_date($statementRes['uploading_date']);
		$movie->setImage($statementRes['poster']);
		$array = $this->getGenresById($statementRes['id_movie']);
		$movie->setGenre_ids($array);
		return $movie;
	}

	public function getOne($id)
	{
		$movie = null;

		try {
			$parameters['id'] = $id; 

			$sql = "SELECT * FROM movies WHERE id_movie=:id";
			
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql,$parameters);

			if(!empty($statement))
			{
				$movie = $this->create($statement[0]);
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $movie;
	}



	/*----------------------------- API -----------------------------*/
	public function insertFromApiToDb() 
	{
		$jsonContent = file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=es-ES&sort_by=popularity.desc&include_adult=false&include_video=false&page=1");
		$arrayToDecode =($jsonContent) ? json_decode($jsonContent,true) : array();
		
		foreach($arrayToDecode['results'] as $value):
			$movie =$this->createFromApi($value);
			$flag = $this->controlMovie($movie->getId());
			if($flag == false){
				$this->add($movie);
			}
		endforeach;	
	}

	private function createFromApi($statementRes)
	{
		$movie = new Movie();
		$movie->setId($statementRes['id']);
		$movie->setScore($statementRes['vote_average']);
		$movie->setTitle($statementRes['title']);
		$movie->setOverview($statementRes['overview']);
		$movie->setBackground("https://image.tmdb.org/t/p/original/".$statementRes['backdrop_path']);
		$movie->setRelease_date($statementRes['release_date']);
		$movie->setImage("https://image.tmdb.org/t/p/w500/".$statementRes['poster_path']);
		$movie->setGenre_ids($statementRes['genre_ids']);
		return $movie;
	}

	public function retrieveDurationOneMovieFromApi($id) {
        $json = file_get_contents("https://api.themoviedb.org/3/movie/" . $id . "?api_key=" . API_KEY);
        $APIDataArray = json_decode($json, true);
        $runtime = $APIDataArray["runtime"];
        if($runtime == null) {
            $runtime = 90;
        }
        return $runtime;
    }
	
	
    public function retrieveMoviesAvailable() {
        $showtimeList = array();
        try
        {
            $query = "SELECT * FROM movies m INNER JOIN (
                SELECT date_showtime AS 'fecha',id_movie AS 'idMovie',COUNT(id_movie) 
                FROM showtimes GROUP BY id_movie
                ) disp ON m.id_movie = disp.idMovie WHERE DATEDIFF(disp.fecha,CURDATE())";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $showtime = $this->create($row);
                    array_push($showtimeList, $showtime);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $showtimeList;
    }
	
	
	private function controlMovie($id)
	{
		$flag=null;
		
		try{
			$parameters['id'] = $id; 
			$sql= "SELECT id_api_movie FROM movies WHERE id_api_movie = :id";
			$this->connection = Connection::getInstance();
			$row = $this->connection->execute($sql,$parameters);
			if($row == null){
				$flag = false;
			}else{
				$flag=true;
			}
			
		}catch (PDOException $e)
        {
            throw $e;
        }
		return $flag;
	}
	

}

 ?>