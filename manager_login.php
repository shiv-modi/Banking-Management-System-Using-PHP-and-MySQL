<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Charusat Bank</title>
    <link href="images/charusat_symbol.jpg" rel="icon">
   <link href="images/charusat_symbol.jpg" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
 
</head>

<?php
$con = new mysqli('localhost','root','','charusat_bank');
	if (isset($_POST['login']))
    {
        $error = "";
          $user = $_POST['email'];
        $pass = $_POST['password'];
       
        $result = $con->query("select * from manager where email='$user' AND password='$pass' AND type='manager'");
        if($result->num_rows>0)
        { 
          session_start();
          $data = $result->fetch_assoc();
          $_SESSION['loginid']=$data['id'];
          //$_SESSION['user'] = $data;
          header('location:manager_home.php');
         }
        else
        {
            echo '<script>alert("Username or password wrong try again!")</script>';
        }
    }

 ?>




<body scroll="no" style="overflow: hidden">
    <div class="image">
   <img src="images/charusat_bank.jpg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form  method="POST" autocomplete="">
        
                    <h2 class="text-center1"  >Manager Login </h2>
          
                    <p class="text-center1">Login with your email and password.</p>
                    <style>
                    .text-center1 {
                     text-align: center!important;
                     color: red;
}
    
</style>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                 
                    <div class="form-group1">
                        <input class="form-control button" type="submit" name="login" value="Login">
                        
                    </div>
                    <br>
                    <div class="link login-link text-center">Not a member? <a href="login.php">User Login </a></div>
                    
                    <h6>or</h6>
                    <style>
                        h6 {
    overflow: hidden;
    text-align: center;
}
h6:before,
h6:after {
   
    color: grey;
    display: inline-block;
    height: 2px;
    position: relative;
    vertical-align: middle;
    width: 50%;
}
h6:before {
    right: 0.5em;
    margin-left: -50%;
}
h6:after {
    left: 0.5em;
    margin-right: -50%;
}h6 {
    overflow: hidden;
    text-align: center;
}
h6:before,
h6:after {
    background-color: #000;
    content: "";
    display: inline-block;
    height: 1px;
    position: relative;
    vertical-align: middle;
    width: 30%;
}
h6:before {
    right: 0.5em;
    margin-left: -50%;
}
h6:after {
    left: 0.5em;
    margin-right: -50%;
}
                        </style>
                    <center><a href="cashier.php">Cashier Login </a></div></center>
                </form>
            </div>
        </div>
    </div>
    </div>

   
</body>
</html>
