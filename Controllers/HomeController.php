<?php
    namespace Controllers;
    use Controllers\ShowtimeController as Showtime;


    class HomeController
    {
        private $showtime;

        public function __construct()
        {
            $this->showtime = new Showtime();
        }
        public function Index($message = "")
        {
            $movies = $this->showtime->getAll();
            $showtime= $this->showtime;
            require_once(VIEWS_PATH."index.php");
        }        
    }
?>