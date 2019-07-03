<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MINI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo URL;?>js/validation.js"></script>
</head>
<body>
    <!-- logo -->
    <div class="logo">
        Zuckerberg Memoirs
    </div>

    <!-- navigation -->
    <div class="navigation">
        <?php
        // REMINDER - Always start sesh elsewhere if header isn't included for whatever reason
        session_start();

        // If user is NOT logged in, home page becomes registration page.
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
            echo '<a href="' . URL . '">Register</a>';
            echo '<a href="' . URL . 'home/exampleone">Log In</a>';
        }
        else if(isset($_SESSION['logged_in'])){
            // Else it becomes protected home page.
        echo '<a href="'. URL . 'home/homepage">My Blog</a>';
        echo '<a href="' . URL . 'home/exampletwo">Log Out</a>';
        }

        ?>

        





    </div>
