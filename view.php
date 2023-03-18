<?php
session_start();
if(!isset($_SESSION['loginid'])){ header('location:manager_login.php');}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Charusat Bank</title>
    <link href="images/charusat_symbol.jpg" rel="icon">
   <link href="images/charusat_symbol.jpg" rel="apple-touch-icon">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.scss"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <?php require 'includes/db_conn.php'; ?>
  <?php require 'includes/function.php'; ?>
   <body>
      <nav>
      
         <div class="logo" >
         <img src="images/charusat_symbol.jpg" width="45" alt="" class="logo-img">
         Charusat Bank
         </div>
        <style> 
        .logo-img{
            margin-bottom: -9px;
        }
        </style>
         <input type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="fas fa-bars"></i>
         </label>
         <ul>
            <li><a class="active" href="manager_home.php">Home</a></li>
            <li><a href="#">Accounts</a></li>
            <li><a href="addnewaccount.php">Add new Account</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a class="active"  href="login.php">Logout</a></li>
         </ul>
      </nav>

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
.logo-img {
    margin-bottom: 6px;
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
dl, ol, ul {
    margin-top: 12px;
    margin-bottom: 1rem;
}
</style>
			
			<body>                                                       
<div class="card-body">
<?php 

  $con = new mysqli('localhost','root','','charusat_bank');
  $array = $con->query("select * from useraccounts  where useraccounts.id = '$_GET[id]'");
  $row = $array->fetch_assoc();
 ?>
 <br>
 <br>
 <br>


<h1 style="text-align:center; color:#CC3300;" >Account No : <?php echo $row['accountno']; ?></h1>
              <div class="table-responsive">
              <br>
         
              <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $row['name'] ?></th>
          <td>Account No</td>
          <th><?php echo $row['accountno'] ?></th>
        </tr><tr>
         
          <td>Current Balance</td>
          <th><?php echo $row['deposit'] ?></th>
          <td>Account Type</td>
          <th><?php echo $row['accounttype'] ?></th>
        </tr><tr>
          <td>Aadhaar Card</td>
          <th><?php echo $row['aadhaar'] ?></th>
          <td>City</td>
          <th><?php echo $row['city'] ?></th>
        </tr><tr>
          <td>Contact Number</td>
          <th><?php echo $row['phonenumber'] ?></th>
          <td>Address</td>
          <th><?php echo $row['address'] ?></th>
        </tr>
      </tbody>
    </table>
 
              </div>
            </div>
</body>
</html>
			