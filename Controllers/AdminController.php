<?php

namespace Controllers;

    use DAO\Cinemas as Cinemas;
    use Models\Cinema as Cinema;
    use Controllers\CinemaController as CinemaCont;
    use Controllers\RoomController as RoomCont;
    use Controllers\ShowtimeController as ShowTimeCont;
    use DAO\Movies as Movies;
    use Models\Movie as Movie;

    class AdminController{

        public function __construct()
        {
            
        }

        public function Index()
        {
            if(isset($_SESSION['userID']))
            {

                $roomController = new RoomCont();
                $cinemaController = new CinemaCont();
                $showtimeController = new ShowTimeCont();
                $cinemaArray = $cinemaController->getAll();
                $roomsArray = $roomController->getAll();
                $showtimeList = $showtimeController->getAll();

               require_once(VIEWS_PATH."/adminContent.php");
            }else{
                header("location:../index.php");
            }
          
        }

        public function AllFunctions()
        {
                $roomController = new RoomCont();
                $cinemaController = new CinemaCont();
                $showtimeController = new ShowTimeCont();
                $cinemaArray = $cinemaController->getAll();
                $roomsArray = $roomController->getAll();
                $showtimeList = $showtimeController->getAlltoListAdmin();

               require_once(VIEWS_PATH."/adminAllShowtimes.php");
          
        }    
        
        public function getStats()
        {
             require_once(VIEWS_PATH."/adminStats.php");
          
        }    

    }
?>