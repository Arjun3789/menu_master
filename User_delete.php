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
	echo "not connected";
	#code....
     }
     $id=$_GET['id'];
    $query="DELETE  FROM user_register WHERE Id='$id'";
    $data=mysqli_query($conn,$query);

    if($data)
    {
    ?>
    <script>
    //pop up message code
    alert("Record Deleted From Database");
    window.location.replace('records.php');
    </script>
    <?php
    #code...
    }
    else
    {
    ?>
    <script>
    //pop up message code
    alert("Failed to Delete Record From Database");
    window.location.replace('records.php');
    </script>
    <?php
    #code...
    }
?>