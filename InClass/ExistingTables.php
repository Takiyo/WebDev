<html>
<head>
    <title>Tables From The 'fightinggamecharacters' Database</title>
</head>


<h2>DBFZ Character Opinions</h2>


<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">

    <?php
    $dbc = mysqli_connect('localhost', 'root', '', 'tbrytowski');
    if ($dbc->connect_error){
    die("Connection error: " . $dbc->connect_error);
    }

    if (isset($_POST['displayBTN']) && isset($_POST['checked_values'])) {
        echo '<table style="width:100%" border="1px solid;">
          <tr>
            <th>playerId</th>
            <th>playerName</th>
            <th>characterName</th>
              <th>topPlayersUse</th>
              <th>datePlayerStarted</th>
              <th>coolnessRating</th>
        
          </tr>';


        foreach ($_POST['checked_values'] as $checked_id)
        {

            $query = "SELECT playerId, playerName, characterName, topPlayersUse, datePlayerStarted, coolnessRating
        FROM dbfzcharacter WHERE playerId = $checked_id";

            $result = mysqli_query($dbc, $query)
                or die ('Error querying database');

            $row = mysqli_fetch_array($result);

            if ($row['topPlayersUse'] == '0'){
                $row['topPlayersUse'] = "True";
            } else $row['topPlayersUse'] = "False";

                echo '<tr><td>' . $row['playerId'] . '</td><td>'
                    . $row['playerName'] . '</td><td>'
                    . $row['characterName'] . '</td><td>'
                    . $row['topPlayersUse'] . '</td><td>'
                    . $row['datePlayerStarted'] . '</td><td>'
                    . $row['coolnessRating'] . '</td></tr>';
            }
            echo '</table>';
        }


    $query = 'SELECT playerId FROM dbfzcharacter';
    $result = mysqli_query($dbc, $query)
        or die('Error querying database');

        while ($row = mysqli_fetch_array($result))
        {
            echo '<input type="checkbox" value="' . $row['playerId']
                . '" name="checked_values[]">' . $row['playerId'] . "</input><br>";
        }
    mysqli_close($dbc);
        ?>


    <input name="displayBTN" type="submit" value="Display">
</form>




</html>