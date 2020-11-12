<?php
    namespace Controllers;
    use Controllers\ShowtimeController as Showtime;
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
            }catch(PDOException $e){
                $e->getMessage();
            }
            
            require_once(VIEWS_PATH."index.php");
        }        
    }
?>