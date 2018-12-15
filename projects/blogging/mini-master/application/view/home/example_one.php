<div class="container">
    <?php



    $pdoOptions = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );


    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, //DSN
        DB_USER, //Username
        DB_PASS, //Password
        $pdoOptions //Options
    );

    if(isset($_POST['login'])){

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false){
    //TODO takiyo: handle failed username better. possibly display:hidden->display:block an error div
    die('Incorrect username / password combination!');
    } else{

    $validPassword = password_verify($passwordAttempt, $user['password']);

    if($validPassword){

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['logged_in'] = time();

    header('Location: homepage');
    exit;

    } else{
        //TODO takiyo: here too
        //$validPassword was FALSE. Passwords do not match.
        die('Incorrect username / password combination!');
    }
    }

    }

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
    <h1>Login</h1>
    <form action="<?php echo URL;?>home/exampleone" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password</label>
        <input type="text" id="password" name="password"><br>
        <input type="submit" name="login" value="Login">
    </form>
    </body>
    </html></div>
