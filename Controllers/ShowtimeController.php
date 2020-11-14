<?php
namespace Controllers;

    use DAO\Showtimes as D_showtime;
    use DAO\Rooms as D_Rooms;
    use DAO\Movies as D_Movies;
use Exception;
use Models\Showtime as M_showtime;
use PDOException;

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
            $showtime->setTicketsSold(0);
            $showtime->setDate($date);
            try{
                $showtime->generateClosingTime($this->showtime->retrieveDurationOneMovieFromApi($movieData->getId()));
                $this->showtime->create($showtime);
            }catch(Exception $e){
                $e->getMessage();
            }  
 

           $adminController = new AdminController();
           $adminController->Index();
        } 
        public function getAll()
        {
            try{
                return $this->showtime->retrieveAll();
            }catch(PDOException $e){
                throw $e;
            }
            
        }   

        public function getAlltoListAdmin()
        {
            try{
                return $this->showtime->retrieveAlltoList();
            }catch(Exception $e){
                throw $e;
            }
           
        }   

        public function remove($id)
        {
            try{
                $this->showtime->remove($id);
                $adminController = new AdminController();
                $adminController->Index();
            }catch(Exception $e){
                $e->getMessage();
            }

        }

        public function showAddView(){
            try{
                $roomsArray = $this->_rooms->getAllAvaible();
                $moviesArray= $this->_movies->RetrieveDB();
    
                require_once(VIEWS_PATH."addshowtime.php");
            }catch(Exception $e){
                $e->getMessage();
            }

        }     

        
    public function loadShowtimeById($id) {
        try
        {
            $showtimeGet = $this->showtime->retrieveOne($id);
        }
        catch(PDOException $e)
        {
            $showtimeGet = null;
        }
        return $showtimeGet;
    }

        
    }
?>