<?php

namespace Controllers;

use DAO\Showtimes as D_Showtime;
use Exception;
use PDO;
use PDOException;

class PurchaseController{
    private $D_showtime;

    public function __construct()
    {
       
    }

    public function selectFunction()
    {     
        $D_showtime = new D_Showtime();
        if(isset($_SESSION['userName'])){
            try
            {
                $id = $_GET['id'];
                $showtime = $D_showtime->retrieveShowtimesByMovieId($id);
                require_once(VIEWS_PATH."purchase_showtime.php");
            }catch(Exception $e)
            {
                $e->getMessage();
            }
        }else{
            $userCont = new UserController();
            $userCont->Index();
        }
    }

    public function getTickets()
    {
        $D_showtime = new D_Showtime();
        if(isset($_SESSION['userName'])){
            try{
                $id = $_GET['id'];
                $showtime = $D_showtime->retrieveShowtimesById($id);
                require_once(VIEWS_PATH."purchase_showtime2.php");
            }catch(Exception $e){
                $e->getMessage();
            }

        }else{
            $userCont = new UserController();
            $userCont->Index();
        }

    }

    public function confirm($id,$quantity,$price)
    {
        $D_showtime = new D_Showtime();
        $total = $quantity * $price;
        $user = $_SESSION['userID'];
        try{
            $showtime = $D_showtime->retrieveOne($id);
        }catch(Exception $e){
            $e->getMessage();
        }
        require_once(VIEWS_PATH."confirm_ticket.php");
    }


}