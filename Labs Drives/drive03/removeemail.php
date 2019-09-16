<!DOCTYPE html>
<html lang="en">
<head>

  <meta content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Make Me Elvis - Remove Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<?php
  #$dbc = mysqli_connect('data.makemeelvis.com', 'elmer', 'theking', 'elvis_store')
  $dbc = mysqli_connect('localhost', 'root', '', 'tbrytowski')

    or die('Error connecting to MySQL server.');

  $email = $_POST['email'];

  $query = "DELETE FROM email_list WHERE email = '$email'";
  mysqli_query($dbc, $query)
    or die('Error querying database.');

  echo 'Customer removed: ' . $email;

  mysqli_close($dbc);
?>

</body>
</html>
