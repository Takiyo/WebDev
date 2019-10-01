<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Guitar Wars - High Scores Administration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

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
  <h2>Guitar Wars - High Scores Administration</h2>
  <p>Below is a list of all Guitar Wars high scores. Use this page to remove scores as needed.</p>
  <hr />


  <?php

  $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
  $data = mysqli_query($dbc, $query);

  echo '<table>';
  while ($row = mysqli_fetch_array($data)) {
    // Display the score data
    echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
      '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] .
      '&amp;screenshot=' . $row['screenshot'] . '">Remove</a></td></tr>';
  }
  echo '</table>';

  mysqli_close($dbc);
?>

</div>
<div class="col-sm outercol">
    <div class="sidenav">
    </div>
  </div>
</div>


</body>
</html>
