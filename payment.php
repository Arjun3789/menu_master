<html>
<head>
<title>Displaying Records</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
		<link rel="stylesheet" type="text/css" href="#">
        <style>
    .menu-bar{
    background: blue;
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
    background: rgb(70,40,140);
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
    background:rgb(70,40,140);
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

#Gender
{
    background-color:green;
    color:white;
    width:90px;
    font-size:14px;
    height:25px;    
}
/*#dltbtn
{
    background-color:red;
    color:white;
    width:80px;
    font-size:14px;
    height:25px; 
}*/
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
                           <li><a href="">User</a></li>
                       </ul>
                   </div>
               </li>
                <li><a href="./QRcode.html"><i class="fa fa-qrcode"></i> QR Code</a></li>
                <li><a href="./records.php" class="fa fa-users"></i> Account</a></li>
                <li><a href="payment.php"><i class="fa fa-rupee"></i> Payment</a></li>
                <li><a href="./login.html"><i class="fa fa-sign-out"></i> Logout</a></li>
       </ul>
    </div>
    <h2 align="center" style="width:40%;margin-top:20px">Payment_Records</h2>
<h1><table   border="4" cellspacing="4" style="width:45%;margin-top:20px">
<tr>
	<th>Id</th>
	<th>Name</th>
	<th>Date</th>
    
   <!-- <th>Status</th>-->

    <!--<th colspan="2" align="center">Operations</th>-->
</tr>

</h1>
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
$query="SELECT * FROM qr_code";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
	echo"
   	<tr>
       <td>".$result['Id']."</td>
		<td>".$result['name']."</td>
        
		<td>".$result['date']."</td>
        
       
	</tr>";
	}
}
else
{
	echo "no data found";
}
?>
</table>

</body>
</html>