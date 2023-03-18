
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
   
	
		$error = "";
		if (isset($_POST['userlogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['userid']=$data['id'];
		      $_SESSION['user'] = $data;
		      header('location:home.php?id='.$_SESSION['userid']);
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
        
                    <h2 class="login-panel">User Login </h2>
                    <p class="login-panel">Login with your email and password.</p>
                    <style>
                    .login-panel {
                     text-align: center!important;
                     
                     }
    
</style>
                
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="userlogin" value="Login">
                    </div>
                    <div class="link login-link login-panel">Not a member? <a href="manager_login.php">Manager Login </a></div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
