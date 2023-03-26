<!DOCTYPE html>
<html>
<head>
  <title>My Posts</title>

  <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/activity.css">

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
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create_post.php">Create a post</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="my_posts.php">My posts</a>
          <a class="dropdown-item active" href="activity.php">Activity</a>
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



  <!-- all personal posts are in table and that are starting from here -->

<div id="content" class="container">
    <caption ><h1 id="title"><center><b>Activities</b></center></h1></caption>
    
      
      <?php 

      $id = $_COOKIE["id"];
      $open = 0;
      $close = 0;

      require "../php/conn.php";
      $openPost_qry = "SELECT * FROM posts WHERE pp_id LIKE '$id' and status LIKE 'open';";
      $openPost_result = mysqli_query($conn, $openPost_qry);

      while($row = mysqli_fetch_array($openPost_result)){
        $open++;
        }

        $closePost_qry = "SELECT * FROM posts WHERE pp_id LIKE '$id' and status LIKE 'close';";
        $closePost_result = mysqli_query($conn, $closePost_qry);

        while($row = mysqli_fetch_array($closePost_result)){
          $close++;
          }
          $total = $open+$close;
          echo '<p><b>Total post: </b> '.$total.' </p>
       <p><b>Open: </b> '.$open.' </p>
       <p><b>Close: </b> '.$close.' </p>'
       ?>

       
  </div>

</body>
</html>