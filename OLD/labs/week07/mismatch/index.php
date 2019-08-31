<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Mismatch - Where opposites attract!</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css"/>
</head>
<body >
  <div class="container-fluid mainbody">
    <div class="row mainrow">

    <div class="col-sm-6 offset-sm-3 rounded bg-danger">
  <h1 class="text-center pageheader">Mismatch - Where opposites attract!</h1>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  // Generate the navigation menu

  if (isset($_SESSION['username'])) {
    echo '&#10084; <a href="viewprofile.php">View Profile</a><br />';
    echo '&#10084; <a href="editprofile.php">Edit Profile</a><br />';
    echo '&#10084; <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
  }
  else {
    echo '<div class="text-center topnav">&#10084;<a href="login.php">Log In</a>';
    echo '&#10084;<a href="signup.php">Sign Up</a>&#10084;</div>';
  }
?>
        <hr class="headerseparator">
        <?php



  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name, picture FROM mismatch_user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of user data, formatting it as HTML
  echo '<div class="col-sm-6 offset-sm-3 center">';
  echo '<h3 class="col-sm-12 text-center">Latest members:</h3>';
  while ($row = mysqli_fetch_array($data)) {
    if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0) {
      echo '<div class="imagecontainer"><img class="image" src="' . MM_UPLOADPATH . $row['picture'] . '" alt="' . $row['first_name'] . '" />';
    }
    else {
      echo '<img src="' . MM_UPLOADPATH . 'nopic.jpg' . '" alt="' . $row['first_name'] . '" />';
    }
    if (isset($_SESSION['user_id'])) {
      echo '<div class="text-center caption"><a href="viewprofile.php?user_id=' . $row['user_id'] . '">' . $row['first_name'] . '</a></div>';
    }
    else {
      echo '<div class="text-center caption">' . $row['first_name'] . '</div></div>';
    }
  }

  mysqli_close($dbc);
?>
</div>
</div>
    </div>
    </div>
  </div>
</body>
</html>
