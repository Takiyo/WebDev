<!doctype html>
<html lang="en">
  <head>
    <title>Add Your Score</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="jsvalidation/generalvalidation.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<?php 
    require_once('appvars.php');
    require_once('connectvars.php');
  
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $adminLoggedIn = false;
    
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
  <a class="nav-link <?php echo ($adminLoggedIn ? 
    'active' : 'disabled')?>" href="admin.php">Review Scores</a>
  <a class="nav-link active" <?php echo ($adminLoggedIn ? 
    'href="logout.php">Logout</a>' : 'href="login.php">Admin Login</a>')?>
</nav>

<div class="row">
  <div class="col-sm outercol" style="height:100em;">
    <div class="sidenav">
    </div>
  </div>
  
  <div class="col-sm innercol">
    <h2>Guitar Wars - Add Your High Score</h2>

    <?php
      require_once('appvars.php');
      require_once('connectvars.php');

      if (isset($_POST['submit'])) {
        // trims name and scores' white spaces
        // removes special characters
        $name = mysqli_real_escape_string($dbc, trim($_POST['name'])); 
        $score = mysqli_real_escape_string($dbc, trim($_POST['score']));
        $screenshot = $_FILES['screenshot']['name'];
        $screenshot_type = $_FILES['screenshot']['type'];
        $screenshot_size = $_FILES['screenshot']['size']; 

        if (!empty($name) && !empty($score) && !empty($screenshot)) {
          if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
            && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
            if ($_FILES['screenshot']['error'] == 0) {
              $target = GW_UPLOADPATH . $screenshot; 

              // move file to target directory  
              // if move successfull
              if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
                $query = "INSERT INTO guitarwars VALUES (0, NOW(), '$name', '$score', '$screenshot')";
                mysqli_query($dbc, $query);

                // TODO prettyfy confirmation and error messages
                echo '<p>Thanks for adding your new high score! It will be reviewed and added to the high score list as soon as possible.</p>';
                echo '<p><strong>Name:</strong> ' . $name . '<br />';
                echo '<strong>Score:</strong> ' . $score . '<br />';
                echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score image" /></p>';
                echo '<p><a href="index.php">&lt;&lt; Back to high scores</a></p>';

                // clear the score data to clear the form
                $name = "";
                $score = "";
                $screenshot = "";

                mysqli_close($dbc);
              }
              else {
                echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
              }
            }
          }
          else {
            echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
          }

          // delete temporary image file
          @unlink($_FILES['screenshot']['tmp_name']);
        }
        else {
          echo '<p class="error">Please enter all of the information to add your high score.</p>';
        }
      }
    ?>

    <hr />
    <div class="input-group">
      <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
        <label for="score">Score:</label>
        <input class="form-contron" onkeypress="return isNumberKey(event)" onpaste="return false" type="text" id="score" name="score" value="" /><br />
        <label for="screenshot">Screen shot:</label>
        <input class="form-contron" type="file" id="screenshot" name="screenshot" />
        <hr />
        <input class="form-contron" type="submit" value="Add" name="submit" />
      </form>
    </div>

  </div> <!-- innercol div -->
  <div class="col-sm outercol">
    <div class="sidenav">
    </div>
  </div>

</div> <!-- row div-->
</body> 
</html>
