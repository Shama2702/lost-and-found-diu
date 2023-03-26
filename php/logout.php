<?php 
	unset($_COOKIE['id']);
	setcookie('id', '', time() - 3600, '/');
	header("Location: ../");
 ?>