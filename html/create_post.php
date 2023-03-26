<!DOCTYPE html>
<html>
<head>
  <title>Create new post</title>
  <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/create_post.css">

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
      <li class="nav-item active">
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
    if ($_REQUEST["action"] == "posted") {
      echo '<div id="success_title" class="container">
    <h1><center>New post added success!</center></h1>
  </div>';
    }else{
      echo '<div id="err_title" class="container">
    <p><center>'.$_REQUEST["action"].'</center></p>
  </div>';
    }
    
  }
  else{
    echo '<div id="initial_title" class="container">
    <h1><center>Create a post</center></h1>
  </div>';
  }

   ?>
  
</section>

<section>
  <div class="container">
    <form action="../php/create_new_post.php" method="post">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Item:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="item" placeholder="Ex: calculator, pendrive, etc..." required autofocus>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Details:</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="5" name="details" required></textarea>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Date:</label>
        <div class="col-sm-10">
          <input type="Date" class="form-control" name="date" placeholder="MM-DD-YYYY" required>
        </div>
      </div>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Post type:</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="post_type" id="lost" value="lost" checked>
              <label class="form-check-label" for="lost">
                Lost
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="post_type" id="found" value="found">
              <label class="form-check-label" for="found">
                Found
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <div class="col-sm-10 ml-auto">
          <div >
            <input id="submitBtn" class="btn btn-info" type="submit" name="submit" value="Post">
          </div>
          
        </div>
      </div>
    </form>
  </div>
</section>



</body>
</html>