<!--

Everything below the createPage function is part of the function.
    This is so you can modularly create the same page on another file
    but link different style sheets/scripts/etc

    TODO - 
        PDO
        Delete topPlayersUse
        Change DB name
-->


<?php
$page = new GearMain();
$page->createPage();
class GearMain{
    public function __construct(){

    }

    public function createPage(){
        
        
        if (isset($_POST['submit'])) {
        $playerName = $_POST['playerName'];
        $characterName = $_POST['characterName'];
        //$topPlayersUse = $_POST['topPlayersUse'];
        $datePlayerStarted = $_POST['datePlayerStarted'];
        $coolnessRating = $_POST['coolnessRating'];
        $image = $_FILES['gamerMug']['name'];
        $output_form = 'no';

        if (empty($playerName) || empty($characterName) || empty($datePlayerStarted)
            || empty($coolnessRating))
        {
            //make similar to inclass example - 100% width red div
            echo '<h2 style="color:red; border:1px dotted black; width:35%;">Please fill out the entire form.</h2></br>';
            $output_form='yes';
        }
    }
    else
    {
        $output_form='yes';
    }

    if (!empty($playerName) || !empty($characterName) || !empty($datePlayerStarted) || !empty($coolnessRating)) {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('Error with connection. </br>');


        $query = "INSERT INTO dbfzcharacter (playerName, characterName, topPlayersUse, datePlayerStarted, coolnessRating) "
            . "VALUES ('$playerName', '$characterName', '$topPlayersUse', '$datePlayerStarted', '$coolnessRating')";

        $result = mysqli_query($dbc, $query)
            or die('Data not inserted. </br></br>' . $query);

        if ($output_form == 'no') {
            echo "Your inexperienced opinion has been duly noted.</br>Here's what you entered:</br></br>" .
                "Player name: " . $playerName . "</br>" .
                "Character name: " . $characterName . "</br>" .
                "Top player usage: " . $topPlayersUse . "</br>" .
                "Date you started: " . $datePlayerStarted . "</br>" .
                "Coolness Rating: " . $coolnessRating . "</br></br>";

            // Attempting to upload file.
            uploadImage();
            echo "<img src='" . "uploads/" . "$image" . "'/>";
        }

        mysqli_close($dbc);
    }

if ($output_form == 'yes') {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <legend>What's your name?</legend>
        <input type="text" id="playerName" name="playerName" onblur="requiredField(this)" required/><br/><br/>

        <legend>What character are you giving your opinion on?</legend>
        <input type="text" id="characterName" name="characterName" onblur="requiredField(this)" required /><br/><br/>

        <fieldset>
            <legend>Do top players use this character?</legend>
            <label for="topPlayersUseTrue">Yes</label>
            <input type="radio" id="topPlayersUseTrue" name="topPlayersUse" value="true" checked /><br/>
            <label for="topPlayersUseFalse">No</label>
            <input type="radio" id="topPlayersUseFalse" name="topPlayersUse" value="false"/><br/>
        </fieldset>
        <br/>

        <legend>What date did you start playing DBFZ?</legend>
        <input type="date" id="datePlayerStarted" name="datePlayerStarted"/><br/><br/>

        <legend>How cool is this character to you from 1-100?</legend>
        <input type="range" name="coolnessRating" id="coolnessRating" value="50" min="1" max="100"
               oninput="coolnessRatingOutput.value = coolnessRating.value">
        <output name="coolnessRatingOutput" id="coolnessRatingOutput">50</output><br><br>

        <label for="gamerMug">Give us a face to go with the bad opinion.</label><br>
        <input type="file" id="gamerMug" name="gamerMug"/>
        <input type="hidden" name="MAX_FILE_SIZE" value="32768" />
        </br></br>

        <input type="submit" value="Submit Survey" name="submit"/>
    </form>
    <?php
}
?>


        <?php


    }
}
