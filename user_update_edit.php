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
echo "no connected";
#code....
 }
 $id=$_GET['id'];
 $fn=$_GET['fn'];
 $ln=$_GET['ln'];
 $eml=$_GET['eml'];
 $ph=$_GET['ph'];
 $gn=$_GET['gn'];
 $pkg=$_GET['pkg'];

?>
<html>
	<head>
		<title>Update Form</title>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">      
		<link rel="stylesheet" type="text/css" href="Update_Edit.css">
	</head>
	<body>
        
		<div class="container">
			<div class="card">
                <div class="card-back">
                    <form action="User_update_Edit.php" method="GET">
                    <h1>UPDATE</h1>
                        <p>Id
                        <input type="text"  name="Id" value="<?php echo "$id" ?>" class="input-box" placeholder="Id" required></p>
                        <p>First Name
                        <input type="text"  name="FName" value="<?php echo "$fn" ?>" class="input-box" placeholder="First Name" required></p>
                        <p>Last Name
                        <input type="text" name="LName" value="<?php echo "$ln" ?>" class="input-box" placeholder="Last Name" ></p>
                        
                        <p>Email Id
                        <input type="email" name="Email" value="<?php echo "$eml" ?>" class="input-box" placeholder="Email" required></p>
                        
                        <p>Gender
                        <input type="text" name="Gender" value="<?php echo "$gn" ?>" class="input-box" placeholder="Gender" required></p>
                        <p>Package
                        <input type="text" name="Package" value="<?php echo "$pkg" ?>" class="input-box" placeholder="Package" required></p>
                        <p>Contact_Number
                        <input type="number" name="Phone" value="<?php echo "$ph" ?>" class="input-box" placeholder="Contact_Number" required></p>
                        <a href="">
                        <button type="submit" value="submit" name="submit" class="reg-btn">UPDATE DETAILS</button></a>		
                        </form>
                    
                </div>	
            </div>
        </div>
    
    </body>
</html>
<?php 
 if(isset($_GET['submit']))
 {
    $Id=$_GET['Id'];
    $FName=$_GET['FName'];
    $LName=$_GET['LName'];
    $Email=$_GET['Email'];
    $Phone=$_GET['Phone'];
    $Gender=$_GET['Gender'];
    $Package=$_GET['Package'];

    $query="UPDATE user_register SET Id='$Id', FName='$FName',LName='$LName',Email='$Email',Phone='$Phone',Gender='$Gender',Package='$Package' WHERE Id='$Id'";
    $data=mysqli_query($conn,$query);

    if($data)
    {
    ?>
    <script>
    //pop up message code
    alert("Record Updated");
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
    alert("Failed to Update");
    window.location.replace('records.php');
    </script>
    <?php
    #code...
    }

 }
?>