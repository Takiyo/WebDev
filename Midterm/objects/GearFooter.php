<!--
    Creates footer and closes html tag.
-->
<?php
$footer = new GearFooter();
$footer->createPage();
class GearFooter{
    public function __construct(){

    }

    public function createPage(){
        ?>
        </html>


        <?php


    }
}
