<!--
// Creates start of html file, put metadata and links here
// Leaves html tag OPEN
-->


<?php
$header = new GearHeader();
$header->createPage();
class GearHeader{
    public function __construct(){

    }

    public function createPage(){
        //includes necessary links
        require_once('functions/connectvars.php');
        require_once('functions/appvars.php');
        require_once('functions/generalfunctions.php');
        //include_once(otherclasses);
        ?>
        
        <!doctype html>
        <html lang="en">
        <head>
            <title>Guilty Gear Character Quiz</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styles.css">
        </head>
        <?php   session_start(); ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link" href="competitors.php">Existing Competitors</a>
    <?php
    if (isset($_SESSION['username'])){
        echo '<a class="nav-item nav-link" href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
    }
    else{
        echo '<a class="nav-item nav-link" href="login.php">Login</a>';
    }
    ?>
    </div>
  </div>
</nav>

        <?php
    }
}
