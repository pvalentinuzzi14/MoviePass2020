<?php

namespace Controllers;

use Exception;

/*Alias - Models*/
use Models\Purchase as M_Purchase;
use Models\Ticket as M_Ticket;
use Models\Payment as M_Payment;

/*Alias - DAO*/
use DAO\Showtimes as D_Showtime;
use DAO\Purchases as DAO_Purchase;
use DAO\Users as D_User;


/*Alias - Controllers*/
use Controllers\ShowtimeController as C_Showtime;
use Controllers\HomeController as C_Home;

class PurchaseController{

    private $purchaseDAO;
    private $homeController;

    public function __construct()
    {
        $this->purchaseDAO = new DAO_Purchase();
        $this->homeController = new C_Home();
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

function createPurchase($totalTickets = null, $total = null, $idUser = null, $idShowtime = null, $discount = 0) {

        //For Mercado Pago API
        if($_POST) {
            $totalTickets = $_POST["quantity_tickets"];
            $total = $_POST["total"];
            $idUser = $_POST["id_user"];
            $idShowtime = $_POST["id_showtime"];
            //$discount = $_POST["discount"];
        }

        if($totalTickets != null && $total != null && $idUser != null && $idShowtime != null && $discount != null) {
            try
            {
                //We bring the corresponding User object from the BD
                $userDAO = new D_User();
                $user = $userDAO->retrieveOne($idUser);

                //We bring the corresponding Showtime object from the BD
                $showtimeController = new C_Showtime();
                $DaoShowtime = new D_Showtime();
                $showtime = $DaoShowtime->retrieveOne($idShowtime);



                //Checking that there are enough tickets available ..
                $remainingTickets = $showtime->getTotalTickets() - $showtime->getTicketsSold();
                if($totalTickets <= $remainingTickets) {
                    //We create and load the Payment object with info
                    $payment = new M_Payment();
                    $payment->setTotal($total);
                    //payment->setIdPurchase ---> not having the purchase ID yet

                    //We create and load Ticket objects
                    $arrayOfTickets = array();
                    $counter = 1;
                    for($i=0; $i<$totalTickets; $i++) {
                        $number = $showtime->getTicketsSold() + $counter;
                        $ticket = new M_Ticket();
                        $ticket->setNumber($number);
                        $ticket->setShowtime($showtime);
                        array_push($arrayOfTickets, $ticket);
                        $counter++;
                    }
                
                    //We create and load the Purchase object
                    $purchase = new M_Purchase();
                    $purchase->setTickets($arrayOfTickets);
                    $date = date('Y-m-d', time());
                    $purchase->setDate($date);
                    $purchase->setDiscount($discount);
                    $purchase->setTotalTickets($totalTickets);
                    $purchase->setUser($user);
                    $purchase->setPayment($payment);

                    //$idPurchase = $this->purchaseDAO->create($purchase);
                    require_once(VIEWS_PATH."ticket-view.php");

                    //Finally, we update the purchased tickets in the function
                    $updatedAmountOfTickets = $showtime->getTicketsSold()+$totalTickets;
                    if($DaoShowtime->updateTicketsSold($showtime->getId(), $updatedAmountOfTickets)) {
                      /*  $this->mailTicket($purchase->getUser()->getEmail(), $purchase->getUser()->getFirstName(), $purchase->getUser()->getLastName(), $qr, $showtime->getMovie()->getName(), $showtime->getDate(), $showtime->getOpeningTime(), $showtime->getAuditorium()->getMovieTheater()->getName(), $showtime->getAuditorium()->getName());
                        $message = "Purchase made successfully. Check in the section My purchases or in your email the QR code required to print the tickets in the movie theater";
                        $this->homeController->index($message, 1);*/
                    }
                    else {
                        $message = "Ocurrio un error en la base de datos";
                        $this->homeController->index($message, 0);
                    }
                }
                else {
                    $message = "La compra no puede ser realizada. No hay suficiente tickets disponibles. Intente nuevamente";
                    $messageType = 0;
                    $this->homeController->index($message, $messageType);
                }
            }
            catch(Exception $e)
            {
                $message = "Ocurrio un error en la base de datos";
                $this->homeController->index($message, 0);
            }
        }
        else {
            $this->homeController->index();
        }
    }


}