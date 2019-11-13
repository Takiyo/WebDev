<?php
  // Start the session
  require_once('startsession.php');

  // Insert the page header
  require_once('header.php');
  // $header1 = new header('test');
  // $header1->createPage();

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
  

  // Show the navigation menu

  // Retrieve the user data from MySQL
  $stmt = $pdo->prepare("SELECT user_id, first_name, picture FROM mismatch_user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5");
  $stmt->execute();

  // Loop through the array of user data, formatting it as HTML
  ?>
  <h5>Latest members:</h5>
  <div class="row">

    <div class="col-sm">
    </div>
    <div class="col-sm">

    <table>
    <?php
    foreach ($stmt as $row) {
      if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0) {
        echo '<tr><td><img src="' . MM_UPLOADPATH . $row['picture'] . '" alt="' . $row['first_name'] . '" /></td>';
      }
      else {
        echo '<tr><td><img src="' . MM_UPLOADPATH . 'nopic.jpg' . '" alt="' . $row['first_name'] . '" /></td>';
      }
      if (isset($_SESSION['user_id'])) {
        echo '<td><a href="viewprofile.php?user_id=' . $row['user_id'] . '">' . $row['first_name'] . '</a></td></tr>';
      }
      else {
        echo '<td>' . $row['first_name'] . '</td></tr>';
      }
    }
    echo '</table>';

  ?>

      
  </div> <!-- midcol -->
  <div class="col-sm">
    </div>
</div> <!-- row -->
<?php
  // Insert the page footer
  require_once('footer.php');
?>
