
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




/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    ?>
<script>window.alert("You aren't logged in! Redirecting back to log-in page.");</script>
    <?php
    header('Location: exampleone');
    exit;
}




if (isset($_POST['postSubmit'])){
    $userId = $_SESSION['user_id'];
    $content = !empty($_POST['postContent']) ? htmlspecialchars($_POST['postContent']) : "No post content";
    $date = date("Y-m-d");
    $title = !empty($_POST['postTitle']) ? htmlspecialchars($_POST['postTitle']) : "Untitled";

    $sql = "INSERT INTO posts (user_id, content, date, title) VALUES (:user_id, :content, :date, :title)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindValue(':user_id', $userId);
    $stmt->bindValue(':content', $content);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':title', $title);

    //echo '<h1>FLOW OF CONTROL HERE</h1><br>';
    //echo $userId . ' ' . $content . ' ' . $date . ' ' . $title;

    $result = $stmt->execute();
    //TODO takiyo: if result==true 'post successful' message
}


//TODO takiyo: KNOWN BUG - text areas have 8 blank spaces in them by default??? they didn't earlier though?????????????
?>
<div class="container">
    <form id="postform" action="<?php echo URL;?>home/homepage#postform" method="post">
        <textarea class="postInput" name="postTitle" placeholder="Title" style="width:350px; height:35px;resize:none;"></textarea>
        <br>
        <textarea class="postInput" name="postContent" placeholder="What's on your mind?" maxlength="5000" style="width:600px; min-height:125px; resize:none;"></textarea>
        <br>
        <input type="submit" value="Share" name="postSubmit"/>
    </form>
</div>
<div class="container">
    <?php

    $sql = "SELECT * FROM posts";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();
    //foreach ($stmt->fetch(PDO::FETCH_ASSOC) as $postRow){
   //     echo $postRow['user_id'];
   // }
    while ($postRow = $stmt->fetch(PDO::FETCH_ASSOC)){

        $sql = "SELECT * FROM users WHERE id = " . $postRow['user_id'];
        $ltmt = $pdo->prepare($sql);
        $ltmt->execute();
        $userLoop = $ltmt->fetch(PDO::FETCH_ASSOC);

        echo "<h5><strong>" . $userLoop['username'] . "</strong> shared a blog post.</h5>
        <p style='color:dimgrey;'>posted " . $postRow['date'] . "</p>
        <p>" . $postRow['content'] . "</p>";
    }


    ?>
</div>