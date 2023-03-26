<!DOCTYPE html>
<html>
<head>
	<title>Lost and Found Accessories in DIU</title>

	<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/indexStyle.css">

	<script src="https://kit.fontawesome.com/cd9b5e7c8c.js"></script>
	
</head>
<body>

	<script src="bootstrap/jquery/jquery.slim.min.js"></script>
	<script src="bootstrap/bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>

	<?php 
	if(isset($_COOKIE["id"])){
		header("Location: html/home_page.php");
	}

	 ?>

	 <div id="content_wrapper" class="container">
	  <div class="row">
	    <div class="col-md-6" >
	    	<div id="leftContent">
			<p><i class="fas fa-caret-down"></i></p>
			<h1>Join Us</h1>
			<p>It's only for Daffodil Students</p>
			<button id="aboutUsBtn">About Us</button>
		</div>
	    </div>
	    <div class="col-md-6" >
	    	<div id="rightContent">
	    		
			<form id="loginForm" class="loginFormVisibility" action="php/login.php" method="post">
				<h2>Login here</h2>
				<input type="email" name="email" placeholder="Email address" required autofocus><br>
				<input type="password" name="password" placeholder="Password" required><br>
				<input type="submit" name="" value="Login"><br>
				<p><span id="createAccount">Create a new account</span></p>

			</form>

			<form id="regForm" class="regFormVisibility" action="php/add_new_user.php" method="get">
				<h2>Create your account</h2>
				<input type="text" name="name" placeholder="Full name" tabindex="1" required autofocus ><br>
				<input type="email" name="email" placeholder="Email address" tabindex="2" required><br>
				<input type="text" name="phone" placeholder="Phone number" tabindex="3" maxlength="11"><br>
				<input type="password" name="password" placeholder="Password" tabindex="4" required><br>
				<input type="submit" name="" value="Create account"><br>
				<p><span id="alreadyHaveAccount">Already have an account</span></p>

			</form>
			<?php 
			if (isset($_REQUEST["err"])) {
				$err = $_REQUEST["err"];
				if ($err == "invalidEmail") {
					echo '<p><center style="color: red;font-size: 15px;">You must register through university email.</center></p>';
				}
				elseif ($err == "loginFail") {
					echo '<p><center style="color: red;font-size: 15px;">Wrong email or password.</center></p>';
				}
				elseif ($err == "regSuccess") {
					echo '<script>alert("Registration Success!\nNow login please")</script>';
				}
			}
			 ?>
		</div>
	    </div>
	  </div>
	</div>


	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>