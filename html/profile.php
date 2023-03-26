<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/profile.css">

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
      <li class="nav-item active">
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

<!-- about and information starts from here -->
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
      $gender = $row["gender"];
      $dp = $row["dp"];
      $cp = $row["cp"];
      
      //echo $uid;
  }
?>
<section >
  <div class="container">
      <div class="fb-profile">
          <img align="left" class="fb-image-lg" src="http://<?php echo $cp?>" alt="Profile image example"/>
          <img align="left" class="fb-image-profile thumbnail" src="http://<?php echo $dp?>" alt="Profile image example"/>

          <div class="fb-profile-text">
              <h1><?php echo $name?></h1>
              <p><?php echo $bio?></p>
          </div>

      </div>
  </div>
</section>

<section style="margin-top: 100px; margin-bottom: 100px;">
  <div class="container">
    <div class="row">
      <div id="infoDiv" class="col-md">

        <p><b>Name:</b> <?php echo $name ?></p>
        <p><b>University id:</b> <?php echo $uid ?></p>
        <p><b>Phone:</b> <?php echo $phone ?></p>
        <p><b>Email:</b> <?php echo $email ?></p>
        <p><b>Gender:</b> <?php echo $gender ?></p>
        <p><b>Address:</b> <?php echo $address ?></p>
        <div class="row">
          <div class="col-sm"><a class="btn btn-info" href="edit_profile.php" style="width: 100%;">Edit profile</a></div>
          <div class="col-sm"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#unavailableServiceModal" style="width: 100%;">Update profile picture</button></div>

          <div class="col-sm"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#unavailableServiceModal" style="width: 100%;">Update cover photo</button></div>
        </div>
          
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
  <div class="modal fade" id="unavailableServiceModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Sorry!🙁</h4>
        </div>
        <div class="modal-body">
          <p>Currently this service is not available.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>