<?php
  // Insert the page header
  $page_title = 'Sign Up';
  require_once('header.php');


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
  ?>
<div class="row">
  <div class="col-sm">
  </div>
  <div class="col-sm">
<?php
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = trim($_POST['username']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $stmt = $pdo->prepare("SELECT * FROM mismatch_user WHERE username = '$username'");
      $stmt->execute();

      if ($stmt->rowCount() == 0) {
        // The username is unique, so insert the data into the database
        $stmt = $pdo->prepare("INSERT INTO mismatch_user (username, password, join_date) VALUES ('$username', SHA('$password1'), NOW())");
        $stmt->execute();

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';

        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }
?>

  <p>Please enter your username and desired password to sign up to Mismatch.</p>
  <div class="form-group">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input class="form-control" type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password1">Password:</label>
      <input class="form-control" type="password" id="password1" name="password1" /><br />
      <label for="password2">Password (retype):</label>
      <input class="form-control" type="password" id="password2" name="password2" /><br />

      <input class="btn btn-primary" type="submit" value="Sign Up" name="submit" />
    </form>
</div>
</div> <!--midcol-->
<div class="col-sm">
</div>
</div> <!--row-->
<?php
  // Insert the page footer
  require_once('footer.php');
?>
