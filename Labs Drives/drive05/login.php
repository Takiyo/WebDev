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
      <?php
      //MOVE TO LOGIN
        // $local_admin_UN = $_COOKIE['admin_UN'];
        // $local_admin_PW = $_COOKIE['admin_PW'];

        // look up un and pw from database
        // $query = "SELECT adminId, adminUN 
        //             FROM globaladmin 
        //             WHERE adminUN = '$local_admin_UN' AND password = '$local_admin_PW')";
        //echo $query;
        //$data = mysqli_query($dbc, $query);
        //MOVE TO LOGIn
        
        //
        if (!$adminLoggedIn) {
          // prints error message if there is one
          // ex: login failed, etc
          echo '<p class="error">' . $error_msg . '</p>';
          ?>
          <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <legend>Log In</legend>
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>"/ required><br/>
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" required/>
            <br>
            <button class="btn btn-primary" type="submit" name="submit">Log In</button>
          <?php
        }
        else {
          // Confirm the successful log-in
          echo('<p>You are logged in as ' . $_SESSION['username'] . '.</p>');
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