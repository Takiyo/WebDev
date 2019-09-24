<!DOCTYPE html>
<html lang="en" >
<head>

  <meta content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Make Me Elvis - Add Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
  <div class="row" style="height:100%">
    <div class="col-sm-4 outercols">
        <img src="blankface.png"  alt="" style="float:right;transform:scaleX(-1);max-width:70%;height:auto" />
    </div>

      <div class="col-sm-4" id="innercol">
        <h1 class="p-2">ADD ME TO THE LIST!</h1>
        <p class="p-2" style="width:80%;">Enter your first name, last name, and email to be added to the <strong>Make Me Elvis</strong> mailing list.</p>
        
        <?php
        require_once('connectvars.php');
        $host = DB_HOST;
        $db = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASSWORD;
        $charset = 'utf8mb4';
        $dbc = mysqli_connect($host, $user, $pass, $db)
          or die('Error connecting to MySQL server.');
      
        if (isset($_POST['submit'])) {
          $first_name = $_POST['firstname'];
          $last_name = $_POST['lastname'];
          $email = $_POST['email'];
          $output_form1 = 'yes';

          if (empty($first_name) || empty($last_name) || empty($email)) {
            // We know at least one of the input fields is blank 
            echo 'Please fill out all of the email information.<br />';
            $output_form1 = 'yes';
          }
        }
        else {
          $output_form1 = 'yes';
        }

        if (!empty($first_name) && !empty($last_name) && !empty($email)) {

          $query = "INSERT INTO email_list (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";
          mysqli_query($dbc, $query)
            or die ('Data not inserted.');

            echo '<h3 style="background-color:green; text-align:center;" ><p>Added to the list!</p></h3>';

          //mysqli_close($dbc);
        }

        if ($output_form1 == 'yes') {
          ?>

          <div class="input-group">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <label for="firstname">First name:</label>
              <input type="text" id="firstname" name="firstname" class="form-control" required/><br />
              <label for="lastname">Last name:</label>
              <input type="text" id="lastname" name="lastname" class="form-control" required/><br />
              <label for="email">Email:</label>
              <input type="text" id="email" name="email" class="form-control" required/><br />
              <input type="submit" name="submit" value="Submit" class="form-control submit"/>            
            </form>
          </div>

        <?php
        }
        ?>

        <hr>

        <!-- <div class="row-sm-4 p-5">    
        </div> -->
        
        <h2 clas="p-2">Remove me from the list</h2>
        <p class="p-2">Please select the email addresses to delete from the email list and click Remove.</p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <?php
          // Delete the customer rows (only if the form has been submitted)
        if (isset($_POST['submit2'])) {
          foreach ($_POST['todelete'] as $delete_id) {
            $query = "DELETE FROM email_list WHERE id = $delete_id";
            mysqli_query($dbc, $query)
              or die('Error querying database.');
          } 

          echo '<h3 style="background-color:red; text-align:center;"><p>Removed from the list.</p></h3>';

      }
      $query2 = "SELECT * FROM email_list";
      $result2 = mysqli_query($dbc, $query2);
      while ($row = mysqli_fetch_array($result2)) {
        echo '<input type="checkbox" value="' . $row['id'] . '" name="todelete[]" />';
        echo $row['first_name'];
        echo ' ' . $row['last_name'];
        echo ' ' . $row['email'];
        echo '<br />';
      }
      //mysqli_close($dbc);
        ?>


        <!-- <div class="input-group">
            <form method="post" action="removeemail.php">
              <label for="email">Email address:</label><br />
              <input id="email" name="email" type="text" size="30" class="form-control"/><br />
              <input type="submit" name="Remove" value="Remove" class="form-control"/>
            </form>
          </div> -->
          <input type="submit" name="submit2" value="Remove" class="form-control submit"/>
      </form>
    </div>
    <div class="col-sm-4 outercols">
        <img src="blankface.png"  alt="" style="float:left;max-width:70%;height:auto" />
    </div>
  </div>
</body>
</html>
