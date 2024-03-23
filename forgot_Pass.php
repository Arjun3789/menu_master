<?php
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

 if(isset($_POST['submit']))// accessing through submit btn
{
     //assigning values
     $email=$_POST['Email'];
    
     // query for fetching email and password
     $sql = "select * from register where email='$email' ";
     $result = mysqli_query($conn,$sql);
     if($result->num_rows > 0)// checking for email exist or not
     {
         $userdata=mysqli_fetch_assoc($result);
        $username=$userdata['FName'];
        $token=$userdata['token'];



         $subject="Email Activation";
         $body="Hi,$username. Click here too activate your account
         http://localhost/menu_master/User/forgot.html?token=$token ";
         $headers="From: arjunpatil3789@gmail.com" ;


         if(mail($email, $subject, $body, $headers))
         {
            echo "email sent to $email....";
         }
         else{
            echo "email sent error..";
         }
     }
     else
     {
         echo "no email found";
     }



  
  //  {
       // while($row = mysqli_fetch_assoc($result)) 
        //{
            
          //  $Id=$row['Id'];
          //  $Pass=$row['Pass'];
           // $id_encode=base64_encode($Id);
          //  $token=uniqid(md5(time())); //random generated value
          //  $sql = "select * from register where Id='NULL' and Pass='$Pass' and token='$token' "; 



           // if(mysqli_query($conn,$sql))
           // {
                
               // $subject="testing";
              //  $body="hi arjun ";
              //  $headers="From: patil.letzpack@gmail.com";
            
             //   if(mail($email, $subject, $body, $headers))
            //   {
            //        echo "email sent to $to_email....";
            //    }
             //   else{
              //      echo "sending email failed";
              //  }
               
            //}
           
        //}
       /* ?>
        <script>
            //pop up message code for login
        //    alert("LogIn sucessful");
        //    window.location.replace('forgot.html');
        </script>
        <?php*/
        #code...
        
  //  }
  //  else
  //  {
     /*   ?>
        <script>
             //pop up message code
             alert("Email  not correct");
             window.location.replace('forgot.html');
        </script>
        <?php*/
         #code...
   // }     
}

?>
