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
require_once 'includes/auth.php';
if (isset($_POST['cashierLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $data = authenticate($con, 'login', $user, $pass, 'cashier');
		    if($data)
		    { 
		      session_start();
		      $_SESSION['cashid']=$data['id'];
		      //$_SESSION['user'] = $data;
		      header('location:cashier_index.php');
		      exit;
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
        
                    <h2 class="text-center1"  >Cashier Login </h2>
          
                    <p class="text-center1">Login with your email and password.</p>
                    <style>
                    .text-center1 {
                     text-align: center!important;
                     color: green;
}
    
</style>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>


                    <div class="form-group1">
                        <input class="form-control button" type="submit" name="cashierLogin" value="Login">
                        
                    </div>
                    <br>
                    <div class="link login-link text-center">Not a member? <a href="manager_login.php">Manager Login </a></div>
                </form>
            </div>
        </div>
    </div>
    </div>

   
</body>
</html>
