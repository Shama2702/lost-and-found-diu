    <?php

$userName = $_REQUEST["name"];
$userEmail = $_REQUEST["email"];
$userPhone = $_REQUEST["phone"];
$userPass = $_REQUEST["password"];


$emailCheck = substr($userEmail, -11);

if ($emailCheck == "@diu.edu.bd") {
	include 'conn.php';

	$insertQuery = "INSERT INTO users (name, email, phone, password)
	VALUES ('$userName', '$userEmail', '$userPhone', '$userPass')";

	$runQuery = $conn->query($insertQuery);

	if ($runQuery === true) {
		header("Location: ../?err=regSuccess");
	}else{
		echo "Error: " .$mysql_qry . "<br>" .$conn->error;
	}

	$conn->close();
}
else{
	header("Location: ../?err=invalidEmail");
}





?>