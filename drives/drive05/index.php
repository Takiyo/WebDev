<!doctype html>
<html lang="en">
  <head>
    <title>Guitar Wars - High Scores</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<?php 
    require_once('appvars.php');
    require_once('connectvars.php');
  
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $adminLoggedIn = false;
    
    
    // checks if admin is logged in for various purposes
    if (isset($_COOKIE['gwAdminLoggedIn'])){
      if ($_COOKIE['gwAdminLoggedIn'] == 'true')
      {
        $adminLoggedIn = true;
      }
    }

?>

<!-- Navbar. 
  If admin logged in, enable admin.php link.
  If admin logged in, change login to logout. -->
<nav class="nav navbar-dark bg-dark justify-content-center">
  <a class="nav-link active" href="index.php">Top Scores</a>
  <a class="nav-link active" href="addscore.php">Submit Score</a>
  <a class="nav-link active" <?php echo ($adminLoggedIn ? 
    'href="logout.php">Logout' : 'href="login.php">Admin Login')?></a>
  <a class="nav-link <?php echo ($adminLoggedIn ? 
    'active' : 'disabled')?>" href="admin.php">Review Scores</a>
</nav>

<div class="row">

  <div class="col-sm outercol">
    <div class="sidenav">
    </div>
  </div>

  <div class="col-sm innercol">
    <h2 class="indexheader">Guitar Wars - High Scores</h2>
    <p>Welcome, Guitar Warrior, do you have what it takes to crack the high score list? If so, just <a href="addscore.php">add your own score</a>.</p>
    <hr />

  <div class="imagecontainer">
  <?php

    // query db for top scores output
    $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
    $data = mysqli_query($dbc, $query);

    // format data as sql
    echo '<table class="topscoretable">';
    $i = 0;
    while ($row = mysqli_fetch_array($data)) {
      if ($i == 0) {
        echo '<tr><td colspan="2" class="topscoreheader">
        <div class="imagecontainer">
          <img id="fireheader" src="fireheader.gif"/><div id="textoverimage">
  Top Score: ' . $row['score'] . '<br>' . $row['name'] . '</div></div></td></tr>';;
      }
      echo '<tr><td class="scoreinfo">';
      echo '<span class="score">' . $row['score'] . '</span><br />';
      echo '<strong>Name:</strong> ' . $row['name'] . '<br />';
      echo '<strong>Date:</strong> ' . $row['date'] . '</td>';
      if (is_file(GW_UPLOADPATH . $row['screenshot']) && filesize(GW_UPLOADPATH . $row['screenshot']) > 0) {
        echo '<td><img src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="Score image" /></td></tr>';
      }
      else {
        echo '<td id="unverified"><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td></tr>';
      }
      $i++;
    }
    echo '</table>';

    mysqli_close($dbc);
  ?>

  </div>
  </div>
  <div class="col-sm outercol">
    <div class="sidenav">
    </div>
  </div>
</div>
</body>
</html>
