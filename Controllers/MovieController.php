<?php

namespace Controllers;
use DAO\Movies as Movie;
use DAO\Genres as Genre;

    class MovieController{
        private $movies,$genres;
        public function __construct()
        {
            $this->movies = new Movie();
            $this->genres = new Genre();
        }
        public function RefreshData($message = "")
        {
            $this->movies->RefreshData();
            $this->genres->RefreshData();
        }      
        
        public function GetAll(){
            $movies = $this->movies->GetAll();
            $genres = $this->genres->GetAll();
            require_once(VIEWS_PATH."movies.php");
        }
    }
?>