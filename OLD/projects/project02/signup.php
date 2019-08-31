<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
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
<div class="w3-top">
    <div class="w3-row w3-padding w3-black">
        <div class="w3-col s4">
            <a href="index.php" class="w3-button w3-block w3-black">HOME</a>
        </div>
        <div class="w3-col s4">
            <a href="signup.php" class="w3-button w3-block w3-black">SIGN UP</a>
        </div>
        <div class="w3-col s4">
            <a href="login.php" class="w3-button w3-block w3-black">LOG IN</a>
        </div>
    </div>
</div>


<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
        <span class="w3-tag">LOGIN STATUS PLACEHOLDER</span>
    </div>
    <div class="w3-display-middle w3-center">
        <span id="titleheader" class="w3-text-white" style="font-size:90px">Health<br>Watch</span>
    </div>
    <div class="w3-display-bottomright w3-center w3-padding-large">
        <span class="w3-text-white">LOGIN STATUS PLACEHOLDER</span>
    </div>
</header>
<div class="w3-content" style="max-width:700px">

<?php
echo '<div class="col-sm-6 offset-sm-3 center">';

  require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
      $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
      $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
      $gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
      $birthday = mysqli_real_escape_string($dbc, trim($_POST['birthday']));
      $weight = mysqli_real_escape_string($dbc, trim($_POST['weight']));
      $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
      $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
      // first name, last name, gender, birthday,  weight, username pass1 pass2


      if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
          // Make sure someone isn't already registered using this username
          $query = "SELECT * FROM exercise_user WHERE username = '$username'";
          $data = mysqli_query($dbc, $query);
          if (mysqli_num_rows($data) == 0) {
              // The username is unique, so insert the data into the database
              $query = "INSERT INTO exercise_user (first_name, last_name, gender, birthdate, weight, username, password) VALUES ('$first_name', '$last_name', '$gender', '$birthday', '$weight', '$username', SHA('$password1'))";
              mysqli_query($dbc, $query);

              // Confirm success with the user
              echo '<h4>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</h4>';

              mysqli_close($dbc);
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

  mysqli_close($dbc);
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
