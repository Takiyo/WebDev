<div class="container">
<?php



$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, //DSN
    DB_USER, //Username
    DB_PASS, //Password
    $pdoOptions //Options
);

if(isset($_POST['register'])){

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $pass2 = !empty($_POST['password2']) ? trim($_POST['password2']) : null;


    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //TODO takiyo: handle if username already exists in a better way
    if($row['num'] > 0){
        die('That username already exists!');
    } else if($pass != $pass2){
        echo '<script type="text/javascript">',
             'comparePasswords();',
             '</script>';
    }

    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);

    $result = $stmt->execute();

    if($result){
        echo 'Thank you for registering with our website. Log in 
              <a href="' . URL . 'home/exmapleone"><strong>here!</strong></a>';
       // header('location: ' . URL . 'home/exampleone');

    }

}
//TODO takiyo: more js validation
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<div class="formcontainer" style="width:500px;clear:both;">
    <form onsubmit="" action="<?php echo URL;?>"  method="post">
        <div id="passError" style="color:red; background-color:lightgoldenrodyellow; text-align:center; display:none;">
            Please make sure your passwords are the same!</div>
        <div id="usernameSpecialError" style="color:red; background-color:lightgoldenrodyellow; text-align:center; display:none;">
            Please make sure you have no special characters in your username!</div>
        <label for="username"">Username</label>
        <input type="text" id="username" name="username" required onblur="return validateUsername();"><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>
        <label for="password2">Re-type Password</label>
        <input type="password" id="password2" name="password2" onblur="return comparePasswords()"required><br><br>
        <input type="submit" name="register" value="Register"></button>
    </form>
</div>
<br>
<p>Already registered? Log in <a href="<?php echo URL;?>home/exampleone"><strong>here.</strong></p>
</body>
</html>

</div>