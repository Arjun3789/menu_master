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

    if(isset($_POST['submit']))// accessing through submit btn
    {
        //assigning values
        $email=$_POST['Email'];
        $Pass=$_POST['Pass'];
        // query for fetching email and password
        $sql = "SELECT * FROM admin_register WHERE email='$email' and pass='$Pass' ";
        $result = mysqli_query($conn,$sql);


        if($result->num_rows > 0)// checking for email exist or not
        {
            $row = mysqli_fetch_assoc($result);
            ?>
            <script>
                //pop up message code for login
                alert("LogIn sucessfull");
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
                alert("Email or Password is not correct");
                window.location.replace('login.html');
            </script>
            <?php
            #code...
        }     
    }
?>



/*
session_start();
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'menu_master');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {
        // Sanitize user inputs
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Pass = mysqli_real_escape_string($conn, $_POST['Pass']);

        // SQL query using prepared statement
        $sql = "SELECT * FROM admin_register WHERE Email=? AND pass=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $Email, $Pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userid'] = $Email;

            ?>
            <script>
                alert("Login successful");
                window.location.replace('./main.html');
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Email or Password is not correct");
                window.location.replace('login.php');
            </script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./login.css">
</head>
<body>
    <div class="container"> 
        <div class="card">
            <div class="front">
                <h1>LOGIN</h1>
                <form method="POST">
                    <p>Email Id 
                        <input type="email" name="Email" class="input-box" placeholder="Email" required></p>
                    <p>Password
                        <input type="password" name="Pass" id="pass1" class="input-box" placeholder="Password" required></p>
                    <a href="./forget.html">Forgot Password?</a>
                    <button type="submit" name="submit" class="login-btn">LogIn</button>


                    </form>
						<a href="./register.html">
							<button type="submit" class="reg-btn">New User? Register Here</button></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

