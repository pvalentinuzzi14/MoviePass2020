<?php

namespace Controllers;
use DAO\Movies as MovieDao;
use DAO\Showtimes as ShowtimeDao;
use Controllers\ShowtimeController as ST_Controller;

use DAO\Genres as GenreDao;
use PDOException;

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
        
        public function RefreshMovies()
        {
            $this->movies->insertFromApiToDb(); 
        }
        
        public function Index(){
            try{
                $genres = $this->genres->RetrieveDB();
                $movies = $this->showtime->retrieveAllAvailable();
                $dates = $this->showtime->getDateAvailable();
                require_once(VIEWS_PATH."movies.php");
            }catch(PDOException $e){
                throw $e;
            }

        }

        public function GetAllbyDate($date){
            if($date==(-1)){
                try{
                    $this->Index();
                }catch(PDOException $e){
                    $e->getMessage();
                }             
            }else{
                try{
                    $movies = $this->showtime->retrieveAllbyDate($date);
                    $dates = $this->showtime->getDateAvailable();
                    require_once(VIEWS_PATH."moviesdate.php");
                }catch(PDOException $e){
                    $e->getMessage();
                }

            }
            
        }


    }
?>