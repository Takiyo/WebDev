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
    <a class="nav-link active" <?php echo ($adminLoggedIn ? 
    'href="logout.php">Logout' : 'href="login.php">Admin Login')?></a>
  <a class="nav-link <?php echo ($adminLoggedIn ? 
    'active' : 'disabled')?>" href="admin.php">Review Scores</a>
</nav>

<div class="row">
  <div class="col-sm outercol" style="height:100em;">
    <div class="sidenav">
    </div>
  </div>
  
  <div class="col-sm innercol container-fluid">
    <h2>Add Your High Score</h2>

    <?php
      require_once('appvars.php');
      require_once('connectvars.php');

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

          // establish connection
          try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        // trims name and scores' white spaces
        // removes special characters
        $name = $_POST['name']; 
        $score = $_POST['score'];
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
                $stmt->prepare("INSERT INTO guitarwars VALUES (0, NOW(), '$name', '$score', '$screenshot', 0)");
                $stmt->execute([$name->name, $score->score, $screenshot->screenshot]);


                // TODO prettyfy confirmation and error messages
                echo '<p>Thanks for adding your new high score! It will be reviewed and added to the high score list as soon as possible.</p>';
                echo '<p><strong>Name:</strong> ' . $name . '<br />';
                echo '<strong>Score:</strong> ' . $score . '<br />';
                echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score image" /></p>';
                echo '<p><a href="index.php">&lt;&lt; Back to high scores</a> or add another.</p>';

                $name = "";
                $score = "";
                $screenshot = "";

              }
              else {
                echo '<p class="error">Sorry, there was a problem uploading your screen.</p>';
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
          echo '<p class="error">Please enter all of the information and add a sreenshot to prove your high score!</p>';
        }
      }
    ?>

    <hr />
      <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" required/><br />
        <label for="score">Score:</label>
        <input class="form-control" onkeypress="return isNumberKey(event)" onpaste="return false" type="text" id="score" name="score" value="<?php if (!empty($score)) echo $score; ?>" required/><br />
        <label for="screenshot">Screen shot:</label>
        <input type="file" id="screenshot" name="screenshot" required/>
        <hr />
        <button class="form-control" type="submit" name="submit">Add</button>
      </form>

  </div> <!-- innercol div -->
  <div class="col-sm outercol">
    <div class="sidenav">
    </div>
  </div>

</div> <!-- row div-->
</body> 
</html>
