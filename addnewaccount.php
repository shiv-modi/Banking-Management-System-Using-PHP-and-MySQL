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
            <li><a href="manager_accounts.php" >Accounts</a></li>
            <li><a href="addnewaccount.php" class="active">Add new Account</a></li>
            <li><a href="manager_feedback.php">Feedback</a></li>
            <li><a class="active" href="login.php">Logout</a></li>
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
<!-- add new -->
<!DOCTYPE html>  
<html>  
<head>  
<meta charset="utf-8">
      <title>Charusat Bank</title>
    <link href="assets/images/charusat_symbol.jpg" rel="icon">
   <link href="assets/images/charusat_symbol.jpg" rel="apple-touch-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
<meta name="viewport" content="width=device-width, initial-scale=1.0">  



<script type="text/javascript">  
        (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('needs-validation');  
                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();  
    </script>  
</head>  


<?php

if (isset($_POST['submit']))
{
    
    
  if (!$conn->query("insert into useraccounts (name,aadhaar,gender,email,phonenumber,city,address,password,profile,dob,accountno,accounttype,deposit,occupation) values('$_POST[name]','$_POST[aadhaar]','$_POST[gender]','$_POST[email]','$_POST[phonenumber]','$_POST[city]','$_POST[address]','$_POST[password]','$_POST[profile]','$_POST[dob]','$_POST[accountno]','$_POST[accounttype]','$_POST[deposit]','$_POST[occupation]')")) {
    
    echo "<div claass='alert alert-success'>Failed. Error is:".$conn->error."</div>";
   
   
  }
  
  else
    echo "<div class='alert alert-info text-center'>Account added Successfully</div>";

}

if (isset($_GET['del']) && !empty($_GET['del']))
{
  $con->query("delete from login where id ='$_GET[del]'");
}
  

  
 ?>



      
<body>  
 <br>
        <div class="row">  
            <div class="offset-md-2 col-md-8 offset-md-2">  
                <div class="card">  
                    <div class="card-header bg-primary text-white">  
                       <center> <h4 class="card-title text-uppercase col-xs-1 center-block"> New Account Forum</h4>  </center>
                    </div>  
                    <div class="card-body">  
                        <form id="needs-validation" method="POST" >  
                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="name">Name</label>  
                                        <input type="text" id="name" pattern="[A-Za-z\s]+" name="name" placeholder=" Enter Your Name" class="form-control" aria-describedby="inputGroupPrepend" required />  
                                        <div class="invalid-feedback">  
                                            Please Enter Your Full Name 
                                        </div>  
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label>Aadhaar card </label>  
                                        <input type="tel" id="aadhaar" name="aadhaar" pattern="^\d{12}$"  placeholder="Enter Your Aadhaar card "class="form-control"  required />  
                                        <div class="invalid-feedback">  
                                        Please Enter Your Aadhaar card
                                        </div>
         
                                    </div>  
                                </div>  
                            </div>  
                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="Gender">Gender</label>  
                                        <select name="gender" class="custom-select" required>  
                                            <option value="">Select Gender</option>  
                                            <option value="Male">Male</option>  
                                            <option value="Female">Female</option>  
                                        </select>  
                                        <div class="invalid-feedback">Please choose gender</div>  
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="email">Email address</label>  
                                        <input type="email" name="email"class="form-control" pattern="^[a-zA-Z0-9]+[0-9]@gmail\.com$" id="email" placeholder="email address" aria-describedby="inputGroupPrepend" required>  
                                        <div class="invalid-feedback">  
                                            Please provide a valid email.  
                                        </div>  
                                    </div>  
                                </div>  
                         
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label>Mobile Number</label> 
                             
                                        <input type="number" name="phonenumber" pattern="[6789][0-9]{9}" class="form-control" maxlength="10" id="phonenumber" placeholder="Mobile Number" required/>    
                                </div>  
                            </div>  
                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="Password">Password</label>  
                                        <input type="Password"  name="password"class="form-control" maxlength="10" id="Password" placeholder="Enter Your Password " aria-describedby="inputGroupPrepend" required>  
                                        <div class="invalid-feedback">  
                                            Please Enter a  Password.  
                                        </div>  
                                    </div>  
                                </div>  
                            </div>
                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="city">City</label>  
                                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter You City" aria-describedby="inputGroupPrepend" required>  
                                        <div class="invalid-feedback">Please Enter Your City</div>  
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="Address">Address</label>  
                                        <input type="Address" maxlength="50" name="address" class="form-control" id="Address" placeholder="Enter Your Address " aria-describedby="inputGroupPrepend" required>  
                                        <div class="invalid-feedback">  
                                            Please provide a valid Address.  
                                        </div>  
                                    </div>  
                                </div>  
                                
                            </div>
                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label>Profile Picture</label>  
                                        <div class="custom-file">  
                                            <input type="file" name="profile" class="custom-file-input" id="validatedCustomFile" required>  
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>  
                                            <div class="invalid-feedback">Choose file for upload</div>  
                                        </div>  
                                    </div>                                  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label>Date Of Birthdate</label>  
                                            <input type="date" name="dob" class="form-control"  required>  
                                    </div>
                                        </div>  
                            </div>  
                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="accountNo">Account Number</label>  
                                        <input type="" name="accountno" readonly value="<?php echo time() ?>" class="form-control input-sm" required>
                                      
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="Aadhaar">Account Type</label>  
                                        <select name="accounttype"class="custom-select" required>  
                                              
                                            <option value="Saving">Saving</option>  
                                            <option value="Current">Current</option>  
                                        </select>  
                                     
                                    </div>  
                                </div>  
                            </div>  
                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="Deposit">Deposit</label>  
                                        <input type="number" name="deposit" min="3000" max="100000"class="form-control input-sm" required>
                                        <div class="invalid-feedback">  
                                            Minimun amount Rs 3000 and Maximum amount Rs 100000 
                                        </div>
                                    </div>  
                                </div>  
                              
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="Occupation">Occupation</label>  
                                        <input type="text" name="occupation" class="form-control input-sm" required>
                                        <div class="invalid-feedback">  
                                           Please Enter Your Occupation
                                        </div>
                                    </div>  
                                </div>  
                            </div>
              
                            <div class="row">  

                                <div class="col-sm-12 col-md-12 col-xs-12">  
                                    <div class="float-right">  
                                   <a  href="manager_home.php" button class="btn btn-danger rounded-0" type="submit">Cancel</button></a> 
                                        <button class="btn btn-primary rounded-0" name="submit" id="submit"type="submit">Register</button>  

                                        
                                  
                                    </div>                            
                                </div>  
                            </div>  
                           
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
 
    
</body>  
</html>  

  </div>
