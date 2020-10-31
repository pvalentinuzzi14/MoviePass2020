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
            $this->movies->insertFromApiToDb();
            $this->genres->insertFromApiToDb();
        }      
        
        public function GetAll(){
            $movies = $this->movies->RetrieveDB();
            $genres = $this->genres->RetrieveDB();
            
            require_once(VIEWS_PATH."movies.php");
        }
    }
?>