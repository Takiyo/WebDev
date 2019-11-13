<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
    <body>
        <?php
        session_start();
        $error_msg = "";

        require_once('appvars.php');
        require_once('connectvars.php');
      
        $adminLoggedIn = false;
        
        // checks if admin is logged in for various purposes
        if (isset($_COOKIE['gwAdminLoggedIn'])){
          if ($_COOKIE['gwAdminLoggedIn'] == 'true')
          {
            echo "cookie";
            $adminLoggedIn = true;
          }
        }

        if (isset($_SESSION['gwAdminLoggedIn'])){
            echo "sesh";
            $adminLoggedIn = true;
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

      <div class="col-sm-50 innercol">
      <?php
        
       // if (!isset($_SESSION['gwAdminId'])) { // session not yet set
          if (isset($_POST['submit'])) { // submitted
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $admin_UN = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $admin_PW = mysqli_real_escape_string($dbc, trim($_POST['password']));
            if (!empty($admin_UN) && !empty($admin_PW)) {
              $query = "SELECT adminId, adminUN 
                FROM globaladmin 
                WHERE adminUN = '$admin_UN' AND adminPW = '$admin_PW'";
              $data = mysqli_query($dbc, $query);
               // or die("Error with query.");

              error_reporting(E_ERROR | E_PARSE); // prevents warnings from being shown

              mysqli_close($dbc);

              if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_array($data);

                // sets session and cookies
                // $_SESSION['gwAdminId'] = $row['adminId'];
                // $_SESSION['gwAdminUN'] = $row['adminUN'];
                // echo $row['adminId'];
                // echo $row['adminUN'];
                setcookie('gwAdminId', $row['adminId'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('gwAdminUN', $row['adminUN'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                setcookie('gwAdminLoggedIn', 'true', time() + (60 * 60 * 24 * 30));  // expires in 30 days
                // does not set their password in cookie plaintext that would be silly
                
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $home_url); //redirect home
              }          
              else { // incorrect un/pass
                $error_msg = 'Invalid username or password.';
              }
            }
          }
        //}
        if (!$adminLoggedIn) {
          // prints error message if there is one
          // ex: login failed, etc
          echo '<p class="error" style="color:red;">' . $error_msg . '</p>';
          ?>
          <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <legend>Log In</legend>
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" value="<?php if (!empty($admin_UN)) echo $admin_UN; ?>" required/><br/>
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" required/>
            <br>
            <button class="btn btn-primary" type="submit" name="submit">Log In</button>
          <?php
        }
        else {
          // Confirm the successful log-in
          echo('<p>You are logged in as ' . $_COOKIE['gwAdminUN'] . '.</p>');
        }

        ?>
      </div> <!-- innercol div -->

      <div class="col-sm outercol">
        <div class="sidenav">
        </div>
      </div>
      
    </div> <!-- row div -->
    </body>
</html>