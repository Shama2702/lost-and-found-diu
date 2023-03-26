<!DOCTYPE html>
<html>
<head>
  <title>Edit profile</title>
  <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/edit_profile.css">

<!-- fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <!-- <script src="https://kit.fontawesome.com/cd9b5e7c8c.js"></script> -->
</head>
<body>
  <script src="../bootstrap/jquery/jquery.slim.min.js"></script>
  <script src="../bootstrap/bootstrap/js/popper.min.js"></script>
  <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>

<!-- Navigation bar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="../">
      <img src="../images/logo.png" width="130" height="50" alt="logo">
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="home_page.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create_post.php">Create a post</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="my_posts.php">My posts</a>
          <a class="dropdown-item" href="activity.php">Activity</a>
          <a class="dropdown-item" href="history.php">History</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../php/logout.php">Logout</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="home_page.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder=" <?php if(isset($_REQUEST["search"])){
        echo $_REQUEST["search"];
      }else{
        echo 'Search your lost item';
      } ?>" aria-label="Search" name="search" required>
      <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Search">
    </form>
  </div>
  </div>
</nav>
<!-- Navigation bar end-->

<section>

  <?php 
  if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "edited") {
      echo '<div id="success_title" class="container"">
    <h1><center>Profile Updated!</center></h1>
  </div>';
    }else{
      echo '<div id="err_title" class="container">
    <p><center>'.$_REQUEST["action"].'</center></p>
  </div>';
    }
    
  }
  else{
    echo '<div id="initial_title" class="container">
    <h1><center>Edit Profile</center></h1>
  </div>';
  }

   ?>
  
</section>

<!-- getting all info from database -->
<?php

  $id = $_COOKIE["id"];

  require "../php/conn.php";
  $userSelect_qry = "SELECT * FROM users WHERE id LIKE '$id';";
  $userQuery_result = mysqli_query($conn, $userSelect_qry);


  if(mysqli_num_rows($userQuery_result) > 0){
      
      $row = mysqli_fetch_assoc($userQuery_result);
      
      $uid = $row["varsityId"];
      $name = $row["name"];
      $bio = $row["bio"];
      $email = $row["email"];
      $phone = $row["phone"];
      $address = $row["address"];
      $password = $row["password"];
      $gender = $row["gender"];
      $dp = $row["dp"];
      $cp = $row["cp"];
      
      //echo $uid;
  }
?>

<section>
  <div class="container">
    <form action="../php/edit_profile.php" method="post">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" value="<?php echo  $name?>" required autofocus>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bio:</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="bio"><?php echo  $bio?></textarea>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">University id:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="uid" value="<?php echo  $uid ?>" >
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" value="<?php echo  $email ?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phone" value="<?php echo  $phone ?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="address" value="<?php echo  $address ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" value="<?php echo  $password ?>" required>
        </div>
      </div>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Gender:</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($gender == "male") {
                echo "checked";
              } ?>>
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if ($gender == "female") {
                echo "checked";
              } ?>>
              <label class="form-check-label" for="female">
                Female
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <div class="col-sm-10 ml-auto">
          <div >
            <input id="submitBtn" class="btn btn-info" type="submit" name="submit" value="Save">
          </div>
          
        </div>
      </div>
    </form>
  </div>
</section>



</body>
</html>