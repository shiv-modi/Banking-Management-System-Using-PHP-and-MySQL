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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </head>

  <?php require 'includes/function.php'; 
     $con = new mysqli('localhost','root','','charusat_bank');
     ?>
  
  <?php if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from feedback where feedbackid = '$_GET[delete]'"))
    {
      header("location:manager_feedback.php");
    }
  } ?>
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
            <li><a  href="manager_home.php">Home</a></li>
            <li><a href="manager_accounts.php" class="active">Accounts</a></li>
            <li><a href="addnewaccount.php">Add new Account</a></li>
            <li><a href="manager_feedback.php">Feedback</a></li>
            <li><a  href="logout.php" class="active">Logout</a></li>
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
<?php
if (isset($_POST['saveAccount']))
{
  if (!$con->query("insert into login (email,password,type) values ('$_POST[email]','$_POST[password]','cashier')")) {
    echo "<div claass='alert alert-success'>Failed. Error is:".$con->error."</div>";
  }
}
if (isset($_GET['del']) && !empty($_GET['del']))
{
  $con->query("delete from login where id ='$_GET[del]'");
}
  $array = $con->query("select * from login where type='cashier'");
  
 ?>
<div class="container">
<div>
  <div class="card-header"><h4 style="color:#CC3300;" >All Staff Accounts
    <button class="btn btn-outline-danger btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Add New Account</button>
  </div></h4>
  <div >
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Email</th>
          <th>Password</th>
          <th>Account Type</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if ($array->num_rows > 0)
          {
            while ($row = $array->fetch_assoc())
            {
              echo "<tr>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['password']."</td>";
              echo "<td>".$row['type']."</td>";
              echo "<td><a href='manager_accounts.php?del=$row[id]' class='btn btn-danger btn-sm'>Delete</a></td>";
              echo "</tr>";
            }
          }
         ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Cashier Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST">
          Enter Details
         <input class="form-control w-75 mx-auto" type="email" name="email" required placeholder="Email">
         <input class="form-control w-75 mx-auto" type="password" name="password" required placeholder="Password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="saveAccount" class="btn btn-primary">Save Account</button>
      </form>
      </div>
    </div>
  </div>
</div>
</body>