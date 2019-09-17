<!DOCTYPE html>
<html lang="en">
<head>

  <meta content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Make Me Elvis - Send Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<?php
  require_once('connectvars.php');
  $from = 'elmer@makemeelvis.com';
  $subject = $_POST['subject'];
  $text = $_POST['elvismail'];

  #$dbc = mysqli_connect('data.makemeelvis.com', 'elmer', 'theking', 'elvis_store')
  $dbc = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die('Error connecting to MySQL server.');

  $query = "SELECT * FROM email_list";
  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

  while ($row = mysqli_fetch_array($result)){
    $to = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $msg = "Dear $first_name $last_name,\n$text";
    mail($to, $subject, $msg, 'From:' . $from);
    echo 'Email sent to: ' . $to . '<br />';
    echo '<br>';
    echo 'Return to <a href="index.html">main page</a>';
  
  } 

  mysqli_close($dbc);
?>

</body>
</html>
