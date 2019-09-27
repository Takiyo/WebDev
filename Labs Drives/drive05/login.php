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

        //MOVE TO LOGIN
        $local_admin_UN = $_COOKIE['admin_UN'];
        $local_admin_PW = $_COOKIE['admin_PW'];
        // look up un and pw from database
        $query = "SELECT adminID, adminUN 
                    FROM globalAdmin 
                    WHERE adminUN = '$local_admin_UN' AND password = '$local_admin_PW')";
        //echo $query;
        $data = mysqli_query($dbc, $query);
        //MOVE TO LOGIn
        ?>
    </body>
</html>