<?php

namespace Controllers;

    use DAO\Rooms as D_Rooms;
    use DAO\Cinemas as D_Cinemas;
    use PDOException;


    use Models\Room as M_Room;
    class RoomController{

        private $_room;
        private $_cinema;


        public function __construct()
        {
            $this->_room = new D_Rooms();
            $this->_cinema = new D_Cinemas();
        }

        public function add($cinema="",$name="",$capacity="",$ticketPrice="")
        {
            $room = new M_Room($cinema,$name,$capacity,$ticketPrice);
            $this->_room->add($room);

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
        /*CAMBIALO JUAN*/
        public function GetAllAvaible(){
            return $this->_room->getAllAvaible();
        }

        public function showAddView(){
            $cinemaArray = $this->_cinema->getAllAvaible();
            require_once(VIEWS_PATH."addRoom.php");
        }

        public function updateState($id)
        {
            $this->_room->updateState($id,'1');
            $adminController = new AdminController();
            $adminController->Index();
        }

        public function update($id)
        {
            try{
                $room = $this->_room->getOne($id);
                require_once(VIEWS_PATH."updateRooms.php");
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
        public function updateName($id,$name)
        {
            try{
                $this->_room->updateName($id,$name);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e)
            {
                $e->getMessage();
            }

        }

        public function updateTicketPrice($id,$newPrice)
        {
            try{
                $this->_room->updateTicketPrice($id,$newPrice);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e)
            {
                $e->getMessage();
            }

        }
        public function updateCapacity($id,$capacity)
        {
            try{
                $this->_room->updateCapacity($id,$capacity);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e)
            {
                $e->getMessage();
            }

        }
        public function updateCinema($id,$idCinema)
        {
            try{
                $this->_room->updateCinema($id,$idCinema);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(PDOException $e)
            {
                $e->getMessage();
            }

        }



    }
?>