<?php

namespace Controllers;


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



// Load Composer's autoloader
require 'vendor/autoload.php';


    use DAO\Users as D_user;
    use DAO\UsersRole as D_usersRole;
    use Models\User as M_user;

    class UserController{

        private $usersDao;
        private $usersRoleDao;

        public function __construct()
        {
            $this->usersDao = new D_user();
            $this->usersRoleDao = new D_usersRole();
        }

        public function Index()
        {
            require_once(VIEWS_PATH."/login.php"); 
        }

        public function Register()
        {
            require_once(VIEWS_PATH."/register.php"); 
        }

        public function Update(){
            $user=$this->usersDao->retrieveOne($_SESSION['userID']);
            require_once(VIEWS_PATH."/updateProfile.php"); 
        }

        public function add($email,$password,$firstName,$lastName)
        {
            $user = new M_user();
            $userRoleArray = $this->usersRoleDao->retrieveAll();
            $flag = $this->usersDao->checkUserList();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            if($flag == 0){
                $user->setUserRole($userRoleArray[0]);
            }else{
                $user->setUserRole($userRoleArray[1]);
            }
            $this->usersDao->create($user);
            
            require_once(VIEWS_PATH."/login.php");
        }

        public function login($userName, $password)
        {
            $flag = $this->usersDao->checkUserToLogin($userName,$password);
            if($flag!=null){
                $user = $this->usersDao->retrieveOne($flag[0]['idUsers']);
                $_SESSION['userID']=$flag[0]['idUsers'];
                $_SESSION['userName']=$user->getFirstName();
                $_SESSION['userRole']=$user->getUserRole()->getId();
                if($user->getUserRole()->getId()==1){
                    header("location:../Admin/index");
                }else{
                    header("location:../Home/index");
                }
            }
        }

        public function logout(){
            session_destroy();
            header("location:../index.php");
        }

        public function changeProfile($firstName,$lastName){
            $this->usersDao->updateFirstName($_SESSION['userID'],$firstName);
            $this->usersDao->updateLastName($_SESSION['userID'],$lastName);
            $_SESSION['userName']=$firstName;
            $this->Update();
        }

        public function contact()
        {
            require_once(VIEWS_PATH.'/contact.php');
        }

        public function sendMail()
        {
            if(isset($_POST))
            {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $mensaje ="
                <html> 
                    <head> 
                    <title>Correo VIA WEB</title> 
                    </head> 
                    <body>
                    <p> ".$_POST['message']. "</p> 
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
            $mail->setFrom($email,$name);
            $mail->addAddress('utn.moviepass2020@gmail.com');
            $mail->addReplyTo($email, $name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Consulta web: '.$_POST['name']." - Tel: ".$_POST['telefono'];
            $mail->Body    = $mensaje;
            $mail->AltBody = $mensaje;
            $mail->send();
            
            require_once(VIEWS_PATH.'/contact-response.php');

            } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }
    
        }
    }
?>


