<?php 
namespace DAO;

use Models\Movie as Movie;

class Movies{
	
	private $list = array();

	/*public function add($item){
		$this->retrieveData();
		array_push($this->list, $item);
		$this->saveData();
	}*/

	public function getAll(){
		$this->retrieveData();
		return $this->list;
    }
    

	public function saveData(){
		
		// $arrayToEncode = json_decode(file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1"),true);
		$arrayToEncode=array();
		foreach ($this->list as $movie) {
			$valueArray['title'] = $movie->getTitle();
			$valueArray['vote_average'] = $movie->getVote_average();
            $valueArray['overview'] = $movie->getOverview();
            $valueArray['release_date'] = $movie->getRelease_date();
			$valueArray['genre_ids'] = $movie->getGenre_ids();
			$valueArray['id'] = $movie->getId();
			$valueArray['poster_path'] = "http://image.tmdb.org/t/p/w300".$movie->getImage();

			array_push($arrayToEncode, $valueArray);
			
		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

		file_put_contents(dirname(__DIR__).'/Data/movies.json', $jsonContent);
    }
    
	public function retrieveData(){
		$this->list = array();
		
		if(file_exists(dirname(__DIR__).'/Data/movies.json')){
			
			$jsonContent =file_get_contents(dirname(__DIR__).'/Data/movies.json');

			$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

			foreach ($arrayToDecode as $valueArray) {
				
				$movie = new Movie($valueArray['title'],$valueArray['vote_average'],$valueArray['overview'],$valueArray['release_date'],$valueArray['genre_ids'],$valueArray['id'],$valueArray['poster_path']);
				
				array_push($this->list, $movie);
			}
		}
	}

	public function refreshData() {
		$this->list = array();
		
		// if(file_exists(dirname(__DIR__).'/Data/movies.json')){
			
			$jsonContent =file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=es-ES&sort_by=popularity.desc&include_adult=false&include_video=false&page=1");

			$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

			foreach ($arrayToDecode['results'] as $valueArray) {
				
				$movie = new Movie($valueArray['title'],$valueArray['vote_average'],$valueArray['overview'],$valueArray['release_date'],$valueArray['genre_ids'],$valueArray['id'],$valueArray['poster_path']);
				
				array_push($this->list, $movie);
			}
		// }

		$this->saveData();
	}

	
}

 ?>