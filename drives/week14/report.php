<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aliens Abducted Me - Report an Abduction</title>
    <link rel="stylesheet" type="text/css" href="style.css" />  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <div class="row">
    <div class="col-sm">   
    </div>
    <div class="col-sm"> 

<body style="background-color:black;">
<div class="card text-white bg-success mb-0" style="max-width: 35rem; margin-bottom: 3em; padding:1em;">  

  <h2>Aliens Abducted Me - Report an Abduction</h2>

<?php
  error_reporting(0);
  require_once('connectvars.php');

  if (isset($_POST['submit'])) {
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Grab the report data from the POST
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $when_it_happened = mysqli_real_escape_string($dbc, trim($_POST['whenithappened']));
    $how_long = mysqli_real_escape_string($dbc, trim($_POST['howlong']));
    $how_many = mysqli_real_escape_string($dbc, trim($_POST['howmany']));
    $alien_description = mysqli_real_escape_string($dbc, trim($_POST['aliendescription']));
    $what_they_did = mysqli_real_escape_string($dbc, trim($_POST['whattheydid']));
    $fang_spotted = mysqli_real_escape_string($dbc, trim($_POST['fangspotted']));
    $other = mysqli_real_escape_string($dbc, trim($_POST['other']));

    if (!empty($first_name) && !empty($last_name) && !empty($when_it_happened) && !empty($how_long) && !empty($what_they_did)) {
      // Write the data to the database
      $query = "INSERT INTO aliens_abduction (first_name, last_name, email, when_it_happened, how_long, how_many, alien_description, what_they_did, fang_spotted, other) " .
        "VALUES ('$first_name', '$last_name', '$email', '$when_it_happened', '$how_long', '$how_many', '$alien_description', '$what_they_did', '$fang_spotted', '$other')";
      mysqli_query($dbc, $query);

      // Confirm success with the user
      echo '<p>Thanks for adding your abduction.</p>';
      echo '<p><a href="index.php">&lt;&lt; Back to the home page</a></p>';

      mysqli_close($dbc);
      exit();
    }
    else {
      echo '<p class="error">Please enter your full name, date of abduction, how long you were abducted, and a brief description of the aliens.</p>';
    }
  }
?>

  <p>Share your story of alien abduction:</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="firstname">First name:</label>
    <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>" required/> <br />
    <label for="lastname">Last name:</label>
    <input type="text" id="lastname" name="lastname" value="<?php if (!empty($first_name)) echo $last_name; ?>" required/><br />
    <label for="email">What is your email address?</label>
    <input type="email" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" required/><br />
    <label for="whenithappened">When did it happen?</label>
    <input type="date" id="whenithappened" name="whenithappened" value="<?php if (!empty($when_it_happened)) echo $when_it_happened; else echo 'YYYY-MM-DD'; ?>"required /><br />
    <label for="howlong">How long were you gone? (days)</label>
    <input type="number" step="1" min="0" max="99999" id="howlong" name="howlong" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php if (!empty($how_long)) echo $how_long; ?>" required/><br />
    <label for="howmany">How many did you see?</label>
    <input type="number" step="1" min="0"  max="99999" id="howmany" name="howmany" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php if (!empty($how_many)) echo $how_many; ?>" required/><br />
    <label for="aliendescription">Describe them:</label>
    <textarea rows="4" cols='50' id="aliendescription" name="aliendescription" size="32" required><?php if (!empty($alien_description)) echo $alien_description; ?></textarea><br />
    <label for="whattheydid">What did they do to you?</label>
    <textarea rows="4" cols='50' type="text" id="whattheydid" name="whattheydid" size="32" required></textarea><?php if (!empty($what_they_did)) echo $what_they_did; ?><br />
    <label for="fangspotted">Have you seen my dog Fang?</label>
    Yes <input id="fangspotted" name="fangspotted" type="radio" value="yes" <?php echo ($fang_spotted == 'yes' ? 'checked="checked"' : ''); ?> />
    No <input id="fangspotted" name="fangspotted" type="radio" value="no"  <?php echo ($fang_spotted == 'no' ? 'checked="checked"' : ''); ?> /><br />
    <img src="fang.png" width="80%" height="auto;" alt="My abducted dog Fang." /><br />
    <label for="other">Anything else you want to add?</label>
    <textarea id="other" name="other"><?php if (!empty($other)) echo $other; ?></textarea><br />
    <input type="submit" value="Report Abduction" name="submit" />
  </form>
</div>
<br><br>
</div>

    <div class="col-sm">   </div>

</div>
</body>
</html>
