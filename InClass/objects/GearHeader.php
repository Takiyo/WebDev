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
        </head>
        <h2>Guilty Gear Character Opinion Survey</h2>
        <a href="ExistingTables.php">View Sumbmitted Surveys</a> - <a href="login.php">Log In</a></br></br>

        <?php
    }
}
