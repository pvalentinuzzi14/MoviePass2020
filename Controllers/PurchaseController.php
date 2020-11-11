<?php

namespace Controllers;

use DAO\Showtimes as D_Showtime;

class PurchaseController{
    private $D_showtime;

    public function __construct()
    {
       
    }

    public function selectFunction(){
        $D_showtime = new D_Showtime();
        if(isset($_SESSION['userName'])){
            $id = $_GET['id'];
            $showtime = $D_showtime->retrieveShowtimesByMovieId($id);
            require_once(VIEWS_PATH."purchase_showtime.php");
        }else{
            $userCont = new UserController();
            $userCont->Index();
        }
    }

    public function getTickets()
    {
        $D_showtime = new D_Showtime();
        if(isset($_SESSION['userName'])){
            $id = $_GET['id'];
            $showtime = $D_showtime->retrieveShowtimesById($id);
            require_once(VIEWS_PATH."purchase_showtime2.php");
        }else{
            $userCont = new UserController();
            $userCont->Index();
        }

    }

    public function confirm($id,$ticket){
        $D_showtime = new D_Showtime();
        if(isset($_SESSION['userName'])){
            echo $ticket." ".$id;
            $showtime = $D_showtime->retrieveShowtimesById($id);
            $total = $ticket*$showtime->getTicketPrice();
            require_once(VIEWS_PATH."confirm_ticket.php");
        }else{
            $userCont = new UserController();
            $userCont->Index();
        }
    }


}