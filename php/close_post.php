<?php 
$post_id = $_REQUEST["post_id"];

require "conn.php";

$update_qry = "UPDATE posts SET status ='close' WHERE id = $post_id;";
$result = mysqli_query($conn, $update_qry);

if ($result) {
	echo "Success";
	header("Location: ../html/my_posts.php");
}
else{
	echo "Error: " .$mysql_qry . "<br>" .$conn->error;
}

 ?>