<?php

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  //if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
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
      
      // Grab the user-entered log-in data
      $user_username = trim($_POST['username']);
      $user_password = trim($_POST['password']);

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $stmt = $pdo->prepare("SELECT username, password FROM gglogin WHERE username = '$user_username' AND password = '$user_password'");
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
          foreach ($stmt as $row){      
            // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
            $_SESSION['username'] = $row['username'];
            setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
            header('Location: ' . $home_url);
          }
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  //}

?>
<div class="row">
  <div class="col-sm">
  </div>

<div class="col-sm">
<?php
// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['username'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>
<div class="form-group">


  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <legend>Log In</legend>
    <input class="form-control" placeholder="Username" type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
    <input class="form-control" placeholder="Password" type="password" name="password" />
    <br>
    <input class="btn btn-primary" type="submit" value="Log In" name="submit" />
  </form>
  </div> <!--formgroup-->
  </div><!--midcol-->
<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>
  <div class="col-sm">
  </div>
</div> <!--row-->
