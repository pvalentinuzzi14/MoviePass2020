<?php

namespace Controllers;

    use DAO\Rooms as D_Rooms;
    use Models\Room as M_Room;
    class RoomController{

        private $_room;

        public function __construct()
        {
            $this->_room = new D_Rooms();
        }

        public function add($cinema="",$name="",$capacity="",$ticketPrice="")
        {
            $cinema = new M_Room($cinema,$name,$capacity,$ticketPrice);
            $this->D_Rooms->add($cinema);

        $adminController = new AdminController();
        $adminController->Index();
        }      

        public function remove($id)
        {
            $this->_room->remove($id);
            $adminController = new AdminController();
            $adminController->Index();
        }

          
        public function GetAll(){
            return $this->_room->getAll();
        }

        public function GetAllAvaible(){
            return $this->_room->getAllAvaible();
        }

        public function showListView(){
            $cinemaArray = $this->_room->getAllAvaible();
            require_once(VIEWS_PATH."cinemas.php");
        }

        public function showAddView(){
            require_once(VIEWS_PATH."addCinema.php");
        }

        public function updateState($id)
        {
            $this->_room->updateState($id,'1');
            $adminController = new AdminController();
            $adminController->Index();
        }

        
    }
?>