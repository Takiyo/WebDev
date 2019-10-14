<?php
$header = new header();
$header->createPage();

class header{
  public function __construct(){
  }

  public function createPage(){
    require_once('appvars.php');
    require_once('connectvars.php');
    require_once('navmenu.php');
    ?>


  <!doctype html>
  <html lang="en">
    <head>
      <title>Title</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <title>Mismatch - Where Opposites Attract!</title>

    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
  <h3>Mismatch - Where Opposites Attract!</h3>
  <?php
  
  }
}




