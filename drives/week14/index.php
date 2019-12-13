<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aliens Abducted Me</title>
    <link rel="stylesheet" type="text/css" href="style.css" />  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color:black;">
  <div class="row">
    <div class="col-sm">   
    </div>
    <div class="col-sm"> 
    <div class="card bg-dark text-white" style="max-width: 35rem; margin-bottom: 3em;">  
        <img class="card-img" src="alien.jpg" alt="Card image" style="height:20%;width:auto;">
        <div class="card-img-overlay">
          <div style="background-color: rgba(0,20,0,.5);">
        <h2 class="card-title">Aliens Abducted Me</h2>
        <p class="card-text">Welcome, have you had an encounter with extraterrestrials? Were you abducted? Have you seen my abducted dog, Fang? 
          <br><a href="report.php" style="color:white;">Report it here!</a></p>
</div>
      </div>
    </div>
        <div class="card text-white bg-success mb-0" style="max-width: 35rem; margin-bottom: 3em;padding:1em;">  

<?php
  require_once('connectvars.php');

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // See if we're viewing a single report or all of the most recent reports
  if (isset($_GET['abduction_id'])) {
    $query = "SELECT * FROM aliens_abduction WHERE abduction_id = '" . $_GET['abduction_id'] . "'";
  }
  else {
    $query = "SELECT * FROM aliens_abduction ORDER BY when_it_happened DESC LIMIT 5";
  }
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
    // Show the details for this single abduction
    $row = mysqli_fetch_array($data);
    echo '<p><strong>Name: </strong>' . $row['first_name'] . ' ' . $row['last_name'] . '<br />';
    echo '<strong>Date:</strong> ' . $row['when_it_happened'] . '<br />';
    echo '<strong>Email:</strong> ' . $row['email'] . '<br />';
    echo '<strong>Abducted for:</strong> ' . $row['how_long'] . '<br />';
    echo '<strong>Number of aliens:</strong> ' . $row['how_many'] . '<br />';
    echo '<strong>Alien description:</strong> ' . $row['alien_description'] . '<br />';
    echo '<strong>What happened:</strong> ' . $row['what_they_did'] . '<br />';
    echo '<strong>Other:</strong> ' . $row['other'] . '<br />';
    echo '<strong>Fang spotted:</strong> ' . $row['fang_spotted'] . '</p>';
    echo '<p><a href="index.php">&lt;&lt; Back to the home page</a></p>';
  }
  else {
    echo '<h4>Most recent reported abductions:</h4>';

    // Loop through the array of alien abductions, formatting them as HTML
    echo '<table width="100%">';
    while ($row = mysqli_fetch_array($data)) { 
      // Display each row as a table row
      echo '<tr class="heading"><td colspan="3"><a href="index.php?abduction_id=' . $row['abduction_id'] . '">' . $row['when_it_happened'] . ' : ' . $row['first_name'] . ' ' . $row['last_name'] . '</a></td></tr>';
      echo '<tr><td><strong>Abducted for:</strong><br /> ' . $row['how_long'];
      echo '<td><strong>Alien description:</strong><br /> ' . $row['alien_description'];
      echo '<td><strong>Fang spotted:</strong><br /> ' . $row['fang_spotted'] . '</td></tr>';
    }
    echo '</table>';

    echo '<h4>Most recent abduction videos:</h4>';
    require_once('youtube.php');
  }

  mysqli_close($dbc);
?>
</div>
<br>
    </div>
    <div class="col-sm">   </div>
  </div>
</body> 
</html>
