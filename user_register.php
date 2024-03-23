<?php
  /*  //database connection
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

    if(isset($_POST['submit'])){// accessing through submit btn
        //assigning values
        $Fname=$_POST['FName'];
        $Lname=$_POST['LName'];
        $Pass=$_POST['Pass'];
        $Confirm=$_POST['ConPass'];
        $Email=$_POST['Email'];
        $Phone=$_POST['Phone'];
        $Gender=$_POST['Gender'];
        $Package=$_POST['Package'];
       // $token=bin2hex(random_bytes(15));

        // email verification
        
        $emailquery = "SELECT * FROM `user_register` WHERE Email='$Email'";
        $query = mysqli_query($conn,$emailquery);
        $emailcount =  mysqli_num_rows($query);
        


        if ($emailcount>0) { //condition of email verification 
            ?>
            <script>
                //pop up message code
                alert("email already exist");
                window.location.replace('user_register.html');
            </script>
            <?php
            # code...
        }
        else{
            if($Pass === $Confirm)// password condition
            {
                //insert query... adding details to database

                $q = "INSERT INTO `user_register` VALUES(`Id`,'$Fname','$Lname','$Pass','$Email','$Phone','$Gender','$Package','')";

                $query = mysqli_query($conn,$q);
                if(mysqli_query($conn, $query))
                {
                   
                } 
                ?>
                <script>
                    alert("Registered  Successfully");
                    window.location.replace('/Mess_management/Admin/main.html');
                </script>
                <?php
                #code...
                
           }
            else
            { // wrong password code
                ?>
                <script>
                    alert("password does not matched ");
                    window.location.replace('user_register.html');
                </script>
                <?php
                #code...
            }

        }       
    }
?>*/
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'menu_master');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {
        // Sanitize user inputs
        $Fname = mysqli_real_escape_string($conn, $_POST['FName']);
        $Lname = mysqli_real_escape_string($conn, $_POST['LName']);
        $Pass = mysqli_real_escape_string($conn, $_POST['Pass']);
        $Confirm = mysqli_real_escape_string($conn, $_POST['ConPass']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
        $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
        $Package = mysqli_real_escape_string($conn, $_POST['Package']);

        // Check if the email already exists
        $emailquery = "SELECT * FROM `user_register` WHERE Email='$Email'";
        $query = mysqli_query($conn, $emailquery);
        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            ?>
            <script>
                alert("Email already exists");
                window.location.replace('user_register.html');
            </script>
            <?php
        } else {
            if ($Pass === $Confirm) {
                // Insert query... adding details to the database
               // $q = "INSERT INTO `user_register` VALUES(NULL, '$Fname', '$Lname', '$Pass', '$Email', '$Phone', '$Gender', '$Package',)";
                $q = "INSERT INTO `user_register` VALUES(NULL, '$Fname', '$Lname', '$Pass', '$Email', '$Phone', '$Gender', '$Package','')";

                $query = mysqli_query($conn, $q);
                if ($query) {
                    ?>
                    <script>
                        alert("Registered successfully");
                        window.location.replace('main.html');
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Password does not match");
                    window.location.replace('user_register.html');
                </script>
                <?php
            }
        }
    }
?>
