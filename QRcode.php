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
        $sql = "SELECT * FROM user_register WHERE email='$email'";
        $result = mysqli_query($conn,$sql);

        if($result->num_rows > 0)// checking for email exist or not
        {
            $row = mysqli_fetch_assoc($result);
            echo $row['FName'];
        }    
    } 
 ?>       