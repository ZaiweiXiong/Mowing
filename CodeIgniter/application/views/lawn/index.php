<!DOCTYPE HTML>
<html>
<head>
      <link   href='<?php echo base_url(); ?>lawn/assets/css/fullcalendar.css' rel='stylesheet' />
      <link   href='<?php echo base_url(); ?>lawn/assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
      <script src='<?php echo base_url(); ?>lawn/assets/js/jquery-1.10.2.js' type="text/javascript"></script>
      <script src='<?php echo base_url(); ?>lawn/assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
      <script src='<?php echo base_url(); ?>lawn/assets/js/fullcalendar.js' type="text/javascript"></script>
      <link   href='<?php echo base_url(); ?>lawn/calender.css' rel='stylesheet'/>
      
      <link   rel="stylesheet" href="http://localhost/mowing/CodeIgniter/js/jquery-ui/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="http://localhost/mowing/CodeIgniter/js/lawn.js"></script>
	  
     <script> 
		$(function(){
		  $("#header").load("<?php echo base_url(); ?>lawn/header.html"); 
		  $("#footer").load("<?php echo base_url(); ?>lawn/footer.html"); 
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
            <li id="mybooking" class="active navbar-li"><a href="http://localhost/mowing/CodeIgniter/lawn/index.php" ><span class="glyphicon glyphicon-calendar"></span> My Bookings</a></li>
            <li id="myprofile" class="navbar-li"><a href="http://localhost/mowing/CodeIgniter/lawn/details.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
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
    <div class="container-fluid" id="result">
  
            <h1>Time Sheet </h1>
            <div id='mysearch'>
            <label for="fname">  &nbsp &nbsp&nbsp  Select date:</label>
            <input type="text"  name='date' id="datepicker_" style="	text-align: center"	/>
            </div>
            <div style="overflow-x:auto;">
        <?php
include 'config/database.php';
 

$query = "SELECT suburb, date, time_from, time_to,hourly_rate FROM residentavaiability";
                                                           
$stmt = $con->prepare($query);
$stmt->execute();
 
$num = $stmt->rowCount();
 

 
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 

    echo "<tr style='background-color: #C0C0C0;'>";
        echo "<th>Suburb</th>";
        echo "<th>Date</th>";
        echo "<th>Start Time</th>"; 
        echo "<th>End Time</th>";
        echo "<th>Pay</th>";
        echo "<th> </th>";
    echo "</tr>";
     
   
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    extract($row);
     
    echo "<tr style='background-color: #9ACD32;'>";
        echo "<td>{$suburb}</td>";
        echo "<td>{$date}</td>";
        echo "<td>{$time_from}</td>";
        echo "<td>{$time_to}</td>";
        echo "<td>&#36;{$hourly_rate}</td>";
        echo "<td>";
             
            echo "<a href='detail.php?id={$suburb}&pay={$hourly_rate}&date={$date}&st={$time_from}&et={$time_to}' name={$suburb} id='detail'  class='btn btn-info m-r-1em'>Details</a>"; 
            echo" ";
            echo "<a href='edit.php?id={$suburb}&pay={$hourly_rate}&date={$date}&st={$time_from}&et={$time_to}' name={$suburb}  class='btn btn-primary m-r-1em'>Edit</a>";
            echo" ";
            echo "<a href='#' name={$suburb} id='delete' onclick='delete_user(this.name);' class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
} 

echo "</table>";
}
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}

echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create Availability</a>";

?>
<div class="help" style="margin-bottom: 20px;">
	      <a class="end" href="#" style="float: right; padding: 50px;">Help!</a>
		</div>
</div>
    </div> 

 <div id="footer"></div>
</div>
</body>
</html>