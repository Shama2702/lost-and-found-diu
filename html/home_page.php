 <!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/home_page.css">

  <!-- <script src="https://kit.fontawesome.com/cd9b5e7c8c.js"></script> -->
</head>
<body>
  <script src="../bootstrap/jquery/jquery.slim.min.js"></script>
  <script src="../bootstrap/bootstrap/js/popper.min.js"></script>
  <script src="../bootstrap/jquery/jquery.min.js"></script>
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
      <li class="nav-item active">
        <a class="nav-link" href="home_page.php">Home <span class="sr-only">(current)</span></a>
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
          <a class="dropdown-item" href="my_posts.php">My posts</a>
          <a class="dropdown-item" href="activity.php">Activity</a>
          <a class="dropdown-item" href="history.php">History</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../php/logout.php">Logout</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="?" method="get">
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


<!-- all posts are in table and that are starting from here -->

<div class="container">
    <table>
      <?php
      if (isset($_REQUEST["search"])) {
         $searchItem = $_REQUEST["search"];

         echo '<p><center>Search results for: '.$searchItem.'</center></p>';

         require "../php/conn.php";
      $postSelect_qry = "SELECT * FROM posts WHERE item LIKE '%$searchItem%' ORDER BY id DESC;";
      $postQuery_result = mysqli_query($conn, $postSelect_qry);

      while($row = mysqli_fetch_array($postQuery_result)){
        $id = $row[0];
        $pp_id = $row[1];
        //$pp_name = $row[2];
        $post_type = $row[2];
        $item = $row[3];
        $details = $row[4];
        $status = $row[5];
        $date = $row[6];

        $userSelect_qry = "SELECT * FROM users WHERE id LIKE '$pp_id';";
        $userQuery_result = mysqli_query($conn, $userSelect_qry);


        if(mysqli_num_rows($userQuery_result) > 0){
            
            $urow = mysqli_fetch_assoc($userQuery_result);
            $uid = $urow["id"];
            $uvid = $urow["varsityId"];
            $uname = $urow["name"];
            $email = $urow["email"];
            $phone = $urow["phone"];
            $address = $urow["address"];
            
            //echo $uid;
        }


        echo '<td>
        <tr>
          <div class="row">
          <div id="postDiv" class="col">
            <h3>'.$uname.'</h3>
            <p><b>Item:</b> '.$item.' ('.$post_type.')'.'    <b>Date:</b> '.$date.'</p>
            <p>'.$details.'</p>

            <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%;">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#msgModal">Message</button>
              
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal'.$id.'">View contact info</button>
            </div>

          </div>
        </tr>
      </td>
      <td>
      <tr>

      </tr>
      </td>

  

  <!-- Modal -->
  <div class="modal fade" id="infoModal'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">'.$uname.'</h4>
        </div>
        <div class="modal-body">
          <p><b>Id: </b>'.$uvid.'</p>
          <p><b>Email: </b>'.$email.'</p>
          <p><b>Phone: </b>'.$phone.'</p>
          <p><b>Address: </b>'.$address.'</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> ';

}
     }else {
      require "../php/conn.php";
      $postSelect_qry = "SELECT * FROM posts WHERE status LIKE 'open' ORDER BY id DESC;";
      $postQuery_result = mysqli_query($conn, $postSelect_qry);

      while($row = mysqli_fetch_array($postQuery_result)){
        $id = $row[0];
        $pp_id = $row[1];
        //$pp_name = $row[2];
        $post_type = $row[2];
        $item = $row[3];
        $details = $row[4];
        $status = $row[5];
        $date = $row[6];

        $userSelect_qry = "SELECT * FROM users WHERE id LIKE '$pp_id';";
        $userQuery_result = mysqli_query($conn, $userSelect_qry);


        if(mysqli_num_rows($userQuery_result) > 0){
            
            $urow = mysqli_fetch_assoc($userQuery_result);
            $uid = $urow["id"];
            $uvid = $urow["varsityId"];
            $uname = $urow["name"];
            $email = $urow["email"];
            $phone = $urow["phone"];
            $address = $urow["address"];
            
            //echo $uid;
        }


        echo '<td>
        <tr>
          <div class="row">
          <div id="postDiv" class="col">
            <h3>'.$uname.'</h3>
            <p><b>Item:</b> '.$item.' ('.$post_type.')'.'    <b>Date:</b> '.$date.'</p>
            <p>'.$details.'</p>

            <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%;">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#msgModal">Message</button>
              
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal'.$id.'">View contact info</button>
            </div>

          </div>
        </tr>
      </td>
      <td>
      <tr>

      </tr>
      </td>

  

  <!-- Modal -->
  <div class="modal fade" id="infoModal'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">'.$uname.'</h4>
        </div>
        <div class="modal-body">
          <p><b>Id: </b>'.$uvid.'</p>
          <p><b>Email: </b>'.$email.'</p>
          <p><b>Phone: </b>'.$phone.'</p>
          <p><b>Address: </b>'.$address.'</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> ';

}
     }

       ?>
      
    </table>
  </div>

<!-- Modal -->
  <div class="modal fade" id="msgModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Sorry!🙁</h4>
        </div>
        <div class="modal-body">
          <p>Currently message service is not available.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</body>
</html>