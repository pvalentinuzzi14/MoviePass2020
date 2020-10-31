<?php

namespace Controllers;

    use DAO\Cinemas as Cinemas;
    use Models\Cinema as Cinema;
    use Controllers\CinemaController as CinemaCont;
    use Controllers\RoomController as RoomCont;
    use DAO\Movies as Movies;
    use Models\Movie as Movie;

    class AdminController{

        public function __construct()
        {
            
        }

        public function Index()
        {
                $roomController = new RoomCont();
                $cinemaController = new CinemaCont();
                $cinemaArray = $cinemaController->getAll();
                $roomsArray = $roomController->getAll();


               require_once(VIEWS_PATH."/adminContent.php");
          
        }

        

    }
?>