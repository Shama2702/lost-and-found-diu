<?php 
$name = $_REQUEST["name"];
$bio = $_REQUEST["bio"];
$uid = $_REQUEST["uid"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$address = $_REQUEST["address"];
$gender = $_REQUEST["gender"];
$password = $_REQUEST["password"];


$id = $_COOKIE["id"];


require "conn.php";

$update_qry = "UPDATE users SET name ='$name', bio = '$bio', varsityId = '$uid', email = '$email', phone = '$phone', address = '$address', gender = '$gender', password = '$password' WHERE id = $id;";
$result = mysqli_query($conn, $update_qry);

if ($result) {
	//echo "Success";
	header("Location: ../html/edit_profile.php?action=edited");
}
else{
	$err = "Error: " .$mysql_qry . "<br>" .$conn->error;
	header("Location: ../html/edit_profile.php?action=$err");
}
$conn->close();

 ?>