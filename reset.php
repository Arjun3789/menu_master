<?php
//database connection
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'menu_master');
if ($conn) 
{
 // echo "Connected";
  # code...
}
else
{
  echo "Not Connected";
  # code...
}


if(isset($_POST['reset-btn']))
{
  $email=$_POST['email'];   //assigning values
  $newpass=$_POST['Pass'];
  $newconpass=$_POST['ConPass'];  
  $token=$_POST['password_token'];  
   
  if(!empty($token))
  {
    
    $check_token = "SELECT Token FROM admin_register WHERE Token='$token'";//checking  token valid or not
    $check_token_run=mysqli_query($conn,$check_token);
    if($check_token_run->num_rows > 0)// checking for email exist or not
    {
      if($newpass == $newconpass)
      {
        

        $update_pass="UPDATE admin_register SET Pass='$newpass' WHERE Token='$token'";
        $update_pass_run=mysqli_query($conn,$update_pass);
        if($update_pass_run)
        {
          $new_token=bin2hex(random_bytes(15));
          $update_to_new_token="UPDATE admin_register SET Token='$new_token' WHERE Token='$token'";
          $update_to_new_token_run=mysqli_query($conn,$update_to_new_token);
          ?>
          <script>
            alert("Password Updated  Successfully");
            window.location.replace('login.html');
          </script>
          <?php 
          #code...
        }
      }
      /* else
       { // wrong password code
         ?>
         <script>
           alert("password does not matched ");
           window.location.replace('reset.php?token=$token & email=$email');
         </script>
         <?php
         #code...
       }*/
    }else
    {
       // validation
    ?>
    <script>
    //pop up message code
    alert(" invalid token or email ");
    window.location.replace('reset.php?token=$token & email=$email');
    </script>
    <?php
    #code...

    }
    
  }
  else
  {

    // validation
    ?>
    <script>
    //pop up message code
    alert("No token avaliable ");
    window.location.replace('reset.php?token=$token & email=$email');
    </script>
    <?php
    #code...
  }
}

?>
<html>
	<head>
		<title>Reset_password</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
		<link rel="stylesheet" type="text/css" href="reset.css">
	</head>
	<body>
        <form method="POST" action="reset.php">
			    <div class="card">
                    <div class="front" >  
                        <h1>Reset Password</h1>
                        
                        <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                        <p>Email
                        <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" class="input-box" placeholder="Email" required></p>
                        <p>Password
                        <input type="password/text" name="Pass" id="pass1" class="input-box" placeholder="Password" required></p>
                        <p>Confirm Password
                        <input type="password/text" name="ConPass" id="pass2" class="input-box" placeholder="Confirm Password" required></p>
                        
                       
                        <a href="#">
                        <button type="submit" value="submit" name="reset-btn" class="reg-btn">update password </button></a>		
                    </div>   
               
                </div>
                  <script type="text/javascript">
                    var password = document.getElementById("pass1"), confirm_password = document.getElementById("pass2");

                    function validatePassword()
                    {
                      if(password.value != confirm_password.value)
                        {
                          confirm_password.setCustomValidity("Passwords Don't Match");
                        } 
                        else 
                        {
                          confirm_password.setCustomValidity('');
                        }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                  </script>
           
        </form>
    </body>
</html>