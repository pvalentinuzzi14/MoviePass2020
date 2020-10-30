<?php

namespace Controllers;

    use DAO\Cinemas as D_cinema;
    use Models\Cinema as M_cinema;
    class CinemaController{

        private $_cinema;

        public function __construct()
        {
            $this->_cinema = new D_Cinema();
        }

        public function add($name,$address,$openingTime="",$closingTime="")
        {
            $cinema = new M_cinema($name,$address,$openingTime,$closingTime);
            $this->D_cinema->add($cinema);

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
            return $this->_cinema->getAll();
        }

        public function GetAllAvaible(){
            return $this->_cinema->getAllAvaible();
        }

        public function showListView(){
            $cinemaArray = $this->_cinema->getAllAvaible();
            require_once(VIEWS_PATH."cinemas.php");
        }

        public function showAddView(){
            require_once(VIEWS_PATH."addCinema.php");
        }

        public function updateState($id)
        {
            $this->_cinema->updateState($id,'1');
            $adminController = new AdminController();
            $adminController->Index();
        }

        
    }
?>