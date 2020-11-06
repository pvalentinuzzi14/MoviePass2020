<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
  $mail->Host = 'mail.mooviepass2020.com.ar';
  $mail->SMTPAuth = true;                              
  $mail->Username = 'info@mooviepass2020.com.ar';                 
  $mail->Password = '';     //cambiar                     
  $mail->Port =  587; //buscar
  $mail->CharSet = 'utf-8';
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );
  $mail->setFrom($email,$name);
  $mail->addAddress('');
  $mail->addReplyTo($email, $name);
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Consulta web: '.$_POST['name']." - Tel: ".$_POST['telefono'];
  $mail->Body    = $mensaje;
  $mail->AltBody = $mensaje;
  $mail->send();
 // header("location:greet.php");
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



 


}

?>