<?php
$header = new pageheader();
$header->createPage();

class pageheader{
    public function __construct()
    {

    }

    public function createPage()
    {
    ?>
    <header class="bgimg w3-display-container w3-grayscale-min" id="home">
        <div class="w3-display-middle w3-center">
            <span id="titleheader" class="w3-text-white" style="font-size:90px">Health<br>Watch</span>
        </div>
    </header>

    <?php
    }
}