<?php 
namespace DAO;

use Models\Movie as Movie;

class Movies{
	
	private $list = array();

	public function getAll(){
		$this->retrieveData();
		return $this->list;
    }

	public function saveData(){
		
    }
    
	public function retrieveData(){

	}

	public function refreshData() 
	{
			
			//$jsonContent =file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=es-ES&sort_by=popularity.desc&include_adult=false&include_video=false&page=1");
	}

	
}

 ?>