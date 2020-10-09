<?php

namespace Controllers;

    use DAO\Cinemas as Cinemas;
    use Models\Cinema as Cinema;
    class CinemaController{

        private $_cinema;

        public function __construct()
        {
            $this->_cinema = new Cinemas();
        }
        public function add($id,$name,$address,$room)
        {
            $cinema = new Cinema($name,$address,$id,$room);
            $this->_cinema->add($cinema);
            require_once(VIEWS_PATH."cinemas.php");
        }      
        public function remove($id)
        {
            $this->_cinema->remove($id);
            require_once(VIEWS_PATH."cinemas.php");
        }
        public function GetAll(){
            $cinemaArray = $this->_cinema->getAll();;
            require_once(VIEWS_PATH."cinemas.php");
        }

    }
?>