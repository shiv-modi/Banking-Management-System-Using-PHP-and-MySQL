
<?php
session_start();
if(!isset($_SESSION['userid'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Charusat Bank</title>
      <link href="images/charusat_symbol.jpg" rel="icon">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <style>
body {
	background: #eeeeee;
}
.form-inline {
	display: inline-block;
}
.navbar-header.col {
	padding: 0 !important;
}
.navbar {		
	background: #fff;
	padding-left: 16px;
	padding-right: 16px;
	border-bottom: 1px solid #d6d6d6;
	box-shadow: 0 0 4px rgba(0,0,0,.1);
}
.nav-link img {
	border-radius: 50%;
	width: 36px;
	height: 36px;
	margin: -8px 0;
	float: left;
	margin-right: 10px;
}
.navbar .navbar-brand {
	color: #555;
	padding-left: 0;
	padding-right: 50px;
	font-family:  'Poppins', sans-serif;
}
.navbar .navbar-brand i {
	font-size: 20px;
	margin-right: 5px;
}
.navbar .nav-item i {
	font-size: 18px;
}
.navbar .dropdown-item i {
	font-size: 16px;
	min-width: 22px;
}
.navbar .nav-item.open > a {
	background: none !important;
}
.navbar .dropdown-menu {
	border-radius: 1px;
	border-color: #e5e5e5;
	box-shadow: 0 2px 8px rgba(0,0,0,.05);
}
.navbar .dropdown-menu a {
	color: #777;
	padding: 8px 20px;
	line-height: normal;
}
.navbar .dropdown-menu a:hover, .navbar .dropdown-menu a:active {
	color: #333;
}	
.navbar .dropdown-item .material-icons {
	font-size: 21px;
	line-height: 16px;
	vertical-align: middle;
	margin-top: -2px;
}
.navbar .badge {
	color: #fff;
	background: #f44336;
	font-size: 11px;
	border-radius: 20px;
	position: absolute;
	min-width: 10px;
	padding: 4px 6px 0;
	min-height: 18px;
	top: 5px;
}
.navbar a.notifications, .navbar a.messages {
	position: relative;
	margin-right: 10px;
}
.navbar a.messages {
	margin-right: 20px;
}
.navbar a.notifications .badge {
	margin-left: -8px;
}
.navbar a.messages .badge {
	margin-left: -4px;
}	
.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
	background: transparent !important;
}
@media (min-width: 1200px){
	.form-inline .input-group {
		width: 300px;
		margin-left: 30px;
	}
}
@media (max-width: 1199px){
	.form-inline {
		display: block;
		margin-bottom: 10px;
	}
	.input-group {
		width: 100%;
	}
}

  img {
    vertical-align: -15px;
    border-style: none;
    margin-right: 10px;

}
b, strong {
    font-weight: 600;
}
</style>
<body>
<nav class="navbar navbar-expand-xl navbar-light bg-light">
	<a href="home.php" class="navbar-brand"><img src="images/charusat_symbol.jpg" width="45" alt="" class="logo-img"><b>Charusat Bank</b></a>
  
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav ">
			<a href="home.php" class="nav-item nav-link ">Home</a>
			<a href="#" class="nav-item nav-link active">Accounts</a>
			<!-- <div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item">Account Statements</a>
					<a href="#" class="dropdown-item">Funds Transfer</a>
					<a href="#" class="dropdown-item">Graphic Design</a>
					<a href="#" class="dropdown-item">Digital Marketing</a>
				</div>
			</div> -->
			<a href="statement.php" class="nav-item nav-link">Account Statements</a>
			<a href="funds_transfer.php" class="nav-item nav-link">Funds Transfer</a>
   
		</div>
    <?php 
 $con = new mysqli('localhost','root','','charusat_bank');

 $ar = $con->query("select * from useraccounts where id = '$_SESSION[userid]'");
 $userData = $ar->fetch_assoc();

 ?>
		<div class="navbar-nav ml-auto">
    &nbsp; <a href="" class="btn btn-warning " data-toggle="tooltip" title="Your current Account Balance">Acount Balance : Rs.<?php echo $userData['deposit']; ?></a>  
   &nbsp;&nbsp;
   <a href="notice.php">	<button type="button"  class="nav-item nav-link notifications"> <i class="fa fa-bell-o"></i></button></a>&nbsp;
      <button type="button" class="nav-item nav-link notifications" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-envelope-o"></i></button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" value ="manager"class="form-control"  readonly>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="msg" required></textarea>
          </div>
       
      </div>
      <?php
    if (isset($_POST['send']))
    {
      if ($con->query("insert into feedback (message,userid) values ('$_POST[msg]','$_SESSION[userid]')")) {
        echo '<script>alert("Message send Succesfully")</script>';
      }else
      echo "<div class='alert alert-danger'>Not sent Error is:".$con->error."</div>";
    }
    
    ?>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="send" class="btn btn-primary">Send message</button>

      </div>
      </form>
    </div>
  </div>
</div>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="<?php echo "images/".$userData['profile'];?>"width="100px" alt="image";>
 
 <?php echo $userData['name']; ?> <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="profile.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
					<div class="dropdown-divider"></div>
					<a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>
   <?php require 'includes/function.php'; ?>
 
   <?php 
 $con = new mysqli('localhost','root','','charusat_bank');

 $ar = $con->query("select * from useraccounts where id = '$_SESSION[userid]'");
 $userData = $ar->fetch_assoc();

 ?>
 <br>
     <div class="container">
     <br>
              <br>
           
              <br>
      <h1 style="text-align:center; color:#CC3300;" >Your Account Information</h1>
              <div class="table-responsive">
              <br>
    
              

              <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $userData['name'] ?></th>
          <td>Account No</td>
          <th><?php echo $userData['accountno'] ?></th>
        </tr><tr>
         
          <td>Current Balance</td>
          <th><?php echo $userData['deposit'] ?></th>
          <td>Account Type</td>
          <th><?php echo $userData['accounttype'] ?></th>
        </tr><tr>
        <td>Gender</td>
          <th><?php echo $userData['gender'] ?></th>
          <td>E-mail</td>
          <th><?php echo $userData['email'] ?></th>
          </tr></tr>
          <td>Aadhaar Card</td>
          <th><?php echo $userData['aadhaar'] ?></th>
          <td>City</td>
          <th><?php echo $userData['city'] ?></th>
        </tr><tr>
          <td>Contact Number</td>
          <th><?php echo $userData['phonenumber'] ?></th>
          <td>Address</td>
          <th><?php echo $userData['address'] ?></th>
        </tr>
        <td>Occupation</td>
          <th><?php echo $userData['occupation'] ?></th>
          <td>Created</td>
          <th><?php echo $userData['time'] ?></th>
    </tr></tr>
      </tbody>
    </table>
              </div>
     </div>
   </body>


<!-- css account.php -->

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} 
nav{
  display: flex;
  height: 80px;
  width: 100%;
  background: #1b1b1b;
  align-items: center;
  justify-content: space-between;
  padding: 0 50px 0 100px;
  flex-wrap: wrap;
}
nav .logo {
    color: #fff;
    font-size: 29px;
    font-weight: 600;
    /* left: 12px; */
    /* left: 27px; */
    /* align-content: baseline; */
    /* align-items: baseline; */
    margin-left: -24px;
}
nav ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
}
nav ul li{
  margin: 0 5px;
}
nav ul li a{
  color: #f2f2f2;
  text-decoration: none;
  font-size: 18px;
  font-weight: 500;
  padding: 8px 15px;
  border-radius: 5px;
  letter-spacing: 1px;
  transition: all 0.3s ease;
}
nav ul li a.active,
nav ul li a:hover{
  color: #111;
  background: #fff;
}
nav .menu-btn i{
  color: #fff;
  font-size: 22px;
  cursor: pointer;
  display: none;
}
input[type="checkbox"]{
  display: none;
}
@media (max-width: 1000px){
  nav{
    padding: 0 40px 0 50px;
  }
}
@media (max-width: 920px) {
  nav .menu-btn i{
    display: block;
  }
  #click:checked ~ .menu-btn i:before{
    content: "\f00d";
  }
  nav ul{
    position: fixed;
    top: 80px;
    left: -100%;
    background: #111;
    height: 100vh;
    width: 100%;
    text-align: center;
    display: block;
    transition: all 0.3s ease;
  }
  #click:checked ~ ul{
    left: 0;
  }
  nav ul li{
    width: 100%;
    margin: 40px 0;
  }
  nav ul li a{
    width: 100%;
    margin-left: -100%;
    display: block;
    font-size: 20px;
    transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
  #click:checked ~ ul li a{
    margin-left: 0px;
  }
  nav ul li a.active,
  nav ul li a:hover{
    background: none;
    color: cyan;
  }
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: -1;
  width: 100%;
  padding: 0 30px;
  color: #1b1b1b;
}
.content div{
  font-size: 40px;
  font-weight: 700;
}
</style>