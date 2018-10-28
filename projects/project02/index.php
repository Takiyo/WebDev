<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="css/style.css">
<script src="js/displayfunctions.js"></script>
<style>
    body, html {
        height: 100%;
        font-family: "Inconsolata", sans-serif;
    }
    .bgimg {
        background-position: center;
        background-size: cover;
        background-image: url("images/bg.jpg");
        min-height: 75%;
    }
    .menu {
        display: none;
    }
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
    <div class="w3-row w3-padding w3-black">
        <div class="w3-col s4">
            <a href="index.php" class="w3-button w3-block w3-black">HOME</a>
        </div>
        <div class="w3-col s4">
            <a href="#signup" class="w3-button w3-block w3-black">SIGN UP</a>
        </div>
        <div class="w3-col s4">
            <a href="#login" class="w3-button w3-block w3-black">LOG IN</a>
        </div>
    </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
        <span class="w3-tag">LOGIN STATUS PLACEHOLDER</span>
    </div>
    <div class="w3-display-middle w3-center">
        <span id="titleheader" class="w3-text-white" style="font-size:90px">Health<br>Watch</span>
    </div>
    <div class="w3-display-bottomright w3-center w3-padding-large">
        <span class="w3-text-white">LOGIN STATUS PLACEHOLDER</span>
    </div>
</header>

<!-- Add a background color and large text to the whole page -->
        <div class="w3-content" style="max-width:700px">
            <p><br>This heart rate based calorie burn calculator provide an estimate of the rate at which you are burning calories during aerobic (i.e. cardiorespiratory) exercise, based on your average heart rate while performing the exercise.</p>
            <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide"><img id="calc" src="images/calc.png"> CALCULATE YOUR CALORIES</span></h5>

            <?php
            require_once('connectvars.php');
            require_once('appvars.php');



            $output_form = 'no';
            $story_exists = false;

            if (isset($_POST['submit'])) {


                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $weight = $_POST['weight'];
                $duration= $_POST['duration'];
                $heartrate = $_POST['heartrate'];


                //testing
              //  if (empty($gender)){
                //    $gender = "Female";
               // }



                $calculatedOutputMale = ((-55.0969 + (0.6309 * (int)$heartrate) + (0.090174 * (int)$weight) + (0.2017 * (int)$age)) / 4.184) * (int)$duration;

                $calculatedOutputFemale = ((-20.4022 + (0.4472 * (int)$heartrate) - (0.057288 * (int)$weight) + (0.074 * (int)$age)) / 4.184) * (int)$duration;



                if (empty($gender) || empty($age) || empty($weight) ||
                    empty($duration) || empty($heartrate)){
                    echo '<h2 style="color:red; border:1px dotted black; width:35%;">Please fill out the entire form.</h2></br>';
                    $output_form = 'yes';
                    $focusOrNot="";
                }
                else{
                    $focusOrNot="#focushere";
                }
            }

            else {
                $output_form = 'yes';
            }

            // Test Connection Credentials
            if (!empty($gender) || !empty($age) || !empty($weight) || !empty($duration) || !empty($heartrate)) {
                $host = DB_HOST;
                $db   = DB_NAME;
                $user = DB_USER;
                $pass = DB_PASSWORD;
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                // Establish connection
                try {
                    $pdo = new PDO($dsn, $user, $pass, $options);
                } catch (\PDOException $e) {
                    throw new \PDOException($e->getMessage(), (int)$e->getCode());
                }



                // Insert form data into database
                $stmt = $pdo->prepare('INSERT INTO exercise_log (age, weight, duration, heartrate) VALUES (?,?,?,?)');
                $stmt->execute([$age, $weight, $duration, $heartrate]);

                // Get & display data back from database
                $stmt = $pdo->query('SELECT * FROM exercise_log');
                $stmt->execute();



                foreach($stmt as $row)
                {

                }

            }






            if (true){
                ?>
                <form action="index.php<?php echo "#focushere"?>" method="post" enctype="multipart/form-data">
                    <legend>Enter your Gender:</legend>
                    <input class="w3-input w3-padding-8 w3-border" type="text" name="gender" list="genderList">
                    <datalist id="genderList">
                        <option value="Male">
                        <option value="Female">
                    </datalist></br><br>

                    <legend>Enter your age:</legend>
                    <input class="w3-input w3-padding-8 w3-border" type="text" name="age"/><br><br>

                    <legend>Enter your weight (pounds):</legend>
                    <input class="w3-input w3-padding-8 w3-border" type="text" name="weight"/><br><br>

                    <legend>How long you exercised (minutes):</legend>
                    <input class="w3-input w3-padding-8 w3-border" type="text" name="duration"/><br><br>

                    <legend>What was your average heart rate (BPM):</legend>
                    <input class="w3-input w3-padding-8 w3-border" type="text" name="heartrate"/><br><br>

                    <input class="w3-button w3-black w3-input" type="submit" value="Calculate" name="submit" style="margin-bottom:50px"/>

                </form>
                <?php
            }
            ?>


        </div>
    </div>

    <!-- Menu Container -->
