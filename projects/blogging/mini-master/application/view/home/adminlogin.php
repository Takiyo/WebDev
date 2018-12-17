<div class="container">
    <?php
    //ADMIN LOGIN


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

        $sql = "SELECT id, username, password, is_admin FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $username);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user === false){
            header('Location: phpvalidationfailed');
        } else{

            $validPassword = password_verify($passwordAttempt, $user['password']);


            if($validPassword && $user['is_admin'] == 1){

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = time();

                header('Location: homepage');
                exit;

            } else{
                header('Location: phpvalidationfailed');

            }
        }

    }

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
    </head>
    <body>
    <h1>Admin Login</h1>
    <div class="formcontainer" style="width:500px;clear:both;">
    <form action="<?php echo URL;?>home/exampleone" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    </div>
    </body>
    </html></div>
