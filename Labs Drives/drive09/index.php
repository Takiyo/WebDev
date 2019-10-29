<!doctype html>
<html lang="en">
  <head>
    <title>Risky Jobs - Search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
<body>  
  <div id="imgcontainer">
  <img src="riskyjobs_title.gif" alt="Risky Jobs" id="headerimg"/>
</div>
  <div class="row">
    
  <div class="col-sm">    
  </div>
  <div class="col-sm">    

  <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
  <h3>Risky Jobs - Search</h3>
  <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="usersearch">Find your risky job:</label><br />
    <input type="text" id="usersearch" name="usersearch" /><br /><br><br>
    <input type="submit" name="submit" value="Submit" />
  </form>
  </div>

  <div class="col-sm">
  </div>
</div>

<hr>
<div class="row">

    <div class="col-sm"> 
     </div>
      <div class="col-sm">
        <?php 
        require_once('connectvars.php');   
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
        $pdo = new PDO($dsn, $user, $pass, $options);
          require_once('search.php');
        ?>
      </div>
      <div class="col-sm">
  
      </div>
                  
</div>  

</body>
</html>
