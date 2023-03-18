<?php
session_start();
if(!isset($_SESSION['userid'])){ header('location:login.php');}
?>
<!DOCTYPE html>
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
   <?php 
 $con = new mysqli('localhost','root','','charusat_bank');

 $ar = $con->query("select * from useraccounts where id = '$_SESSION[userid]'");
 $userData = $ar->fetch_assoc();

 ?>
   <?php require 'includes/function.php'; ?>
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
			<a href="account.php" class="nav-item nav-link">Accounts</a>
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
			<a href="funds_transfer.php" class="nav-item nav-link active">Funds Transfer</a>
     
		</div>

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
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"> <img src="<?php echo "images/".$userData['profile'];?>"width="100px" alt="image";>
    
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
   </body>



   <!-- css-->

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



<!-- form -->

<div className="maincontainer">
            <div class="container py-5">
              <div class="row">
                <div class=" mx-auto">
                  <div class="bg-white rounded-lg shadow-sm p-5">
                   
                    <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
            
                      <li class="nav-item">
                       
                      <h5> <i class="fa fa-university fa-lg" >&nbsp;Bank Transfer</i> </h5>
                                        
                      </li>
                    </ul>
                    
                    <div class="tab-content">
  
                      
                      <div id="nav-tab-card" class="tab-pane fade show active">
                            <!-- php  -->

                        <form role="form" method="POST" >
                      
                          <div class="form-group">
                            <label >Receiver Account number</label>
                            <div class="input-group">
                              <input type="text"  name="otherNo"  placeholder="Enter Receiver Account number" class="form-control"  />
                              <div class="input-group-append">
                              <button class="btn btn-secondary" type="submit" name="get">Get Account Info</button>
                             </div>
                            </div>
                          </div>
                     
                           



                          </div>
                          <?php if (isset($_POST['get'])) 
      {
        $array2 = $con->query("select * from otheraccounts where accountno = '$_POST[otherNo]'");
        $array3 = $con->query("select * from useraccounts where accountno = '$_POST[otherNo]'");
        {
          if ($array2->num_rows > 0) 
          { $row2 = $array2->fetch_assoc();
            echo "
                  <form method='POST'>
                  <div class='form-group'>
                  <label > Account No.  <label > 
                    <input type='text' value='$row2[accountno]' name='otherNo' class='form-control ' readonly required>
                    </div>
                    <div class='form-group'>
                    <label >  Account Holder Name.  <label > 
                    <input type='text' class='form-control' value='$row2[holdername]' readonly required>
                    </div>
                    <div class='form-group'>
                    <label>
                    Account Holder Bank Name.</label>
                    <input type='text' class='form-control' value='$row2[bankname]' readonly required>
                    </div>
                    <div class='form-group'>
                    <label>
                    Enter Amount for tranfer.</label>
                    <input type='number' name='amount' class='form-control' min='3000' max='$userData[deposit]' required>
                    </div>
                     <button type='submit'  name='transfer'class='subscribe btn btn-primary btn-block rounded-pill shadow-sm'> Transfer  </button>
                  </form>
          ";
          }elseif ($array3->num_rows > 0) {
           $row2 = $array3->fetch_assoc();
            echo "
                  <form method='POST'>
                  <div class='form-group'>
                  <label >Account No.</label> 
                    <input type='text' value='$row2[accountno]' name='otherNo' class='form-control ' readonly required>
                    </div>
                    <div class='form-group'>
                 <label >Account Holder Name.</label> 
                    <input type='text' class='form-control' value='$row2[name]' readonly required>
                    </div>
                    <div class='form-group'>
                    <label > Enter Amount for tranfer.</label> 
                    <input type='number' name='amount' class='form-control' min='3000' max='$userData[deposit]' required>
                    </div>
                    <button type='submit'  name='transferSelf'class='subscribe btn btn-primary btn-block rounded-pill shadow-sm'> Transfer  </button>
                    
                  </form>
                ";
          }
          else
            echo "<div class='alert alert-danger'>Account No. $_POST[otherNo] Does not exist</div>";
        }
      } 
      ?>
     
          <br>
    <h5>Transfer History</h5>
    <?php
    if (isset($_POST['transferSelf']))
    {
      $amount = $_POST['amount'];
      setBalance($amount,'debit',$userData['accountno']);
      setBalance($amount,'credit',$_POST['otherNo']);
      makeTransaction('transfer',$amount,$_POST['otherNo']);
      echo "<script>alert('Transfer Successfull');window.location.href='funds_transfer.php'</script>";
    }
    if (isset($_POST['transfer']))
    {
      $amount = $_POST['amount'];
      setBalance($amount,'debit',$userData['accountno']);
      makeTransaction('transfer',$amount,$_POST['otherNo']);
      echo "<script>alert('Transfer Successfull');window.location.href='funds_transfer.php'</script>";
    }
      $array = $con->query("select * from transaction where userid = '$userData[id]' AND action = 'transfer' order by date desc");
      if ($array ->num_rows > 0) 
      {
         while ($row = $array->fetch_assoc()) 
         {
            if ($row['action'] == 'transfer') 
            {
              echo "<div class='alert alert-warning'>Transfer have been made for  Rs.$row[debit] from your account at $row[date] in  account no.$row[other]</div>";
            }

         }
      }
      else
        echo "<div class='alert alert-info'>You have made no transfer yet.</div>";
    ?>  
                          
                        </form>
                      </div>
                    
       
       
                     
                
                     
                    </div>
                   

                  </div>
                </div>
              </div>
          </div>
        </div>
     
   