<?php
    if (isset($_POST['submit'])) {
        ?>
        <div class="w3-container" id = "menu" >
        <div class="w3-content" style = "max-width:700px" >

            <h5 class="w3-center w3-padding-48" ><span id = "focushere" class="w3-tag w3-wide" > YOUR BURNED CALORIES </span ></h5 >

            <div class="w3-row w3-center w3-card w3-padding" >
                <a href = "javascript:void(0)" onclick = "openResults(event, 'Walking');" id = "myLink" >
                    <div class="w3-col s6 tablink" > Walking</div >
                </a >
                <a href = "javascript:void(0)" onclick = "openResults(event, 'Running');" >
                    <div class="w3-col s6 tablink" > Running</div >
                </a >
                <a href = "javascript:void(0)" onclick = "openResults(event, 'Weightlifting');" >
                    <div class="w3-col s6 tablink" > Weightlifting</div >
                </a >
                <a href = "javascript:void(0)" onclick = "openResults(event, 'Swimming');" >
                    <div class="w3-col s6 tablink" > Swimming</div >
                </a >
            </div>
            <?php
            }
            ?>

            <div id="Walking" class="w3-container menu w3-padding-48 w3-card">
                <h5>While walking, you burned:</h5>
                <strong><p class="w3-text-grey" style="font-size:120%; text-align: center;"><?php
                    if ($gender == "Male"){
                        echo round($calculatedOutputMale * WALK_MODIFIER);
                    }
                    else if($gender == "Female"){
                        echo round($calculatedOutputFemale * WALK_MODIFIER);
                    }
                    ?> calories</strong></p>
            </div>

            <div id="Running" class="w3-container menu w3-padding-48 w3-card">
                <h5>While running, you burned:</h5>
                <strong><p class="w3-text-grey" style="font-size:120%; text-align: center;"><?php
                    if ($gender == "Male"){
                        echo round($calculatedOutputMale * RUN_MODIFIER);
                    }
                    else if($gender == "Female"){
                        echo round($calculatedOutputFemale * RUN_MODIFIER);
                    }
                    ?> <strong>calories</strong></p>
            </div>

            <div id="Weightlifting" class="w3-container menu w3-padding-48 w3-card">
                <h5>While weightlifting, you burned:</h5>
                <strong><p class="w3-text-grey" style="font-size:120%; text-align: center;"><?php
                    if ($gender == "Male"){
                        echo round($calculatedOutputMale * WEIGHTLIFT_MODIFIER);
                    }
                    else if($gender == "Female"){
                        echo round($calculatedOutputFemale * WEIGHTLIFT_MODIFIER);
                    }
                    ?> <strong>calories</strong></p>
            </div>

            <div id="Swimming" class="w3-container menu w3-padding-48 w3-card">
                <h5>While swimming, you burned:</h5>
                <strong><p class="w3-text-grey" style="font-size:120%; text-align: center;"><?php
                    if ($gender == "Male"){
                        echo round($calculatedOutputMale * SWIM_MODIFIER);
                    }
                    else if($gender == "Female"){
                        echo round($calculatedOutputFemale * SWIM_MODIFIER);
                    }
                    ?> <strong>calories.</strong></p>
            </div>

            <hr>
        </div>
    </div>

    <!-- Contact/Area Container -->
    <div class="w3-container" id="where" style="padding-bottom:32px;">
        <div class="w3-content" style="max-width:700px">
            <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">CREATE AN ACCOUNT</span></h5>
            <p>Want to keep track of your exercise habits? Why not create an account so we can do it for you!</p>
            <form action="/action_page.php" target="_blank">
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
                <p><button class="w3-button w3-black" type="submit">SEND MESSAGE</button></p>
            </form>
        </div>
    </div>

    <!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
    <p>Placeholder</p>
</footer>

<script>
    document.getElementById("myLink").click();
</script>

</body>
</html>
