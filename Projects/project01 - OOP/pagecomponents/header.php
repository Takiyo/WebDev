

<?php
$component = new header();
$component->createPage();
class header{
    public function __construct()
    {
    }

    public function createPage()
    {
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <title>Mad Libs</title>
        
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" href="css/generalstyles.css">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="functions/generalvalidation.js"></script>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>

        <style>
            body, h1, h2, h3, h4, h5 {
                font-family: "Raleway", sans-serif
            }
        </style>
        <?php
        require_once('functions/connectvars.php');
        require_once('functions/generalfunctions.php');
        include_once('objects/Story.php');

    }
}
