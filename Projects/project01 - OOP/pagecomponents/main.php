
<?php
$component = new main();
$component->createPage();
class main{
    public function __construct()
    {
    }

    public function createPage()
    {

?>



<body class="w3-light-grey">

<div class="row">
<div class="col-sm">
        </div>
<div class="w3-content" style="max-width:1400px">

    <!-- Header -->
    <header class="w3-container w3-padding-32">
        <h1><b>Mad <span class="w3-tag">Libs</span></b><b>Mad <span class="w3-tag">Libs</span></b><b>Mad <span class="w3-tag">Libs</span></b><b>Mad <span class="w3-tag">Libs</span></b><b>Mad <span class="w3-tag">Libs</span></b></h1>
    </header>

    <!-- Grid -->
    


        <div class="w3-col l8 s12">
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h3><b>Don't know how to play Mad-Libs?</b></h3>
                    <p>Mad libs are a simple game where you create a story template with blanks for words. You, or
                        another player, then construct a list of words and place them into the story, creating an often
                        silly or funny story as a result.</p>


                </div>

                <div class="w3-container">



                </div>
            </div>


        </div>

        <div class="w3-col l8">
            <div class="w3-card w3-margin">
                <div class="w3-container w3-white">


                    <?php
                    $output_form = 'no';
                    $story_exists = false;

                    if (isset($_POST['submit'])) {

                        // Set the story object with form inputs
                        $story = new Story($_POST['noun'], $_POST['verb'], $_POST['adjective'], $_POST['adverb']);

                        if (empty($story->noun) || empty($story->verb) || empty($story->adjective)
                            || empty($story->adverb)) {
                            echo '<h2 style="color:red; border:1px dotted black; width:35%;">Please fill out the entire form.</h2></br>';
                            $output_form = 'yes';
                        }
                    } else {
                        $output_form = 'yes';
                    }

                    // Test Connection Credentials
                    if (!empty($story->noun) || !empty($story->verb) || !empty($story->adjective) || !empty($story->adverb)) {
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


                        // Insert form data into database
                        $stmt = $pdo->prepare('INSERT INTO madlibstable (noun, verb, adjective, adverb) VALUES (?,?,?,?)');
                        $stmt->execute([$story->noun, $story->verb, $story->adjective, $story->adverb]);

                        // Get & display data back from database
                        $stmt = $pdo->query('SELECT * FROM madlibstable');
                        $stmt->execute();

                        $story_exists = true;

                        // Echoes story list oldest to newest
                        echo "<h3>Existing Stories:</h3>";
                        echoStoryList($stmt);


                        $stmt = $pdo->query('SELECT * FROM madlibstable');
                        $stmt->execute();

                        // $stmt->debugDumpParams();
                        echo '<br>';
                        echoStoryTable(createStoryArray($stmt));

                        // echoStoryTable(createStoryArray($stmt));
                    }


                    if ($story_exists) {
                        echo "<h4 id='focushere'>Input another!</h4>";
                    }
                    if (true) {
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'] . "#focushere" ?>" method="post"
                              enctype="multipart/form-data">
                            <legend>Enter a noun:</legend>
                            <input type="text" name="noun" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"/><br><br>
                            <legend>Enter a verb:</legend>
                            <input type="text" name="verb" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"/><br><br>
                            <legend>Enter an adjective:</legend>
                            <input type="text" name="adjective" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"/><br><br>
                            <legend>Enter an adverb:</legend>
                            <input type="text" name="adverb" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"/><br><br>


                            <input type="submit" value="Generate Story" name="submit" style="margin-bottom:50px"/>

                        </form>
                        <?php
                    }

                    ?>


                </div>
            </div>

            <?php require_once('pagecomponents/footer.php');?>

        </div>

        <!-- END GRID -->
        <div class="col-sm">
        </div>
    </div>
    <br>

    <!-- END w3-content -->
</div>


</body>

<?php }
}
?>
</html>
