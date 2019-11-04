
<!DOCTYPE html>
<html>
<title>Health Watch</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/displayfunctions.js"></script>
<script type="text/javascript" defer src="js/validation.js"></script>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">

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

<?php 
require_once('navmenu.php'); 

require_once('pageheader.php'); 
?>



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
                
                if (isset($_COOKIE['hwId'])){
                    $userId = $_COOKIE['hwId'];
                }


                $calculatedOutputMale = ((-55.0969 + (0.6309 * (int)$heartrate) + (0.090174 * (int)$weight) + (0.2017 * (int)$age)) / 4.184) * (int)$duration;
                $calculatedOutputFemale = ((-20.4022 + (0.4472 * (int)$heartrate) - (0.057288 * (int)$weight) + (0.074 * (int)$age)) / 4.184) * (int)$duration;

                // Placeholders
                $calculatedCalories = $calculatedOutputMale;
                if ($gender == "Nonbinary"){
                    $gender = "Male";
                }



                if ($gender == "Male"){
                    $calculatedCalories = $calculatedOutputMale;
                } else if ($gender == "Female") {
                    $calculatedCalories = $calculatedOutputFemale;
                }




                if (empty($gender) || empty($age) || empty($weight) ||
                    empty($duration) || empty($heartrate)){
                    echo '<h2 class="error">Please fill out the entire form.</h2></br>';
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
                $stmt = $pdo->prepare('INSERT INTO exercise_log (user_id, age, weight, duration, date, heartrate, calories) VALUES (?,?,?,?,?,?,?)');
                $stmt->execute([$userId, $age, $weight, $duration, date("Y-m-d H:i:s"), $heartrate, $calculatedCalories]); //Date is now.



            }





            // TODO autofill account info with select query if logged in
            if (true){
                ?>
                <form action="index.php<?php echo "#focushere"?>" method="post" enctype="multipart/form-data">
                    <label for="genderInput">Enter your gender:</label>
                    <input id="genderInput" class="w3-input w3-padding-8 w3-border" type="text" name="gender" list="genderList" onblur="isGender()">
                    <datalist id="genderList">
                        <option value="Male">
                        <option value="Female">
                        <option value="Nonbinary">
                    </datalist>
                    <span id="genderError" class="error"></span></br><br>

                    <label for="ageInput">Enter your age:</label>
                    <input id="ageInput" class="w3-input w3-padding-8 w3-border" type="number" name="age" onkeypress="NumericKeyPress(event)" onblur="requiredField(this), inAgeRange(1, 150, this)" required/>
                    <span id="ageError" class="error"></span><br><br>

                    <label for="weightInput">Enter your weight (pounds):</label>
                    <input id="weightInput" class="w3-input w3-padding-8 w3-border" type="number" name="weight" onkeypress="NumericKeyPress(event)" onblur="requiredField(this)" required/>
                    <span id="weightError" class="error"></span><br><br>


                    <label for="durationInput">How long you exercised (minutes):</label>
                    <input id="durationInput" class="w3-input w3-padding-8 w3-border" type="number" name="duration" onkeypress="NumericKeyPress(event)" onblur="requiredField(this)" required/>
                    <span id="durationError" class="error"></span><br><br>

                    <label for="heartrateInput">What was your average heart rate (BPM):</label>
                    <input id="heartrateInput" class="w3-input w3-padding-8 w3-border" type="number" name="heartrate" onkeypress="NumericKeyPress(event)" onblur="requiredField(this)" required/>
                    <span id="heartrateError" class="error"></span><br><br>

                    <input class="w3-button w3-black w3-input" type="submit" value="Calculate" name="submit" style="margin-bottom:50px"/>

                </form>
                <?php
            }
            ?>
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

    <!-- Sign Up -->
<?php
    if (!isset($_COOKIE['hwUsername']));
    {
        echo '
    <div class="w3-container" style="padding-bottom:32px;">
        <div class="w3-content" style="max-width:700px">
            <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">CREATE AN ACCOUNT</span></h5>
            <p>Want to keep track of your exercise habits? Why not <a href="signup.php">create an account</a> so we can do it for you!</p>
        </div>
    </div>';
    } ?>

    <!-- End page content -->
</div>



<script>
    document.getElementById("myLink").click();
</script>

</body>
</html>