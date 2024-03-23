<?php

use PHPMailer\PHPMailer\PHPMailer;  //php mailer 
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; 


//database connection
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'menu_master');
if ($conn) 
{
  echo "Connected";
  # code...
}
else
{
  echo "Not Connected";
  # code...
}

function send_password_reset($name,$lname,$email,$token)
{
  //Server settings
   $mail=new PHPMailer(true);
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'arjunpatil3789@gmail.com';             //SMTP username
  $mail->Password   = 'Patil3789@';                           //SMTP password
  $mail->SMTPSecure = 'tls';            
  $mail->Port       = 587;                                   

  //Recipients
  $mail->setFrom('arjunpatil3789@gmail.com');
  $mail->addAddress($email);                     //recipient through database
    

  




  /* //Attachments
  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  */


  //Content
  $url="http://localhost/menu_master/Admin/forgot.php?token=$token & email=$email ";
 // $url="http://localhost/Mess_Management/Admin/reset.php?token=$token & email=$email ";
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = "Reset Password Notification";
  $mail->Body    = "<h1>You requested to reset password..</h1>
  
  
  <h2>Dear  $name  $lname </h2>
  <h3>
  <pre>
  A request has been made to reset your password. If you made this request, please <a href='$url'>CLICK HERE</a> to complete your process.<br>
  If you did not request to reset your password, please ignore this message.
  
  Regards
  Menu_Master Team
  </pre></h3>";

  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();

}
if(isset($_POST['submit']))  // accessing through submit btn
{
  $email=$_POST['Email'];   //assigning values
  $token=bin2hex(random_bytes(15));
  $query="SELECT * from admin_register where email='$email'  ";
  $result=mysqli_query($conn,$query);
 
 if(mysqli_num_rows($result)> 0)
 {
  $row=mysqli_fetch_array($result);
  
   $name=$row['FName'];
   $lname=$row['LName'];
  $email=$row['Email'];


  $update_token="UPDATE admin_register SET Token='$token' WHERE Email='$email'";
  $update_token_run=mysqli_query($conn,$update_token);
  if($update_token_run)
  {
    send_password_reset($name,$lname,$email,$token);
    ?>
    <script>
      //pop up message code for login
      alert("Email sent sucessful");
      window.location.replace('login.html');
    </script>
    <?php
    #code...

  }
  else
  {
    ?>
    <script>
      //pop up message code
      alert("something went wrong");
      window.location.replace('forgot.html');
    </script>
    <?php
    #code...
  }

 }
 else
 {
  ?>
  <script>
    //pop up message code
    alert("Email  not correct");
    window.location.replace('forgot.html');
  </script>
  <?php
  #code...
 }

}
 

?>