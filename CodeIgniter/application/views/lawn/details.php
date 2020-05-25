<!DOCTYPE HTML>
<html>
<head>
      <link   href='assets/css/fullcalendar.css' rel='stylesheet' />
      <link   href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
      <script src='assets/js/jquery-1.10.2.js' type="text/javascript"></script>
      <script src='assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
      <script src='assets/js/fullcalendar.js' type="text/javascript"></script>
      <link href='calender.css' rel='stylesheet'/>
      
      <link   rel="stylesheet" href="http://localhost/mowing/CodeIgniter/js/jquery-ui/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="http://localhost/mowing/CodeIgniter/js/mylawn.js"></script>
	  
     <script> 
		$(function(){
		  $("#header").load("header.html"); 
		  $("#footer").load("footer.html"); 
		});
     </script>    
</head>

<body>
<nav class="navbar navbar-inverse ">
   	<a class="navbar-brand" href="#">
    <img src="http://localhost/mowing/CodeIgniter/lawn/lm.png" alt="logo" style="width:40px;">
     </a>
     
      <div class="container-fluid">
         <ul class="nav navbar-nav navbar-right">
            <li class=" navbar-li" id="home"><a href="http://localhost/mowing/CodeIgniter/lawn/home.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li id="mybooking" class="navbar-li"><a href="http://localhost/mowing/CodeIgniter/lawn/index.php" ><span class="glyphicon glyphicon-calendar"></span> My Bookings</a></li>
            <li id="myprofile" class="active navbar-li"><a href="http://localhost/mowing/CodeIgniter/lawn/details.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
            <li id="messages" class="navbar-li"><a href="http://localhost/mowing/CodeIgniter/lawn/messages.php" ><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
            <li id="logout" class="navbar-li"><a href="#" ><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-left">
            <li><a href="#"> </a></li>
         </ul>
      </div>
   </nav>
  <div id="header"></div>
  <div id="page-container">
    
  <h1>My Profile </h1>
  <div class="container-fluid" id="result">
  
  <?php
include 'config/database.php';
 

$query = "SELECT residentFName, residentLName, email, contact FROM `resident` WHERE `residentID` LIKE '1R'";
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->rowCount(); 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    extract($row);
    echo "<table class='table table-hover table-responsive table-bordered;'  >"  ; 
    echo "<tr>";
    echo "<td  style='background-color: #C0C0C0;'>First name</td>";
    echo "<td  style='background-color: #F0FFFF;'>{$residentFName}</td>";
       
     echo "</tr>";
    echo "<tr>";
         echo "<td  style='background-color: #C0C0C0;'>Last Name</td>";
         echo "<td  style='background-color: #F0FFFF;'>{$residentLName}</td>";
 
    echo "</tr>";
    echo "<tr>";
    echo "<td  style='background-color: #C0C0C0;'>Contact</td>";
    echo "<td  style='background-color: #F0FFFF;'>{$contact}</td>";
echo "</tr>";
echo "<tr>";
echo "<td  style='background-color: #C0C0C0;'>Email</td>";

echo "<td  style='background-color: #F0FFFF;'>{$email}</td>";

echo "</tr>";
     echo "</table>";
} 
?>
  <div class="help" style="margin-bottom: 20px;">
	      <a class="end" href="#" style="float: right; padding: 50px;">Help!</a>
		</div>
</div>
 <div id="footer"></div>
</div>
</body>
</html>