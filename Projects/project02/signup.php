<!DOCTYPE html>
<html>
<title>Health Watch</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/displayfunctions.js"></script>
<script type="text/javascript" defer src="js/validation.js"></script>
<style>
    body, html {
        height: 70%;
        font-family: "Inconsolata", sans-serif;
    }
    .bgimg {
        background-position: center;
        background-size: cover;
        background-image: url("images/bg.jpg");
        min-height: 75%;
    }
    .menu {
        display: none;
    }
</style>
</head>


<body>
    
<?php 
require_once('navmenu.php'); 

require_once('pageheader.php'); 
?>


<div class="w3-content" style="max-width:700px">

<?php
echo '<div class="col-sm-6 offset-sm-3 center">';

  require_once('appvars.php');
  require_once('connectvars.php');

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
      $username = trim($_POST['username']);
      $password1 = trim($_POST['password1']);
      $password2 = trim($_POST['password2']);
      // first name, last name, gender, birthday,  weight, username pass1 pass2


      if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
          // Make sure someone isn't already registered using this username
          $stmt = $pdo->prepare("SELECT * FROM exercise_user WHERE username = '$username'");
          $stmt->execute();
          if ($stmt->rowCount() == 0) {
              // The username is unique, so insert the data into the database
              $qry = $pdo->prepare("INSERT INTO exercise_user (first_name, last_name, gender, birthdate, weight, username, password) VALUES ('$first_name', '$last_name', '$gender', '$birthday', '$weight', '$username', SHA('$password1'))");
              $qry->execute();

              // Confirm success with the user
              echo '<h4>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</h4>';

              exit();
          }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please choose a different name.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

 // first name, last name, gender, birthday,  weight username pass1 pass2

?>
  <h3>Health Watch - Sign Up</h3>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Please tell us about yourself!</legend>
        <label for="firstnameInput">First Name:</label>
        <input type="text" id="firstnameInput" class="w3-input w3-padding-8 w3-border" name="firstname" onblur="requiredField(this)" required/><br>

        <label for="lastnameInput">Last Name:</label>
        <input type="text" id="lastnameInput" class="w3-input w3-padding-8 w3-border" name="lastname" onblur="requiredField(this)" required/><br>

        <label for="genderInput">Gender:</label>
        <input id="genderInput" class="w3-input w3-padding-8 w3-border" type="text" name="gender" list="genderList" onblur="isGender()">
        <datalist id="genderList">
            <option value="Male">
            <option value="Female">
            <option value="Nonbinary">
        </datalist>
        <span id="genderError" class="error"></span><br><br>

        <label for="birthdayInput">Birth date:</label>
        <input type="date" id="birthdayInput" class="w3-input w3-padding-8 w3-border" name="birthday" onblur="requiredField(this)" required/><br>

        <label for="weightInput">Weight (In Pounds):</label>
        <input type="text" id="weightInput" class="w3-input w3-padding-8 w3-border" name="weight" onblur="requiredField(this)" required/><br>

        <hr>

        <label for="usernameInput">Username:</label>
      <input type="text" id="usernameInput" name="username" class="w3-input w3-padding-8 w3-border"  value="<?php if (!empty($username)) echo $username; ?>"
             onblur="requiredField(this)" required/><br />

      <label for="password1Input">Password:</label>
      <input type="password" id="password1Input" name="password1" class="w3-input w3-padding-8 w3-border" onblur="requiredField(this)" required/><br />

      <label for="password2Input">Password (retype):</label>
      <input type="password" id="password2Input" name="password2" class="w3-input w3-padding-8 w3-border" onblur="requiredField(this)" required/><br />

    </fieldset>
      <br>
    <input type="submit" value="Sign Up" name="submit" />
  </form><br><br><br><br><br><br><br>
        </div>




</body>
</html>
