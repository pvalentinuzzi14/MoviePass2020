<?php

namespace Controllers;

use Exception;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


// Load Composer's autoloader
require 'vendor/autoload.php';

/*Alias - Models*/
use Models\Purchase as M_Purchase;
use Models\Ticket as M_Ticket;
use Models\Payment as M_Payment;

/*Alias - DAO*/
use DAO\Showtimes as D_Showtime;
use DAO\Movies as D_Movie;

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
               
               if(!empty($showtime))
               {
                require_once(VIEWS_PATH."purchase_showtime.php");
               }else{
                   throw new Exception("Accion no permitida, no existen funciones disponibles para esa pelicula", 1);
                }
              
            }catch(Exception $e)
            {
                require_once(VIEWS_PATH."error.php");

               // $e->getMessage();
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

                if($showtime!=null)
                {
                    if($showtime->getTicketsSold() < $showtime->getTotalTickets())
                    {
                        $movie = new D_Movie();
                        $MovieModel = $movie->getOne($showtime->getMovie());
                        require_once(VIEWS_PATH."purchase_showtime2.php");
                    }else{
                        throw new Exception("Accion no permitida, no existen tickets disponibles para esa funcion", 1);
                     }
                }else{
                    throw new Exception("Accion no permitida, no existen la funcion ingresada", 1);
                }
                             

            }catch(Exception $e){
                require_once(VIEWS_PATH."error.php");

                // $e->getMessage();
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

    public function createPurchase($totalTickets = null, $total = null, $idUser = null, $idShowtime = null, $discount = 0) {

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

                    $idPurchase = $this->purchaseDAO->create($purchase);
                  

                    //Finally, we update the purchased tickets in the function
                    $updatedAmountOfTickets = $showtime->getTicketsSold()+$totalTickets;
                    if($DaoShowtime->updateTicketsSold($showtime->getId(), $updatedAmountOfTickets)) {
                        
                        $this->sendMail($user,$idPurchase,$showtime);
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

   
        public function sendMail($user,$purchase,$showtime)
        {
            if(isset($_POST))
            {
                $userEmail = $user->getEmail();
                $userName = $user->getFirstName();
                $mensaje ="
                <html> 
                    <head> 
                    <title>Compra Ticket MOVIE PASS  </title> 
                    </head> 
                    <body>
                    <p>Hola {$userName}.
                    <br> Usted ha realizado con exito la compra para la pelicula {$showtime->getMovie()->getTitle()}, 
                    para el dia {$showtime->getDate()} en la sala {$showtime->getRoom()->getName()}.
                    Su numero de compra es X001-000{$purchase}, debera dirigirse a la boleteria del cine 
                    e indicar el mismo, para el retiro de los comprobantes correspondientes.
                    </p> 
                    </body> 
                </html> 
                " ; 
            $mail = new PHPMailer(true);
    
    
            try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;                              
            $mail->Username = 'utn.moviepass2020@gmail.com';                 
            $mail->Password = 'moviePass2020';                          
            $mail->Port =  587;
            $mail->SMTPSecure = 'tls';

            $mail->CharSet = 'utf-8';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->setFrom('utn.moviepass2020@gmail.com','MoviePass Ticket');
            $mail->addAddress($userEmail);
            //$mail->addReplyTo($email, $name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Compra de ticket Movie Pass';
            $mail->Body    = $mensaje;
            $mail->AltBody = $mensaje;
            $mail->send();
            
            require_once(VIEWS_PATH."ticket-view.php");

            } catch (Exception $e) {
           
                require_once(VIEWS_PATH."error.php");

                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }
    
        }

}

