<?php
    $con = new mysqli('localhost','root','','charusat_bank');
session_start();
if(!isset($_SESSION['cashid'])){ header('location:cashier_index.php');}
?><!DOCTYPE html>

<html lang="en">
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
<link rel="stylesheet" href="assets/css/home.scss">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
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
            
         
            <li><a class="active" href="logout.php">Logout</a></li>
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

 <?php require 'includes/function.php'; ?>
  <?php $note ="";
    if (isset($_POST['withdrawOther']))
    { 
      $accountNo = $_POST['otherNo'];
      $checkNo = $_POST['checkno'];
      $amount = $_POST['amount'];
      if(setOtherBalance($amount,'debit',$accountNo))
      $note = '<script>alert("successfully transaction done")</script>';
      
      else
      $note = '<script>alert("Failed transaction ")</script>';

    }
    if (isset($_POST['withdraw']))
    {
      setBalance($_POST['amount'],'debit',$_POST['accountNo']);
      makeTransactionCashier('withdraw',$_POST['amount'],$_POST['checkno'],$_POST['userid']);
      $note = '<script>alert("successfully transaction done")</script>';

    }
    if (isset($_POST['deposit']))
    {
      setBalance($_POST['amount'],'credit',$_POST['accountNo']);
      makeTransactionCashier('deposit',$_POST['amount'],$_POST['checkno'],$_POST['userid']);
      $note = '<script>alert("successfully transaction done")</script>';

    }
   ?>
   <div className="maincontainer">
            <div class="container py-5">
              <div class="row">
                <div class=" mx-auto">
                  <div class="bg-white rounded-lg shadow-sm p-5">
                   
                    <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
            
                      <li class="nav-item">
                       
                      <h5> <i class="fa fa-university fa-lg" >&nbsp;Account Information</i> </h5>
                                        
                      </li>
                    </ul>
                    
                    <div class="tab-content">
  
                      
                      <div id="nav-tab-card" class="tab-pane fade show active">
                            <!-- php  -->

                        <form role="form" method="POST" >
                      
                          <div class="form-group">
                            <label > Account number</label>
                            <div class="input-group">
                              <input type="text"  name="otherNo"  placeholder="Enter Your Account number" class="form-control"  />
                              <div class="input-group-append">
                              <button class="btn btn-secondary" type="submit" name="get">Get Account Info</button>
                             </div>
                            </div>
                          </div>
                        </form>
                        <?php if (isset($_POST['get'])) 
      {
        $array2 = $con->query("select * from otheraccounts where accountno = '$_POST[otherNo]'");
        $array3 = $con->query("select * from userAccounts where accountno = '$_POST[otherNo]'");
        {
          if ($array2->num_rows > 0) 
          { $row2 = $array2->fetch_assoc();
            echo "<div class='row'>
                  <div class='col'>
                  <form method='POST'>
                    Account No.
                    <input type='text' value='$row2[accountno]' name='otherNo' class='form-control ' readonly required>
                    Account Holder Name.
                    <input type='text' class='form-control' value='$row2[holdername]' readonly required>
                    Account Holder Bank Name.
                    <input type='text' class='form-control' value='$row2[bankname]' readonly required>
                     
                  
                  </div>
                  <div class='col'>
                    Bank Balance
                    <input type='text' class='form-control my-1'  value='Rs.$row2[deposit]' readonly required>
                    <input type='number' class='form-control my-1' name='checkno' placeholder='Write Check Number' required>
                    <input type='number' class='form-control my-1' name='amount' placeholder='Write Amount' min='3000' max='$row2[deposit]' required>
                   <button type='submit' name='withdrawOther' class='btn btn-success '> Withdraw</button></form>
                  </div>
                </div>";
          }elseif ($array3->num_rows > 0) {
           $row2 = $array3->fetch_assoc();
            echo "
            <div class='row'>
                  <div class='col'>
                  
                    Account No.
                    <input type='text' value='$row2[accountno]' name='otherNo' class='form-control ' readonly required>
                    Account Holder Name.
                    <input type='text' class='form-control' value='$row2[name]' readonly required>
                    Balance.
                    <input type='text' class='form-control my-1'  value='Rs.$row2[deposit]' readonly required>
                     
                  
                  </div>
                  <div class='col'>
                    Transaction Process.
                    <form method='POST'>
                     
                    <input type='hidden' value='$row2[accountno]' name='accountNo' class='form-control ' required>
                    <input type='hidden' value='$row2[id]' name='userid' class='form-control ' required>
                    <input type='number' class='form-control my-1' name='checkno' placeholder='Write Check Number' required>
                    <input type='number' class='form-control my-1' name='amount' placeholder='Write Amount for withdraw'min='3000' max='$row2[deposit]' required>
                   <button type='submit' name='withdraw' class='btn btn-primary btn-bloc btn-sm my-1'> Withdraw</button></form><form method='POST'> 
                    <input type='hidden' value='$row2[accountno]' name='accountNo' class='form-control ' required>
                    <input type='hidden' value='$row2[id]' name='userid' class='form-control ' required>
                   <input type='number' class='form-control my-1' name='checkno' placeholder='Write Check Number' required>
                    <input type='number' class='form-control my-1' name='amount' placeholder='Write Amount for deposit'  required>

                   <button type='submit' name='deposit' class='btn btn-success'> Deposit</button></form>
                  </div>
                </div>
            ";
          }
          else
            echo "<div class='alert alert-success'>Account No. $_POST[otherNo] Does not exist</div>";
        }
  } 
      ?>
                          </div>

