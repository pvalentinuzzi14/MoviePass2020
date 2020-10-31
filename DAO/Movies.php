<?php 
namespace DAO;

use Models\Movie as Movie;
use DAO\Connection;
use PDOException;

class Movies{
	
	private $connection;

	public function retrieveDurationOneMovieFromApi($id) {
        $json = file_get_contents("https://api.themoviedb.org/3/movie/" . $id . "?api_key=" . API_KEY);
        $APIDataArray = json_decode($json, true);
        $runtime = $APIDataArray["runtime"];
        if($runtime == null) {
            $runtime = 90;
        }
        return $runtime;
    }

    public function retrieveTrailerOneMovieFromApi($id) {
        $json = file_get_contents("https://api.themoviedb.org/3/movie/" . $id . "/videos?api_key=" . API_KEY);
        $APIDataArray = json_decode($json, true);
        $link = $APIDataArray["results"][0]["key"];
        return "https://www.youtube.com/embed/" . $link;
    }

	/*----------------------------- DB -----------------------------*/
	public function add(Movie $item)
	{
		$value=0;
			try {
				$query = "INSERT INTO cinemas (id_api_movie,name_movie,overview,poster,background,score,uploading_date) 
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
         
					$queryIdBd = "SELECT p.id_movie FROM movies p where p.id_api_movie=" . $item->getID();
					$resultSet = $this->connection->execute($queryIdBd);
					$idBd = $resultSet[0]["id_movie"];
	
					$parametersGenres["id_movie"] = $idBd;
					$parametersGenres["id_genre"] = $genre->getIdBd();
	
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
		$parameters['id'] = $id;
		$sql= "SELECT * FROM genres_per_movie WHERE id_movie = :id";
		$this->connection = Connection::getInstance();
		$statement = $this->connection->execute($sql);
		foreach($statement as $genreNumber){
			array_push($array,$genreNumber);
		}
		return $array;
	}

	//crea model movie 
	private function create($statementRes)
	{
		$movie = new Movie();
		$movie->setId($statementRes['id_api_movie']);
		$movie->setScore($statementRes['score']);
		$movie->setTitle($statementRes['name_movie']);
		$movie->setOverview($statementRes['overview']);
		$movie->setBackground($statementRes['background']);
		$movie->setRelease_date($statementRes['uploading_date']);
		$movie->setImage($statementRes['poster']);
		$movie->setGenre_ids($this->getGenresById($statementRes['id_movie']));
		return $movie;
	}

	public function getOne($id)
	{
		$movie = null;

		try {
			$parameters['id_movie'] = $id; 

			$sql = "SELECT * FROM movie WHERE id_movie=:id";
			
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql);

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
	public function RetrieveDataFromApi() 
	{
		$jsonContent = file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=es-ES&sort_by=popularity.desc&include_adult=false&include_video=false&page=1");
		$arrayToDecode =($jsonContent) ? json_decode($jsonContent,true) : array();
		$arrayOfMovies = array();
		
		foreach($arrayToDecode['results'] as $value):
			$movie =$this->createFromApi($value);
			array_push($arrayOfMovies,$movie);
		endforeach;	

		return $arrayOfMovies;
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

		
}

 ?>