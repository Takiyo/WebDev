<?php
$page = new GearMain();
$page->createPage();
class GearMain{
    public function __construct(){

    }

    public function createPage(){
        ?>
        <div class="row" style="height:100%">
            <div class="col-sm">               
            </div>
            <div class="col-sm">               

            <h2>Welcome to ARCREVO 2019 Signup!</h2>
            <br>
            <br>

            <?php
            error_reporting(0);
            ini_set('display_errors', 0);
            
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
            
            if (isset($_POST['submit'])) {
            $tag = $_POST['tag'];
            $firstName = $_POST['firstName'];
            $startDate = $_POST['startDate'];
            $seedExpectation = $_POST['seedExpectation'];
            $isCompeting = $_POST['isCompeting'];
            $isVolunteer = $_POST['isVolunteer'];

            $output_form = 'no';

            if (empty($tag) || empty($firstName) || empty($startDate))
            {
                //TODO make similar to inclass example - 100% width red div
                echo '<h2 style="color:red; border:1px dotted black; width:35%;">Please fill out the entire form.</h2></br>';
                $output_form='yes';
            }
        }
        else
        {
            $output_form='yes';
        }

        if (!empty($tag) || !empty($firstName) || !empty($startDate) || !empty($isCompeting) || !empty($isVolunteer)) {

            $stmt = $pdo->prepare("INSERT INTO ggplayers (tag, firstName, startDate, seedExpectation, isCompeting, isVolunteer) "
                . "VALUES ('$tag', '$firstName', '$startDate', '$seedExpectation', '$isCompeting', '$isVolunteer')");
            $stmt->execute();

            if ($output_form == 'no') {
                echo "<h4>You've been entered in to ARCREVO 2019!</h4></br>";// .
                    // "Player name: " . $playerName . "</br>" .
                    // "Character name: " . $characterName . "</br>" .
                    // "Date you started: " . $datePlayerStarted . "</br>" .
                    // "Coolness Rating: " . $coolnessRating . "</br></br>";

                }
        }

    if ($output_form == 'yes') {
        ?>
        <div class="form-group">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                <legend>What tag do you go by?</legend>
                <input class="form-control" type="text" name="tag" onblur="requiredField(this)" required/><br/><br/>

                <legend>What's your first name?</legend>
                <input class="form-control" type="text" name="firstName" onblur="requiredField(this)" required /><br/><br/>

                <legend>What date did you start playing Guilty Gear</legend>
                <input class="form-control" type="date" name="startDate" onblur="requiredField(this)" required /><br/><br/>

                <legend>Are you spectating or competing?</legend>
                <input class="radiobtn" type="radio" name="isCompeting" value="1"/>
                <label for="1">Competing</label><br/>
                <input class="radiobtn" type="radio" name="isCompeting" value="0"/>
                <label for="0">Spectating</label><br><br>

                <legend>Did you volunteer to help set up the venue?</legend>
                <input type="radio" name="isVolunteer" value="1"/>
                <label for="1">Yes</label><br>
                <input type="radio" name="isVolunteer" value="0"/>
                <label for="0">No</label>                
                <br/><br/>

                <legend>What place would you expect to be seeded if we had 100 entrants?</legend>
                <input class="form-control" type="range" id="seedExpectation" name="seedExpectation" value="50" min="1" max="100"
                    oninput="seedExpectationOutput.value = seedExpectation.value">
                <output name="seedExpectationOutput" id="seedExpectationOutput">50</output><br><br>
                <br><br>

                <input class="btn btn-primary" type="submit" value="Submit Survey" name="submit"/>
            </form>
        </div>

        <div class="col-sm">               
        </div>
    </div>

    <?php
}

?>
        <div class="col-sm">               
        </div>


        <?php


    }
}
