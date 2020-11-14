<?php
    namespace Controllers;
    use Controllers\ShowtimeController as Showtime;
use Exception;
use PDOException;

class HomeController
    {
        private $showtime;

        public function __construct()
        {
            $this->showtime = new Showtime();
        }
        public function Index($message = "")
        {
            try{
                $movies = $this->showtime->getAll();
            }catch(Exception $e){
                $e->getMessage();
            }
            
            require_once(VIEWS_PATH."index.php");
        }        
    }
?>