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
        height: 70%;
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
</head>


<body>

<?php 
require_once('navmenu.php'); 

require_once('pageheader.php'); 
?>



<?php
require_once('connectvars.php');
require_once('appvars.php');

// Start the session
session_start();

// Clear the error message
$error_msg = "";

// If the user isn't logged in, try to log them in
if (!isset($_SESSION['hwId'])) {
    if (isset($_POST['submit'])) {
        // Connect to the database
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

        // Grab the user-entered log-in data
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];

        if (!empty($user_username) && !empty($user_password)) {

            // Look up the username and password in the database
            $stmt = $pdo->prepare("SELECT id, username FROM exercise_user WHERE username = '$user_username' AND password = SHA('$user_password')");
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                foreach ($stmt as $row){
                    $_SESSION['hwId'] = $row['id'];
                    $_SESSION['hwUsername'] = $row['username'];
                    setcookie('hwId', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                    setcookie('hwUsername', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/viewaccount.php';
                    header('Location: ' . $home_url);
                }
            }
            else {
                // The username/password are incorrect so set an error message
                $error_msg = 'Sorry, your username and/or password did not match any in our database.';

            }
        }
        else {
            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';

        }
    }
}
?>



            <?php
            echo '<div class="col-sm-6 offset-sm-3 center">';

            // If the session var is empty, show any error message and the log-in form; ELSE confirm the log-in
            if (empty($_SESSION['hwId'])) {
                echo '<p class="error">' . $error_msg . '</p>';
                ?>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <fieldset>
                        <legend>Log In</legend>
                        <label for="username">Username:</label>
                        <input id="username" class="w3-input w3-padding-8 w3-border" type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
                        <label for="password">Password:</label>
                        <input class="w3-input w3-padding-8 w3-border" type="password" name="password" />

                    </fieldset><br>
                    <input type="submit" value="Log In" name="submit" />
                </form>

                <?php
            }
            else {
                echo('<p class="login">You are logged in as ' . $_SESSION['hwUsername'] . '.</p>');
                echo "<p> Is this not you? If not, please <a href='logout.php'>log out</a>.";
            }
            ?>
        </div>
</body>
</html>
