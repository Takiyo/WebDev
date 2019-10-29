<?php
$nav = new navmenu();
$nav->createPage();

class navmenu{
    public function __construct()
    {

    }

    public function createPage()
    {
        ?>
        <div class="w3-top">
            <div class="w3-row w3-padding w3-black">
                <div class="w3-col s4">
                    <a href="index.php" class="w3-button w3-block w3-black">HOME</a>
                </div>
                <?php
                if (isset($_COOKIE['hwUsername']))
                {
                echo '<div class="w3-col s4"><a href="viewaccount.php" class="w3-button w3-block w3-black">ACCOUNT</a></div>';
                echo '<div class="w3-col s4"><a href="logout.php" class="w3-button w3-block w3-black">LOG OUT(' . $_COOKIE['hwUsername'] . ')</a></div>';
                }
                else
                {
                echo '<div class="w3-col s4">
                <a href="signup.php" class="w3-button w3-block w3-black">SIGN UP</a>
                </div>
                <div class="w3-col s4">
                    <a href="login.php" class="w3-button w3-block w3-black">LOG IN</a>
                </div>';
                }
                ?>
            </div>
        </div>
        <?php
    }
}