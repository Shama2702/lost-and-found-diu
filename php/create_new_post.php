<?php 
	$item = $_REQUEST["item"];
	$details = $_REQUEST["details"];
	$date = $_REQUEST["date"];
	$post_type = $_REQUEST["post_type"];

	

	if (isset($_COOKIE["id"])) {
		$id = $_COOKIE["id"];
		
		include 'conn.php';

		$insertQuery = "INSERT INTO posts (pp_id, post_type, item, details, date)
		VALUES ('$id', '$post_type', '$item', '$details', '$date')";

		$runQuery = $conn->query($insertQuery);

		if ($runQuery === true) {
			echo "Insert Success";
			$conn->close();
			header("Location: ../html/create_post.php?action=posted");
		}else{
			$err = "Error: " .$mysql_qry . "<br>" .$conn->error;
			header("Location: ../html/create_post.php?action=$err");
		}

		$conn->close();

	}else{
		echo "<script>alert('Login fisrt')</script>";
		header("Location: ../");
	}
 ?>