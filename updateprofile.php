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

$stmt = $conn->prepare("update useraccounts set dob = ?, email = ?, phonenumber = ?, occupation = ?, city = ? where id = ?");
$stmt->bind_param("sssssi", $dob, $email, $phonenumber, $occupation, $city, $_SESSION['userid']);

if ($stmt->execute()) {
    
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