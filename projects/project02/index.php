<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="css/style.css">
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
            <a href="#" class="w3-button w3-block w3-black">HOME</a>
        </div>
        <div class="w3-col s4">
            <a href="#about" class="w3-button w3-block w3-black">SIGN UP</a>
        </div>
        <div class="w3-col s4">
            <a href="#menu" class="w3-button w3-block w3-black">LOG IN</a>
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



            $output_form = 'no';
            $story_exists = false;

            if (isset($_POST['submit'])) {


                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $weight = $_POST['weight'];
                $duration= $_POST['duration'];
                $heartrate = $_POST['heartrate'];

                //
                $calculatedOutputMale = ((-55.0969 + (0.6309 * $heartrate) + (0.090174 * $weight) + (0.2017 * $age)) / 4.184) * $duration;

                $calculatedOutputFemale = ((-20.4022 + (0.4472 * $heartrate) - (0.057288 * $weight) + (0.074 * $age)) / 4.184) * $duration;



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
                $stmt = $pdo->query('SELECT * FROM madlibstable');
                $stmt->execute();

                $story_exists = true;
                echo "<h3>Existing Stories:</h3>";

                foreach($stmt as $row)
                {

                }

            }





            if ($story_exists) {
                echo "<h4 id='focushere'>Input another!</h4>";
            }
            if (true){
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] . $focusOrNot ?>" method="post" enctype="multipart/form-data">
                    <legend>Enter your Gender:</legend>
                    <input type="text" name="gender" list="genderList">
                    <datalist id="genderList">
                        <option value="Male">
                        <option value="Female">
                    </datalist></br><br>

                    <legend>Enter your age:</legend>
                    <input type="text" name="age"/><br><br>

                    <legend>Enter your weight (pounds):</legend>
                    <input type="text" name="weight"/><br><br>

                    <legend>How long you exercised (minutes):</legend>
                    <input type="text" name="duration"/><br><br>

                    <legend>What was your average heart rate (BPM):</legend>
                    <input type="text" name="heartrate"/><br><br>




                    <input type="submit" value="Calculate" name="submit" style="margin-bottom:50px"/>

                </form>
                <?php
            }
            ?>


        </div>
    </div>

    <!-- Menu Container -->
    <div class="w3-container" id="menu">
        <div class="w3-content" style="max-width:700px">

            <h5 class="w3-center w3-padding-48"><span id="focushere" class="w3-tag w3-wide">YOUR BURNED CALORIES</span></h5>

            <div class="w3-row w3-center w3-card w3-padding">
                <a href="javascript:void(0)" onclick="openResults(event, 'Walking');" id="myLink">
                    <div class="w3-col s6 tablink">Walking</div>
                </a>
                <a href="javascript:void(0)" onclick="openResults(event, 'Running');">
                    <div class="w3-col s6 tablink">Running</div>
                </a>
                <a href="javascript:void(0)" onclick="openResults(event, 'Weightlifting');">
                    <div class="w3-col s6 tablink">Weightlifting</div>
                </a>
                <a href="javascript:void(0)" onclick="openResults(event, 'Swimming');">
                    <div class="w3-col s6 tablink">Swimming</div>
                </a>
            </div>

            <div id="Walking" class="w3-container menu w3-padding-48 w3-card">
                <h5>Bread Basket</h5>
                <p class="w3-text-grey">Assortment of fresh baked fruit breads and muffins 5.50</p><br>
                <?php
                    if ($gender == "Male"){
                        echo $calculatedOutputMale;
                    }
                ?>
            </div>

            <div id="Running" class="w3-container menu w3-padding-48 w3-card">
                <h5>Coffee</h5>
                <p class="w3-text-grey">Regular coffee 2.50</p><br>



            </div>

            <div id="Weightlifting" class="w3-container menu w3-padding-48 w3-card">
                <h5>Coffee</h5>
                <p class="w3-text-grey">Regular coffee 2.50</p><br>



            </div>

            <div id="Swimming" class="w3-container menu w3-padding-48 w3-card">
                <h5>Coffee</h5>
                <p class="w3-text-grey">Regular coffee 2.50</p><br>



            </div>

            <hr>
        </div>
    </div>

    <!-- Contact/Area Container -->
    <div class="w3-container" id="where" style="padding-bottom:32px;">
        <div class="w3-content" style="max-width:700px">
            <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">CREATE AN ACCOUNT</span></h5>
            <p>Find us at some address at some place.</p>
            <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>
            <p><strong>Reserve</strong> a table, ask for today's special or just send us a message:</p>
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
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<script>
    // Tabbed Menu
    function openResults(evt, resultSet) {
        var i, x, tablinks;
        x = document.getElementsByClassName("menu");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
        }
        document.getElementById(resultSet).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-dark-grey";
    }
    document.getElementById("myLink").click();
</script>

</body>
</html>
