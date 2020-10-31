<?php

namespace Controllers;

    use DAO\Showtimes as D_showtime;
    use DAO\Rooms as D_Rooms;
    use DAO\Movies as D_Movies;


    use Models\Showtime as M_showtime;
    class ShowtimeController{

        private $showtime;
        private $_rooms;
        private $_movies;


        public function __construct()
        {
            $this->showtime = new D_showtime();
            $this->_rooms = new D_Rooms();
            $this->_movies = new D_Movies();
        }

        public function add($name,$address,$openingTime="",$closingTime="")
        {
            $cinema = new M_showtime($name,$address,$openingTime,$closingTime);
          //  $this->showtime->add($cinema);

        $adminController = new AdminController();
        $adminController->Index();
        }      

        public function remove($id)
        {
          //  $this->showtime->remove($id);
            $adminController = new AdminController();
            $adminController->Index();
        }


        public function showAddView(){
            $roomsArray = $this->_rooms->getAll();
            $moviesArray= $this->_movies->RetrieveDB();

            require_once(VIEWS_PATH."addshowtime.php");
        }


        

        
    }
?>