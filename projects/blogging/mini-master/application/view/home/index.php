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

    //TODO takiyo: Error checking (username characters, password length, etc).

    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //TODO takiyo: handle if username already exists in a better way
    if($row['num'] > 0){
        die('That username already exists!');
    }

    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);

    $result = $stmt->execute();

    if($result){
        //TODO takiyo: link to login page once created OR log them in
        echo 'Thank you for registering with our website.';
    }

}
//TODO takiyo: have 2 password inputs and compare them via js
//TODO takiyo: js validation
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<form action="<?php echo URL;?>" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password</label>
    <input type="text" id="password" name="password" required><br>
    <input type="submit" name="register" value="Register"></button>
</form>
<br>
<p>Already registered? Log in <a href="<?php echo URL;?>home/exampleone"><strong>here.</strong></p>
</body>
</html>

</div>