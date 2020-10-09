<?php 
namespace DAO;


use Models\Movie as Movie;

class MoviesDAO{
	
	private $list = array();

	public function add($item){
		$this->retrieveData();
		array_push($this->list, $item);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->list;
    }
    

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->list as $movie) {
			$valueArray['title'] = $movie->getTitle();
			$valueArray['vote_average'] = $movie->getVote_average();
            $valueArray['overview'] = $movie->getOverview();
            $valueArray['release_date'] = $movie->getRelease_date();
			$valueArray['genre_ids'] = $movie->getGenre_ids();
			$valueArray['id'] = $movie->getId();
			$valueArray['image'] = $movie->getImage();

			array_push($arrayToEncode, $valueArray);
			
		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

		file_put_contents(dirname(__DIR__).'/data/movies.json', $jsonContent);
    }
    
	public function retrieveData(){
		$this->list = array();
		
		if(file_exists(dirname(__DIR__).'/data/movies.json')){
			$jsonContent =file_get_contents(dirname(__DIR__).'/data/movies.json');

			$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

			foreach ($arrayToDecode as $valueArray) {
				$movie = new Movie($valueArray['name'],$valueArray['user'],$valueArray['pass']);
				array_push($this->list, $movie);
			}
		}
	}
}

 ?>