<!DOCTYPE html>
<html>
<title>Health Watch</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/displayfunctions.js"></script>
<script type="text/javascript" defer src="js/validation.js"></script>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
<body>
    <style>
    body, html {
        height: 100%;
        font-family: "Inconsolata", sans-serif;
    }
    .bgimg {
        background-position: center;
        background-size: cover;
        background-image: url("images/bg.jpg");
        min-height: 50%;
    }
    </style>

<?php 
require_once('navmenu.php'); 
require_once('pageheader.php'); 
require_once('connectvars.php');
require_once('appvars.php');


  // Make sure the user is logged in before going any further.
  if (!isset($_COOKIE['hwId'])) {
    echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
    exit();
  }
?>
<div class="row">
    <div class="col-sm">     
    </div>



    <div class="col-sm"> <!-- centered content here-->
    <h3 class='w3-tag w3-wide'>User Account</h3>
    <?php

    // set connectvars
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    // Establish connection
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    // query db for user profile
    $stmt = $pdo->prepare("SELECT first_name, last_name, gender, birthdate, weight, username FROM exercise_user WHERE id = '" . $_COOKIE['hwId'] . "'");
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        foreach ($stmt as $row){
        // The user row was found so display the user data
        echo '<table>';
        if (!empty($row['username'])) {
            echo '<tr><td class="label">Username:</td><td>' . $row['username'] . '</td></tr>';
        }
        if (!empty($row['first_name'])) {
            echo '<tr><td class="label">First name:</td><td>' . $row['first_name'] . '</td></tr>';
        }
        if (!empty($row['last_name'])) {
            echo '<tr><td class="label">Last name:</td><td>' . $row['last_name'] . '</td></tr>';
        }
        if (!empty($row['gender'])) {
            echo '<tr><td class="label">Gender:</td><td>' . $row['gender'] . '</td><tr>';
        }
        if (!empty($row['birthdate'])) {
            echo '<tr><td class="label">Birth Date:</td><td>' . $row['birthdate'] . '</td></tr>';
        }
        if (!empty($row['weight'])) {
            echo '<tr><td class="label">Weight:</td><td>' . $row['weight'] . 'lbs</td></tr>';
        }
        echo '</table>';
    }
    ?><p>Would you like to <a href="editaccount.php">edit your profile</a>?</p>
    <br><br><br>
    <h3 class='w3-tag w3-wide'>Logged Exercise Sessions</h3>
    <?php
    // query db for logged exercises
    $qry = $pdo->prepare("SELECT calories, duration, date, heartrate FROM exercise_log WHERE user_id = '" . $_COOKIE['hwId'] . "'");
    $qry->execute();


    if ($qry->rowCount() > 0){
        foreach ($qry as $row){
            echo '<div id="session"><table>';
            echo '<tr><td class="label">Calories:</td><td>' . $row['calories'] . '</td></tr>';
            echo '<tr><td class="label">Duration:</td><td>' . $row['duration'] . '</td></tr>';
            echo '<tr><td class="label">Date:</td><td>' . $row['date'] . '</td></tr>';
            echo '<tr><td class="label">HeartRate:</td><td>' . $row['heartrate'] . '</td></tr>';
            echo '</table></div><br>';
        }
    }
}
?>





</div>


<div class="col-sm">     
</div>
</div> <!-- row-->