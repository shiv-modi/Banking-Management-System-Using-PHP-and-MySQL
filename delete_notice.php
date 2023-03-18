<?php
include 'notice.php';

  ?>
  <?php 
$host = 'localhost';
$dbName = 'charusat_bank'; 
$dbUsername = 'root'; 
$dbPassword = '';  
$mysqli = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
$id = $_GET['id'];
if($con->query("delete  from notice where userid = '$_SESSION[userid]'order by id desc ")){

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Data Successfully Deleted');
    window.location.href='notice.php';
    </script>");
}
?>