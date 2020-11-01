<?php

namespace Controllers;
use DAO\Movies as MovieDao;
use DAO\Showtimes as ShowtimeDao;

use DAO\Genres as GenreDao;

    class MovieController{
        private $movies,$genres,$showtime;
        public function __construct()
        {
            $this->movies = new MovieDao();
            $this->genres = new GenreDao();
            $this->showtime = new showtimeDao();

        }
        public function RefreshData($message = "")
        {
            $this->genres->insertFromApiToDb();
            $this->movies->insertFromApiToDb();
           
        }      
        
        public function GetAll(){
            $genres = $this->genres->RetrieveDB();
           $movies = $this->showtime->retrieveAllAvailable();
           $dates = $this->showtime->getDateAvailable();
           
            
            require_once(VIEWS_PATH."movies.php");
        }

        public function GetAllbyDate($date){
            $genres = $this->genres->RetrieveDB();
            $movies = $this->showtime->retrieveAllbyDate($date);
            $dates = $this->showtime->getDateAvailable();
        
            require_once(VIEWS_PATH."movies.php");
        }


    }
?>