<!DOCTYPE html>
<html>
<title>Mad Libs</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
    body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32">
        <h1><b>Mad <span class="w3-tag">Libs</span></b></h1>

    </header>

    <!-- Grid -->
    <div class="w3-row">

        <!-- Blog entries -->
        <div class="w3-col l8 s12">
            <!-- Blog entry -->
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h3><b>Don't know how to play Mad-Libs?</b></h3>
                </div>

                <div class="w3-container">

                    <p>Mad libs are a simple game where you create a story template with blanks for words. You, or another player, then construct a list of words and place them into the story, creating an often silly or funny story as a result.</p>




                    <div class="w3-row">
                        <div class="w3-col m8 s12">
                        </div>
                        <div class="w3-col m4 w3-hide-small">
                        </div>
                    </div>
                </div>
            </div>
            <hr>

        </div>

        <!-- Introduction menu -->
        <div class="w3-col l8">
            <!-- About Card -->
            <div class="w3-card w3-margin">
                <div class="w3-container w3-white">
                    <!--<h4><b>Stories:</b></h4>-->


                    <?php
                    require_once('connectvars.php');



                    $output_form = 'no';
                    $story_exists = false;

                    if (isset($_POST['submit'])) {


                        $noun = $_POST['noun'];
                        $verb = $_POST['verb'];
                        $adjective = $_POST['adjective'];
                        $adverb = $_POST['adverb'];


                        if (empty($noun) || empty($verb) || empty($adjective)
                            || empty($adverb)) {
                            echo '<h2 style="color:red; border:1px dotted black; width:35%;">Please fill out the entire form.</h2></br>';
                            $output_form = 'yes';
                        }
                    }

                    else {
                        $output_form = 'yes';
                    }

                    // Test Connection Credentials
                    if (!empty($noun) || !empty($verb) || !empty($adjective) || !empty($adverb)) {
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
                        $stmt = $pdo->prepare('INSERT INTO madlibstable (noun, verb, adjective, adverb) VALUES (?,?,?,?)');
                        $stmt->execute([$noun, $verb, $adjective, $adverb]);

                        // Get & display data back from database
                        $stmt = $pdo->query('SELECT * FROM madlibstable');
                        $stmt->execute();

                        $story_exists = true;
                        echo "<h3>Existing Stories:</h3>";

                        //$reverse_stmt = array_reverse($stmt);

                        //foreach ($reverse_stmt as $row)
                        foreach($stmt as $row)
                        {
                            echo "<p>When I was just a <span class=\"w3-tag\">" . $row['adjective'] . "</span> " .
                                "lad, I decided to venture out in to the forest. Much to my dismay, I found a <span class=\"w3-tag\">" . $row['noun'] . "</span> " .
                                "in my path. I had never seen one before. I promptly shouted out 'Hey <span class=\"w3-tag\">" . $row['noun'] . "</span>! " .
                                "If you don't <span class=\"w3-tag\">" . $row['adverb'] . "</span> get out of my way, I'll have to... I don't know... <span class=\"w3-tag\">" . $row['verb'] .
                                "</span> you? Hopefully that works.</p><br><br><br><br>";

                        }

                    }





                    if ($story_exists) {
                        echo "<h4 id='focushere'>Input another!</h4>";
                        }
                        if (true){
                            ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'] . "#focushere" ?>" method="post" enctype="multipart/form-data">
                            <legend>Enter a noun:</legend>
                            <input type="text" name="noun"/><br><br>
                            <legend>Enter a verb:</legend>
                            <input type="text" name="verb"/><br><br>
                            <legend>Enter an adjective:</legend>
                            <input type="text" name="adjective"/><br><br>
                            <legend>Enter an adverb:</legend>
                            <input type="text" name="adverb"/><br><br>


                            <input type="submit" value="Generate Story" name="submit" style="margin-bottom:50px"/>

                        </form>
                        <?php
                    }
                    ?>






                </div>
            </div><hr>
            <hr>

            <!-- Labels / tags -->
            <div class="w3-card w3-margin" style="position:absolute; float:right; width=20%;">
                <div class="w3-container w3-padding">
                    <h4>Need Word Suggestions? Try:</h4>
                </div>
                <div class="w3-container w3-white">
                    <p>
                        <span class="w3-tag w3-black w3-margin-bottom">neat</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">huge</span>
                        <span class="w3-tag w3-black w3-margin-bottom">undulate</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">gravitate</span>
                        <span class="w3-tag w3-black w3-margin-bottom">otter</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">boy</span>
                        <span class="w3-tag w3-black w3-margin-bottom">purplish-black</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">electrifying</span>
                        <span class="w3-tag w3-black w3-margin-bottom">bottle</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">grotesque</span>
                        <span class="w3-tag w3-black w3-margin-bottom">cry</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">tipsy</span>
                        <span class="w3-tag w3-black w3-margin-bottom">gone</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">hot minute</span>

                    </p>
                </div>
            </div>

            <!-- END Introduction Menu -->
        </div>

        <!-- END GRID -->
    </div><br>

    <!-- END w3-content -->
</div>

</footer>

</body>
</html>
