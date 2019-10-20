<?php
$page = new ExistingTables();
$page->createPage();
class ExistingTables{
    public function __construct(){

    }

    public function createPage(){
        ?>


    
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
        <h2>ARCREVO 2019 Entrants!</h2>
        <p>Select one competitor and hit 'Display' to see their details, or 'Delete' to delete!</p>


        <?php

        error_reporting(0);
        ini_set('display_errors', 0);

        // set connectvars
        $host = DB_HOST;
        $db = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASSWORD;
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        // Establish connection
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        if (isset($_POST['displayBTN']) && isset($_POST['checked_values'])) {
            echo '<table style="width:100%" border="1px solid;">
            <tr>
                <th>Competitor ID</th>
                <th>Tag </th>
                <th>First Name</th>
                <th>Start Date</th>
                <th>Expected Seed</th>      
                <th>Competitor</th>      
                <th>Volunteer</th>      
            </tr>';

            // Displays Selected Values
            foreach ($_POST['checked_values'] as $checked_id)
            {

            $stmt = $pdo->prepare("SELECT playerId, tag, firstName, startDate, seedExpectation, isCompeting, isVolunteer
                FROM ggplayers WHERE playerId = $checked_id");

                $stmt->execute();

               foreach ($stmt as $row){
                   // Format as readable data
                    if ($row['isCompeting'] == 0){
                        $row['isCompeting'] = "No";
                    }
                    else{
                        $row['isCompeting'] = "Yes";
                    }
                    if ($row['isVolunteer'] == 0){
                        $row['isVolunteer'] = "No";
                    }
                    else{
                        $row['isVolunteer'] = "Yes";
                    }
                    echo '<tr><td>' . $row['playerId'] . '</td><td>'
                    . $row['tag'] . '</td><td>'
                    . $row['firstName'] . '</td><td>'
                    . $row['startDate'] . '</td><td>'
                    . $row['seedExpectation'] . '</td><td>'
                    . $row['isCompeting'] . '</td><td>'
                    . $row['isVolunteer'] . '</td></tr>';
                    }
                    echo '</table>';
            }
        }

            // Deletes Selected Values
        foreach ($_POST['checked_values'] as $checked_id) {

            if (isset($_POST['deleteBTN']) && isset($_POST['checked_values'])) {
                $stmt = $pdo->prepare("DELETE FROM ggplayers WHERE playerId = $checked_id");
                $stmt->execute();
                echo '<h4 class="error">Competitor ' . $checked_id . ' deleted.</h4>';
            }
        }

        $stmt = $pdo->prepare('SELECT playerId, tag FROM ggplayers');
        $stmt->execute();

            foreach ($stmt as $row)
            {
                echo '<input type="checkbox" value="' . $row['playerId']
                    . '" name="checked_values[]">' . $row['playerId'] . '</input> ' . $row['tag'] . '<br>';
            }
            ?>

        <input name="displayBTN" type="submit" value="Display">
        <input name="deleteBTN" type="submit" value="Delete">
    </form>
    </div>
    <div class="col-sm">
        </div>
            <?php
        }
}