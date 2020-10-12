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

        public function add($id,$name,$address,$room,$price)
        {
            $rooms = array();
            for ($i=1; $i < ($room+1) ; $i++) { 
              array_push($rooms,$i);
            }
            $cinema = new Cinema($name,$address,$id,$rooms,$price);
            $this->_cinema->add($cinema);

        $adminController = new AdminController();
        $adminController->Index();
        }      

        public function remove($id)
        {
            $this->_cinema->remove($id);
            $adminController = new AdminController();
            $adminController->Index();
        }

          
        public function GetAll(){
            return $cinemaArray = $this->_cinema->getAll();
        }

        public function showListView(){
            $cinemaArray = $this->_cinema->getAll();
            require_once(VIEWS_PATH."cinemas.php");
        }

        public function showAddView(){
            require_once(VIEWS_PATH."addCinema.php");
        }

        
    }
?>