<?php

namespace Controllers;

    use DAO\Cinemas as D_cinema;
    use Models\Cinema as M_cinema;
use PDOException;

class CinemaController{

        private $_cinema;

        public function __construct()
        {
            $this->_cinema = new D_Cinema();
        }

        public function add($name,$address,$openingTime="",$closingTime="")
        {

            $cinema = new M_cinema($name,$address,$openingTime,$closingTime);
            try{
                $this->_cinema->add($cinema);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }      

        public function remove($id)
        {
            try{
                $this->_cinema->remove($id);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e){
                $e->getMessage();                
            }
        }

          
        public function GetAll(){
            try{
                return $this->_cinema->getAll();
            }catch(PDOException $e){
                throw $e;
            }
           
        }

        public function GetAllAvaible(){
            try{
                return $this->_cinema->getAllAvaible();
            }catch(PDOException $e){
                $e->getMessage();
            }      
        }

        public function showListView(){
            try{
                $cinemaArray = $this->_cinema->getAllAvaible();
                require_once(VIEWS_PATH."cinemas.php");
            }catch(PDOException $e){
                $e->getMessage();
            }

        }

        public function showAddView(){
            require_once(VIEWS_PATH."addCinema.php");
        }

        public function updateState($id)
        {
            try{
                $this->_cinema->updateState($id,'1');
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e){
                $e->getMessage();
            }

        }
        public function updateCinema($id)
        {
            try{
                $cinema = $this->_cinema->getOne($id);
                require_once(VIEWS_PATH."updateCinema.php");
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
        public function updateName($id,$name)
        {
            try{
                $this->_cinema->updateName($id,$name);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e)
            {
                $e->getMessage();
            }

        }

        public function updateAddress($id, $address)
        {
            try{
                $this->_cinema->updateAddress($id,$address);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function updateOpeningTime($id,$openingTime)
        {
            try{
                $this->_cinema->updateOpeningTime($id,$openingTime);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function updateClosingTime($id,$closingTime)
        {
            try{
                $this->_cinema->updateClosingTime($id,$closingTime);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e){
                $e->getMessage();
            }

        }
        
    }
?>