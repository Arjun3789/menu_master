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
       // $token=bin2hex(random_bytes(15));

        // email verification
        $emailquery = "SELECT * FROM admin_register WHERE Email='$Email'";
        $query = mysqli_query($conn,$emailquery);
        $emailcount =  mysqli_num_rows($query);
        


        if ($emailcount>0) { //condition of email verification 
            ?>
            <script>
                //pop up message code
                alert("email already exist");
                window.location.replace('register.html');
            </script>
            <?php
            # code...
        }
        else{
            if($Pass === $Confirm)// password condition
            {
                //insert query... adding details to database

                $q = "INSERT INTO `admin_register` VALUES(`Id`,'$Fname','$Lname','$Pass','$Email','$Phone','')";

                $query = mysqli_query($conn,$q);
                if(mysqli_query($conn, $query))
                {
                  
                } 
                ?>
                <script>
                    alert("Registered  Successfully");
                    window.location.replace('register.html');
                </script>
                <?php
                #code...
                
           }
            else
            { // wrong password code
                ?>
                <script>
                    alert("password does not matched ");
                    window.location.replace('register.html');
                </script>
                <?php
                #code...
            }

        }       
    }
?> 

*/






  //database connection
    $conn = mysqli_connect('localhost', 'root', '', 'menu_master');
    
    if ($conn) 
    {
        // echo "Connected";
    }
    else
    {
        echo "Not Connected";
    }

    if(isset($_POST['submit'])){// accessing through submit btn
        //assigning values
        $Fname=$_POST['FName'];
        $Lname=$_POST['LName'];
        $Pass=$_POST['Pass'];
        $Confirm=$_POST['ConPass'];
        $Email=$_POST['Email'];
        $Phone=$_POST['Phone'];
       // $token=bin2hex(random_bytes(15));

        // email verification
        $emailquery = "SELECT * FROM admin_register WHERE Email='$Email'";
        $query = mysqli_query($conn, $emailquery);
        $emailcount =  mysqli_num_rows($query);
        
        if ($emailcount > 0) { //condition of email verification 
            ?>
            <script>
                //pop up message code
                alert("Email already exists");
                window.location.replace('register.html');
            </script>
            <?php
        }
        else{
            if($Pass === $Confirm)// password condition
            {
                //insert query... adding details to database
               // $q = "INSERT INTO `admin_register` (`Id`, `FName`, `LName`, `Pass`, ``,`Email`, `Phone`,``) VALUES (NULL, '$Fname', '$Lname', '$Pass',' ','$Email', '$Phone','')"; 
                $q = "INSERT INTO `admin_register` (`Id`, `FName`, `LName`, `Pass`, `Email`, `Phone`) VALUES (NULL, '$Fname', '$Lname', '$Pass', '$Email', '$Phone')";

                $query = mysqli_query($conn, $q);
                if($query)
                {
                    ?>
                    <script>
                        alert("Registered Successfully");
                        window.location.replace('login.html');
                    </script>
                    <?php
                }
           }
            else
            { // wrong password code
                ?>
                <script>
                    alert("Password does not match");
                    window.location.replace('register.html');
                </script>
                <?php
            }
        }       
    }
?> 
