<html>
<head>
    <title>Fighting Game Character Opinion Survey</title>
</head>

<body>
<h2>Submitted Form</h2>

<?php
$playerName = $_POST['playerName'];
$characterName = $_POST['characterName'];
$topPlayersUse  = $_POST['topPlayersUse'];
$datePlayerStarted = $_POST['datePlayerStarted'];
$coolnessRating = $_POST['coolnessRating'];



$dbc = mysqli_connect('localhost', 'root', '', 'tbrytowski')
or die('Error with connection. </br>');

$query = "INSERT INTO dbfzcharacter (playerName, characterName, topPlayersUse, datePlayerStarted, coolnessRating) "
    . "VALUES ('$playerName', '$characterName', '$topPlayersUse', '$datePlayerStarted', '$coolnessRating')";



$result = mysqli_query($dbc, $query)
or die('Error with query. </br></br>' . $query);

mysqli_close($dbc);

echo "Your inexperienced opinion has been duly noted.</br>Here's what you entered:</br></br>" .
     "Player name: " . $playerName . "</br>" .
     "Character name: " . $characterName . "</br>" .
     "Top player usage: " . $topPlayersUse . "</br>" .
     "Date you started: " . $datePlayerStarted . "</br>" .
     "Coolness Rating: " . $coolnessRating . "</br>";

?>
</body>
</html>
