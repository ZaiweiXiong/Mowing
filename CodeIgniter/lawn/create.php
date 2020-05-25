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
      <script src="http://localhost/mowing/CodeIgniter/js/lawn.js"></script>
	  
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
    <div class="container">
   
        <div class="page-header">
            <h1>Create Availability</h1>
        </div>
      

    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Suburb</td>
            <td><input type='text' name='suburb' id="suburb" class='form-control' /></td>
        </tr>
        <tr>
            <td>ID</td>
            <td><input type='text' name='postcode' id="postcode" class='form-control' /></td>
        </tr>
        <tr>
            <td hidden>Address</td>
            <td hidden><input type='text' name='address' id='address' class='form-control' /></td>
        </tr>
		<tr>
            <td>Date</td>
            <td> <input type="text"  name='date' id="datepicker" class='form-control'/></td>
           
        </tr>
        <tr>
            <td>Start Time</td>
            <td><input type='time' name='startTime' id='startTime' class='form-control' /></td>
        </tr>
        <tr>
            <td>End Time</td>
            <td><input type='time' name='endTime' id='endTime' class='form-control' /></td>
        </tr>
		 <tr>
            <td>Pay</td>
            <td><input type='text' name='pay' id='pay' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='button' value='Save' id="insert" class='btn btn-primary' />
                <a href='index.php' class='btn btn-primary'>Back</a>
            </td>
        </tr>
    </table>

          
    </div> <!-- end .container -->
    <div class="help" style="margin-bottom: 20px;">
	      <a class="end" href="#" style="float: right; padding: 50px;">Help!</a>
		</div>
    </div>
 <div id="footer"></div>
</div>
</body>
</html>