<?php
session_start();
if(!isset($_SESSION['userid'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Charusat Bank</title>
    <link href="images/charusat_symbol.jpg" rel="icon">
   <link href="images/charusat_symbol.jpg" rel="apple-touch-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="assets/css/home.css">
      <link rel="stylesheet" href="assets/css/home.scss">
      
     
      
   </head>

   <?php require 'includes/db_conn.php'; ?>
  <?php require 'includes/function.php'; ?>
  <?php 
 $con = new mysqli('localhost','root','','charusat_bank');

 $ar = $con->query("select * from useraccounts where id = '$_SESSION[userid]'");
 $userData = $ar->fetch_assoc();

 ?>
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
</head> 
<body>
<nav class="navbar navbar-expand-xl navbar-light bg-light">
	<a href="home.php" class="navbar-brand"><img src="images/charusat_symbol.jpg" width="45" alt="" class="logo-img"><b>Charusat Bank</b></a>
  
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav ">
			<a href="home.php" class="nav-item nav-link active">Home</a>
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
			<a href="funds_transfer.php" class="nav-item nav-link">Funds Transfer</a>
   
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
        <?php 
 $con = new mysqli('localhost','root','','charusat_bank');

 $ar = $con->query("select * from useraccounts where id = '$_SESSION[userid]'");
 $userData = $ar->fetch_assoc();

 ?>
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
      <section class="light">
	
   

		<article class="postcard light blue">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="images/charusat_symbol.jpg" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="#">Welcome to Charusat Bank</a></h1>
				
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt"><b>Charusat Bank</b> is the biggest commercial bank in India. It is a Private sector bank and has its headquarters in Changa, Gujarat. It has a total of 16 regional hubs and 57 zonal offices located at almost every city throughout India.</div>
        <p  ><span class="lv">Latest Notification :</span>
<style> 
.lv{
  font-weight: 600;
  color: #eb0202;
}
</style>
        <?php 
        $con = new mysqli('localhost','root','','charusat_bank');
      
    $array = $con->query("select * from notice where userid = '$_SESSION[userid]'order by time desc ");
   
    if ($array->num_rows > 0)
    {
      $row = $array->fetch_assoc();
      // {
       
        
        echo $row['notice'];
      
        }
      // }
      
    
      
    else
      echo "<div>Notice box empty</div>";
      

   ?>
   </p>
    
            </div>
		</article>

    </div>
</section>


    <!-- card ................................................................................... -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<a href="account.php" class="card education">
     <div class="overlay"></div>
  <div class="circle">

<svg width="71px" height="76px" viewBox="29 14 71 76" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 42 (36781) - http://www.bohemiancoding.com/sketch -->

    <g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(30.000000, 14.000000)">
        <g id="Group-8" fill="#D98A19">
            <g id="Group-7">
                <g id="Group-6">
                    <path d="M0,0 L0,75.9204805 L69.1511499,75.9204805 L0,0 Z M14.0563973,32.2825679 L42.9457663,63.9991501 L14.2315268,63.9991501 L14.0563973,32.2825679 Z" id="Fill-1"></path>
                </g>
            </g>
        </g>
        <g id="Group-20" transform="translate(0.000000, 14.114286)" stroke="#FFFFFF" stroke-linecap="square">
            <path d="M0.419998734,54.9642857 L4.70316223,54.9642857" id="Line"></path>
            <path d="M0.419998734,50.4404762 L4.70316223,50.4404762" id="Line"></path>
            <path d="M0.419998734,45.9166667 L4.70316223,45.9166667" id="Line"></path>
            <path d="M0.419998734,41.3928571 L2.93999114,41.3928571" id="Line"></path>
            <path d="M0.419998734,36.8690476 L4.70316223,36.8690476" id="Line"></path>
            <path d="M0.419998734,32.3452381 L4.70316223,32.3452381" id="Line"></path>
            <path d="M0.419998734,27.8214286 L4.70316223,27.8214286" id="Line"></path>
            <path d="M0.419998734,23.297619 L2.93999114,23.297619" id="Line"></path>
            <path d="M0.419998734,18.7738095 L4.70316223,18.7738095" id="Line"></path>
            <path d="M0.419998734,14.25 L4.70316223,14.25" id="Line"></path>
            <path d="M0.419998734,9.72619048 L4.70316223,9.72619048" id="Line"></path>
            <path d="M0.419998734,5.20238095 L2.93999114,5.20238095" id="Line"></path>
            <path d="M0.419998734,0.678571429 L4.70316223,0.678571429" id="Line"></path>
        </g>
    </g>
</svg>
  </div>
  <p>Account Summary</p>
</a>






<a href="statement.php" class="card credentialing">
     <div class="overlay"></div>
  <div class="circle">
    
<svg width="64px" height="72px" viewBox="27 21 64 72" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 42 (36781) - http://www.bohemiancoding.com/sketch -->
    <desc>Created with Sketch.</desc>
    <defs>
        <polygon id="path-1" points="60.9784821 18.4748913 60.9784821 0.0299638385 0.538377293 0.0299638385 0.538377293 18.4748913"></polygon>
    </defs>
    <g id="Group-12" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(27.000000, 21.000000)">
        <g id="Group-5">
            <g id="Group-3" transform="translate(2.262327, 21.615176)">
                <mask id="mask-2" fill="white">
                    <use xlink:href="#path-1"></use>
                </mask>
                <g id="Clip-2"></g>
                <path d="M7.17774177,18.4748913 L54.3387782,18.4748913 C57.9910226,18.4748913 60.9789911,15.7266455 60.9789911,12.3681986 L60.9789911,6.13665655 C60.9789911,2.77820965 57.9910226,0.0299638385 54.3387782,0.0299638385 L7.17774177,0.0299638385 C3.52634582,0.0299638385 0.538377293,2.77820965 0.538377293,6.13665655 L0.538377293,12.3681986 C0.538377293,15.7266455 3.52634582,18.4748913 7.17774177,18.4748913" id="Fill-1" fill="#59A785" mask="url(#mask-2)"></path>
            </g>
            <polygon id="Fill-4" fill="#FFFFFF" transform="translate(31.785111, 30.877531) rotate(-2.000000) translate(-31.785111, -30.877531) " points="62.0618351 55.9613216 7.2111488 60.3692832 1.50838775 5.79374073 56.3582257 1.38577917"></polygon>
            <ellipse id="Oval-3" fill="#25D48A" opacity="0.216243004" cx="30.0584472" cy="21.7657707" rx="9.95169733" ry="9.17325562"></ellipse>
            <g id="Group-4" transform="translate(16.959615, 6.479082)" fill="#54C796">
                <polygon id="Fill-6" points="10.7955395 21.7823628 0.11873799 11.3001058 4.25482787 7.73131106 11.0226557 14.3753897 27.414824 1.77635684e-15 31.3261391 3.77891399"></polygon>
            </g>
            <path d="M4.82347935,67.4368303 L61.2182039,67.4368303 C62.3304205,67.4368303 63.2407243,66.5995595 63.2407243,65.5765753 L63.2407243,31.3865871 C63.2407243,30.3636029 62.3304205,29.5263321 61.2182039,29.5263321 L4.82347935,29.5263321 C3.71126278,29.5263321 2.80095891,30.3636029 2.80095891,31.3865871 L2.80095891,65.5765753 C2.80095891,66.5995595 3.71126278,67.4368303 4.82347935,67.4368303" id="Fill-8" fill="#59B08B"></path>
            <path d="M33.3338063,67.4368303 L61.2181191,67.4368303 C62.3303356,67.4368303 63.2406395,66.5995595 63.2406395,65.5765753 L63.2406395,31.3865871 C63.2406395,30.3636029 62.3303356,29.5263321 61.2181191,29.5263321 L33.3338063,29.5263321 C32.2215897,29.5263321 31.3112859,30.3636029 31.3112859,31.3865871 L31.3112859,65.5765753 C31.3112859,66.5995595 32.2215897,67.4368303 33.3338063,67.4368303" id="Fill-10" fill="#4FC391"></path>
            <path d="M29.4284029,33.2640869 C29.4284029,34.2202068 30.2712569,34.9954393 31.3107768,34.9954393 C32.3502968,34.9954393 33.1931508,34.2202068 33.1931508,33.2640869 C33.1931508,32.3079669 32.3502968,31.5327345 31.3107768,31.5327345 C30.2712569,31.5327345 29.4284029,32.3079669 29.4284029,33.2640869" id="Fill-15" fill="#FEFEFE"></path>
            <path d="M8.45417501,71.5549073 L57.5876779,71.5549073 C60.6969637,71.5549073 63.2412334,69.2147627 63.2412334,66.3549328 L63.2412334,66.3549328 C63.2412334,63.4951029 60.6969637,61.1549584 57.5876779,61.1549584 L8.45417501,61.1549584 C5.34488919,61.1549584 2.80061956,63.4951029 2.80061956,66.3549328 L2.80061956,66.3549328 C2.80061956,69.2147627 5.34488919,71.5549073 8.45417501,71.5549073" id="Fill-12" fill="#5BD6A2"></path>
        </g>
    </g>
</svg>

  </div>
  <p>Account Statement</p>
</a>









<a href="funds_transfer.php" class="card wallet">
     <div class="overlay"></div>
  <div class="circle">
    
    
<svg width="78px" height="60px" viewBox="23 29 78 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 42 (36781) - http://www.bohemiancoding.com/sketch -->
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(23.000000, 29.500000)">
        <rect id="Rectangle-3" fill="#AC8BE9" x="67.8357511" y="26.0333433" width="9.40495664" height="21.8788565" rx="4.70247832"></rect>
        <rect id="Rectangle-3" fill="#6A5297" x="67.8357511" y="38.776399" width="9.40495664" height="10.962961" rx="4.70247832"></rect>
        <polygon id="Rectangle-2" fill="#6A5297" points="57.3086772 0 67.1649301 26.3776902 14.4413177 45.0699507 4.58506484 18.6922605"></polygon>
        <path d="M0,19.6104296 C0,16.2921718 2.68622235,13.6021923 5.99495032,13.6021923 L67.6438591,13.6021923 C70.9547788,13.6021923 73.6388095,16.2865506 73.6388095,19.6104296 L73.6388095,52.6639057 C73.6388095,55.9821635 70.9525871,58.672143 67.6438591,58.672143 L5.99495032,58.672143 C2.68403068,58.672143 0,55.9877847 0,52.6639057 L0,19.6104296 Z" id="Rectangle" fill="#8B6FC0"></path>
        <path d="M47.5173769,27.0835169 C45.0052827,24.5377699 40.9347162,24.5377699 38.422622,27.0835169 L36.9065677,28.6198808 L35.3905134,27.0835169 C32.8799903,24.5377699 28.8078527,24.5377699 26.2957585,27.0835169 C23.7852354,29.6292639 23.7852354,33.7559532 26.2957585,36.3001081 L36.9065677,47.0530632 L47.5173769,36.3001081 C50.029471,33.7559532 50.029471,29.6292639 47.5173769,27.0835169" id="Fill-12" fill="#F6F1FF"></path>
        <rect id="Rectangle-4" fill="#AC8BE9" x="58.0305835" y="26.1162588" width="15.6082259" height="12.863158"></rect>
        <ellipse id="Oval" fill="#FFFFFF" cx="65.8346965" cy="33.0919007" rx="2.20116007" ry="2.23319575"></ellipse>
    </g>
</svg>

  </div>
  <p>Transfer Money</p>
</a>





<style>
  
   .education {
  --bg-color: #ffd861;
  --bg-color-light: #ffeeba;
  --text-color-hover: #4C5656;
  --box-shadow-color: rgba(255, 215, 97, 0.48);
}

.credentialing {
  --bg-color: #B8F9D3;
  --bg-color-light: #e2fced;
  --text-color-hover: #4C5656;
  --box-shadow-color: rgba(184, 249, 211, 0.48);
}

.wallet {
  --bg-color: #CEB2FC;
  --bg-color-light: #F0E7FF;
  --text-color-hover: #fff;
  --box-shadow-color: rgba(206, 178, 252, 0.48);
}
.wall {
   --bg-color: #DCE9FF;
  --bg-color-light: #f1f7ff;
  --text-color-hover: #4C5656;
  --box-shadow-color: rgba(220, 233, 255, 0.48);
}
.card {
    width: 430px;
    height: 321px;
    background: #fff;
    /* border-top-right-radius: 10px; */
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    box-shadow: 0 14px 26px rgb(0 0 0 / 4%);
    transition: all 0.3s ease-out;
    text-decoration: none;
    border-radius: 15px;
    margin: 37px;
}

.card:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 0 24px 36px rgba(0,0,0,0.11),
    0 24px 46px var(--box-shadow-color);
}

.card:hover .overlay {
  transform: scale(4) translateZ(0);
}

.card:hover .circle {
  border-color: var(--bg-color-light);
  background: var(--bg-color);
}

.card:hover .circle:after {
  background: var(--bg-color-light);
}

.card:hover p {
  color: var(--text-color-hover);
}

.card:active {
  transform: scale(1) translateZ(0);
  box-shadow: 0 15px 24px rgba(0,0,0,0.11),
    0 15px 24px var(--box-shadow-color);
}

.card p {
  font-size: 17px;
  color: #4C5656;
  margin-top: 30px;
  z-index: 1000;
  transition: color 0.3s ease-out;
}

.circle {
  width: 131px;
  height: 131px;
  border-radius: 50%;
  background: #fff;
  border: 2px solid var(--bg-color);
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 1;
  transition: all 0.3s ease-out;
}

.circle:after {
   content: "";
    width: 118px;
    height: 118px;
    display: block;
    position: absolute;
    background: var(--bg-color);
    border-radius: 50%;
    top: 5px;
    left: 5px;
    transition: opacity 0.3s ease-out;
}

.circle svg {
  z-index: 10000;
  transform: translateZ(0);
}

.overlay {
   width: 150px;
    position: absolute;
    height: 150px;
    border-radius: 50%;
    background: var(--bg-color);
    top: 49px;
    left: 139px;
    z-index: 0;
    transition: transform 0.3s ease-out;
}
body {
  background: #f2f4f8;
  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
  height: 100vh;
  font-family: "Open Sans";
}

   </style> 


  <section>

........................
</section>

   </body>
</html>
