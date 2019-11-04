

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
