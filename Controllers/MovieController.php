<?php

namespace Controllers;
use DAO\Movies as MovieDao;
use DAO\Genres as GenreDao;

    class MovieController{
        private $movies,$genres;
        public function __construct()
        {
            $this->movies = new MovieDao();
            $this->genres = new GenreDao();
        }
        public function RefreshData($message = "")
        {
            $this->genres->insertFromApiToDb();
            $this->movies->insertFromApiToDb();
           
        }      
        
        public function GetAll(){
            $genres = $this->genres->RetrieveDB();
            $movies = $this->movies->RetrieveDB();
            
            
            require_once(VIEWS_PATH."movies.php");
        }
    }
?>