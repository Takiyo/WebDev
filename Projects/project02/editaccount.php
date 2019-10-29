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
        min-height: 75%;
    }
    </style>

<?php 
require_once('navmenu.php'); 
require_once('pageheader.php'); 
require_once('connectvars.php');
require_once('appvars.php');

  // Connect to the database
  $host = DB_HOST;
  $db   = DB_NAME;
  $user = DB_USER;
  $pass = DB_PASSWORD;
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  // Establish connection
  try {
      $pdo = new PDO($dsn, $user, $pass, $options);
  } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
      $first_name = trim($_POST['firstname']);
      $last_name = trim($_POST['lastname']);
      $gender = trim($_POST['gender']);
      $birthday = trim($_POST['birthday']);
      $weight = trim($_POST['weight']);

      $stmt = $pdo->prepare("UPDATE exercise_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', birthdate = '$birthday', weight = '$weight'");
      $stmt->execute();
      header('Location: viewaccount.php');

  }

?>
<div class="row">
    <div class="col-sm">     
    </div>






    <div class="col-sm">     
    <h3 class='w3-tag w3-wide'>Edit Account</h3>

    
<?php

// select statement for sticky data
$id = $_COOKIE['hwId'];
$qry = $pdo->prepare("SELECT first_name, last_name, gender, birthdate, weight FROM exercise_user WHERE id = '$id'");
$qry->execute();

foreach ($qry as $row){
    $ffirst_name = $row['first_name'];
    $flast_name = $row['last_name'];
    $fgender = $row['gender'];
    $fbirthday = $row['birthdate'];
    $fweight = $row['weight'];
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <fieldset>
      <label for="firstnameInput">First Name:</label>
      <input type="text" id="firstnameInput" class="w3-input w3-padding-8 w3-border" name="firstname" value="<?php if (!empty($ffirst_name)) echo $ffirst_name; ?>" onblur="requiredField(this)" required/><br>

      <label for="lastnameInput">Last Name:</label>
      <input type="text" id="lastnameInput" class="w3-input w3-padding-8 w3-border" name="lastname"  value="<?php if (!empty($flast_name)) echo $flast_name; ?>" onblur="requiredField(this)" required/><br>

      <label for="genderInput">Gender:</label>
      <input id="genderInput" class="w3-input w3-padding-8 w3-border" type="text" name="gender" value="<?php if (!empty($fgender)) echo $fgender; ?>" list="genderList" onblur="isGender()" required>
      <datalist id="genderList">
          <option value="Male">
          <option value="Female">
          <option value="Nonbinary">
      </datalist>
      <span id="genderError" class="error"></span><br><br>

      <label for="birthdayInput">Birth date:</label>
      <input type="date" id="birthdayInput" class="w3-input w3-padding-8 w3-border" name="birthday" value="<?php if (!empty($fbirthday)) echo $fbirthday; ?>" onblur="requiredField(this)" required/><br>

      <label for="weightInput">Weight (In Pounds):</label>
      <input type="text" id="weightInput" class="w3-input w3-padding-8 w3-border" name="weight" onkeypress="NumericKeyPress(event)" value="<?php if (!empty($fweight)) echo $fweight; ?>" onblur="requiredField(this)" required/><br>


  </fieldset>
    <br>
  <input type="submit" value="Save Profile" name="submit" />
</form><br><br><br><br><br><br><br>
</div>


<div class="col-sm">     
    </div>
</div> <!-- row-->

</body>
<?php
