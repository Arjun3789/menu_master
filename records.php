<html>
<head>
<title>Displaying Records</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
		<link rel="stylesheet" type="text/css" href="#">
<style>
 
.menu-bar{
    background: rgb(70, 70, 146);
    text-align: center;
}
*{
    padding: 0;
    margin: 0;
    font-family: sans-serif ;
    box-sizing: border-box;
}
body{
   
    background-size: cover;
} 
.menu-bar{
    background: rgb(70, 70, 140);
    text-align: center;

}
.menu-bar ul{
    display: inline-flex;
    list-style: none;
    color: #fff;
}
.menu-bar ul li{
    width: 150px;
    margin: 15px;
    padding: 15px;
}
.menu-bar ul li a{
    color: white;
    text-decoration: none;
}
.active, .menu-bar ul li:hover{
    background:black;
    border-radius: 3px;
}
.menu-bar .fas{
    margin-right: 8px;
}
.sub-menu1{
    display: none;
}
.menu-bar ul li:hover .sub-menu1{
    display: block;
    position: absolute;
    background:rgb(69, 69, 131);
    margin-top: 15px;
    margin-left: -15px;
}
.menu-bar ul li:hover .sub-menu1 ul{
    display: block;
    margin: 10px;
}
.menu-bar ul li:hover .sub-menu1 ul li{
    width: 100px;
    padding: 10px;
    background: transparent;
    border-bottom: 1px dotted white;
    border-radius: 0;
    text-align: left;
}
.menu-bar ul li:hover .sub-menu1 ul li a:hover{
    color:black;
}
#editbtn
{
    background-color:green;
    color:white;
    width:80px;
    font-size:14px;
    height:25px;    
}
#dltbtn
{
    background-color:red;
    color:white;
    width:60px;
    font-size:14px;
    height:25px; 
}
</style>
</head>
<body>
<div class="menu-bar">
        <ul>
           <li ><a href="main.html"><i class="fa fa-home"></i> Home</a></li>
               <li><a href="#"><i class="fa fa-registered"></i> Registation</a>
                   <div class="sub-menu1">
                       <ul>
                           <li><a href="./register.html">Admin</a></li>
                           <li><a href="/Mess_management/User/user_register.html">User</a></li>
                       </ul>
                   </div>
               </li>
                <li><a href="./QRcode.html"><i class="fa fa-qrcode"></i> QR Code</a></li>
                <li><a href="./records.php" class="fa fa-users"></i> Account</a></li>
                <li><a href="payment.php"><i class="fa fa-rupee"></i> Payment</a></li>
                <li><a href="./login.html"><i class="fa fa-sign-out"></i> Logout</a></li>
       </ul>
    </div>
    <h2 align="center" style="width:40%;margin-top:20px">Admin_Records</h2>
<h1><table   border="4" cellspacing="4" style="width:30%; float:left;  margin-top:20px">
<tr>
	<th>Id</th>
	<th>First_Name</th>
	<th>Last_Name</th>
	<th>Email</th>
	<th>Contact</th>
    <th colspan="2" align="center">Operations</th>
</tr>
</h1>

<?php
     $conn = mysqli_connect('localhost', 'root', '', 'menu_master');
    
     if ($conn) 
     {
        //  echo "Connected";
     }
     else
     {
         echo "Not Connected";
     }
$query="SELECT * FROM admin_register";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
	echo"
   	<tr>
       <td>".$result['Id']."</td>
		<td>".$result['FName']."</td>
        <td>".$result['LName']."</td>
		<td>".$result['Email']."</td>
        <td>".$result['Phone']."</td>
        <td><a href='update_Edit.php?Id=$result[Id] & FName=$result[FName] & LName=$result[LName] & Email=$result[Email] & Phone=$result[Phone] '><input type='submit' value='Edit/Update' id='editbtn'></td>
        <td><a href='delete.php?id=$result[Id]' onclick='return checkdelete() '><input type='submit' value='Delete' id='dltbtn'></td>
	
	</tr>";
	}
}
else
{
	echo "no data found";
}
?>
</table>
<script>
    function checkdelete()
    {
        return confirm ('Are you sure you want to Delete this Record');
    }
</script>
</body>
</html>




<!--user database-->
<html>
<head>
<title>Displaying Records</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
		<link rel="stylesheet" type="text/css" href="#">
<style>
#editbtn
{
    background-color:green;
    color:white;
    width:90px;
    font-size:14px;
    height:25px;    
}
#dltbtn
{
    background-color:red;
    color:white;
    width:60px;
    font-size:14px;
    height:25px; 
}
</style>
</head>
<body>
    <h2 align="center" style="width:40%; float:right;margin:-30px;margin-right:50px;">User_Records</h2>
<h1><table   border="4" cellspacing="4" style="width:40%; float:right;margin-right:10px;margin-top:20px">
<tr>
	<th>Id</th>
	<th>First_Name</th>
	<th>Last_Name</th>
	<th>Email</th>
	<th>Contact</th>
    <th>Gender</th>
	<th>Package</th>
    <th colspan="2" align="center">Operations</th>
</tr>
</h1>

<?php
    //database connection
    $conn=mysqli_connect('localhost','root');
    mysqli_select_db($conn,'menu_master');
    if ($conn) 
    {
    	 //echo "Connected";
    	# code...
    }
    else
     {
	echo "not connected";
	#code....
     }
$query="SELECT * FROM user_register";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
	echo"
   	<tr>
       <td>".$result['Id']."</td>
		<td>".$result['FName']."</td>
        <td>".$result['LName']."</td>
		<td>".$result['Email']."</td>
        <td>".$result['Phone']."</td>
        <td>".$result['Gender']."</td>
        <td>".$result['Package']."</td>

        <td><a href='User_update_Edit.php?id=$result[Id] & fn=$result[FName] & ln=$result[LName] & eml=$result[Email] & ph=$result[Phone] & gn=$result[Gender] & pkg=$result[Package]'><input type='submit' value='Edit/Update' id='editbtn'></td>
        <td><a href='User_delete.php?id=$result[Id]' onclick='return checkdelete() '><input type='submit' value='Delete' id='dltbtn'></td>
	
	</tr>";
	}
}
else
{
	echo "no data found";
}
?>
</table>
<script>
    function checkdelete()
    {
        return confirm ('Are you sure you want to Delete this Record');
    }
</script>
</body>
</html>