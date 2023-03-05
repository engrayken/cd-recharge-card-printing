<?php
include('../../../../../app/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{


//Login
if($_GET['error']=='l')
{
   if(password_verify($password,$chpassword) && $dev=='cdkpandroiddevicekpcdv1')
	{
      require 'vendor/autoload.php';


$mail = new PHPMailer(TRUE);

try {
   
                               
    // $mail->Host = $eset['hoste'];; 
    // $mail->SMTPAuth = true;                        
    // $mail->Username = $eset['username'];                 
    // $mail->Password = $eset['password'];                          
    // $mail->SMTPSecure = 'ssl';                            
    // $mail->Port = $eset['porte'];                                    
    // $mail->setFrom($eset['frome'], $set['site_name']);
    // $mail->addAddress($ad['email'], $set['site_name']);          
    // $mail->addReplyTo($eset['reply_to'], $set['site_name']);

   $mail->setFrom($eset['frome'], $set['site_name']);
   $mail->addAddress($login_row['email'], $login_row['username']);
   $mail->Subject = 'Suspicious Login Attempt';
   $mail->addReplyTo($eset['reply_to'], $set['site_name']);
   $mail->Body = '<h3 style="text-align:center;">Suspicious Login Attempt</h3><br/><br/>
   Sorry your account was just accessed using our mobile app.<br/><br/>
   <small>*if this was you, please you can ignore this message or reset your account password.</small><br/><br/>
  <div style="text-align:center;"> <a href="https://carddispenser.com.ng/forgot"><button>Reset password now</button></a></div>';
   
   /* SMTP parameters. */
   $mail->isHTML(true); 
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = $eset['hoste'];

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'ssl';
   
   /* SMTP authentication username. */
   $mail->Username = $eset['username'];
   
   /* SMTP authentication password. */
   $mail->Password = $eset['password'];
   
   /* Set the SMTP port. */
   $mail->Port = $eset['porte'];
   
   /* Finally send the mail. */
   $mail->send();

//echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

   }
}
}

?>