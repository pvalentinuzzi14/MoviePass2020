<?php

namespace Controllers;

use DAO\Cinemas as Cinemas;
use DAO\Showtimes as D_Showtime;
use DAO\Purchases as D_Purchase;


use Models\Cinema as Cinema;
use Controllers\CinemaController as CinemaCont;
use Controllers\RoomController as RoomCont;
use Controllers\ShowtimeController as ShowTimeCont;
use DAO\Movies as Movies;
use Exception;
use Models\Movie as Movie;
use PDOException;

class AdminController{

        public function __construct()
        {
            
        }

        public function Index()
        {
            if(isset($_SESSION['userID']) && $_SESSION['userRole']==1)
            {
                try{
                    $roomController = new RoomCont();
                    $cinemaController = new CinemaCont();
                    $showtimeController = new ShowTimeCont();
                    $movieDao = new Movies();
                    $moviesArray = $movieDao->RetrieveDB();
                    $cinemaArray = $cinemaController->getAll();
                    $roomsArray = $roomController->getAll();
                    $showtimeList = $showtimeController->getAll();
                    require_once(VIEWS_PATH."/adminContent.php");
                }catch(Exception $e){
                        $e->getMessage();
                }              
            }else{
                header("location:../index.php");
            }
          
        }

        public function AllFunctions()
        {
            try{
                $roomController = new RoomCont();
                $cinemaController = new CinemaCont();
                $showtimeController = new ShowTimeCont();
                $cinemaArray = $cinemaController->getAll();
                $roomsArray = $roomController->getAll();
                $showtimeList = $showtimeController->getAlltoListAdmin();
               require_once(VIEWS_PATH."/adminAllShowtimes.php");
            }catch(Exception $e){
                $e->getMessage();
            } 
        }        

        public function Stats($idShow)
        {
              try{
                $showtime=new D_Showtime();

                $show = $showtime->retrieveOne($idShow);

               require_once(VIEWS_PATH."/remainderTickets.php");
            }catch(Exception $e){
                require_once(VIEWS_PATH.'error.php');
            } 
        }        

        public function MoneyStats()
        {
            $inicio = 0;
            $final = 0;
            $idShow = $_POST['idMovie'];
            $gananciasMovie=0;         
          
            if(isset($_POST['desde']))
            {
                $inicio = $_POST['desde'];
                $final = $_POST['hasta'];
            }
              try{
                $Movie=new D_Purchase();
                $show = $Movie->retrieveProfits($inicio,$final,$idShow);
           
               require_once(VIEWS_PATH."/profits.php");
            }catch(Exception $e){
                require_once(VIEWS_PATH.'error.php');
            } 
        }        

    }
?>