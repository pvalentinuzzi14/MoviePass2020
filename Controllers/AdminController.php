<?php

namespace Controllers;

    use DAO\Cinemas as Cinemas;
    use Models\Cinema as Cinema;
    use Controllers\CinemaController as CinemaCont;
    use DAO\Movies as Movies;
    use Models\Movie as Movie;

    class AdminController{


        public function Index()
        {
            if(($_POST['user'] == 'admin') && ($_POST['password'] == 'admin') )
            {
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['password'] = $_POST['password'];
                $cinemaController = new CinemaCont();
                $cinemaArray = $cinemaController->getAll2();

                require_once(VIEWS_PATH."/adminContent.php");
            }else{
               
            }
          
        }

        

    }
?>