<?php

namespace Controllers;

    use DAO\Cinemas as Cinemas;
    use Models\Cinema as Cinema;
    use Controllers\CinemaController as CinemaCont;
    use Controllers\RoomController as RoomCont;
    use Controllers\ShowtimeController as ShowTimeCont;
    use DAO\Movies as Movies;
    use Models\Movie as Movie;
use PDOException;

class AdminController{

        public function __construct()
        {
            
        }

        public function Index()
        {
            if(isset($_SESSION['userID']))
            {
                try{
                    $roomController = new RoomCont();
                    $cinemaController = new CinemaCont();
                    $showtimeController = new ShowTimeCont();
                    $cinemaArray = $cinemaController->getAll();
                    $roomsArray = $roomController->getAll();
                    $showtimeList = $showtimeController->getAll();
                    require_once(VIEWS_PATH."/adminContent.php");
                }catch(PDOException $e){
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
            }catch(PDOException $e){
                $e->getMessage();
            } 
        }        

    }
?>