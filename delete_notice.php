<?php
include 'notice.php';

  ?>
  <?php 
$host = 'localhost';
$dbName = 'charusat_bank'; 
$dbUsername = 'root'; 
$dbPassword = '';  
$mysqli = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
$stmt = $con->prepare("delete from notice where userid = ?");
$stmt->bind_param("i", $_SESSION['userid']);
if($stmt->execute()){

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Data Successfully Deleted');
    window.location.href='notice.php';
    </script>");
}
?>