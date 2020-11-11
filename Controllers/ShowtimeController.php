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

        public function add($id,$id3,$date,$time)
        {
            $showtime = new M_showtime();
            $dato = $this->_rooms->getOne($id3);
            $showtime->setRoom($dato);
            $movieData = $this->_movies->getOne($id);
            $showtime->setMovie($movieData);
            $showtime->setTotalTickets($dato->getCapacity());
            $showtime->setTicketPrice($dato->getTicketPrice());
            $showtime->setOpeningTime($time);
            $showtime->generateClosingTime($this->showtime->retrieveDurationOneMovieFromApi($movieData->getId()));
            $showtime->setTicketsSold(0);
            $showtime->setDate($date);

            $this->showtime->create($showtime);

           $adminController = new AdminController();
           $adminController->Index();
        } 
        public function getAll()
        {
            return $this->showtime->retrieveAll();
        }   

        public function getAlltoListAdmin()
        {
            return $this->showtime->retrieveAlltoList();
        }   

        public function remove($id)
        {
            $this->showtime->remove($id);
            $adminController = new AdminController();
            $adminController->Index();
        }

        public function showAddView(){
            $roomsArray = $this->_rooms->getAllAvaible();
            $moviesArray= $this->_movies->RetrieveDB();

            require_once(VIEWS_PATH."addshowtime.php");
        }     

        
    }
?>