<?php

$userEmail = $_REQUEST["email"];
$userPass = $_REQUEST["password"];



include 'conn.php';

$selectQuery = "select * from users where email like '$userEmail' and password like '$userPass';";

$result = mysqli_query($conn, $selectQuery);

if(mysqli_num_rows($result) > 0){
    
    $row = mysqli_fetch_assoc($result);
    $id = $row["id"];
    /*$varsityId = $row["varsityId"];
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $gender = $row["gender"];
    $address = $row["address"];
    $dp = $row["dp"];*/
    
    //echo $id. " ".$name." ". $email." ". $phone;
    $cookie_name = "id";
    $cookie_value = $id;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/");// 86400 = 1 day

    header("Location: ../html/home_page.php");
}
else{
    header("Location: ../?err=loginFail");
}

$conn->close();

?>