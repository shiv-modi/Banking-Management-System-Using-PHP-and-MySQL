<?php
include 'profile.php';


$dob = $_POST["dob"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$occupation =  $_POST["occupation"];
$city =  $_POST["city"];


$servername = "localhost";
$username = "root";
$password = "";
$db = "charusat_bank";

$conn = new mysqli($servername, $username, $password, $db);

$sql = "update useraccounts set dob='$dob',email='$email',phonenumber='$phonenumber',occupation = '$occupation', city = '$city' where id='$_SESSION[userid]'";

if ($conn->query($sql) === TRUE) {
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Data Successfully Updated');
    window.location.href='profile.php';
    </script>");

} else {
	   
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Data not  Updated');
    window.location.href='home.php';
    </script>");
}

$conn->close();

?>