<!--<div class="container">
    <h2>You are in the View: application/view/home/index.php (everything in the box comes from this file)</h2>
    <p>In a real application this could be the homepage.</p>
</div> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Risky Jobs - Registration</title>
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
<img src="<?php echo URL; ?>img/cell_tower_climber.jpg" alt="Risky Jobs" class="bgimg"/>
<div class="center" id="regiform">
<h2>Registration</h2>

<?php
if (isset($_POST['submit_add_job'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $resume = $_POST['resume'];
    $output_form = 'no'; // depreciated





    if (empty($first_name)) {
        // $first_name is blank
        echo '<p class="error">You forgot to enter your first name.</p>';
        $output_form = 'yes';
    }

    if (empty($last_name)) {
        // $last_name is blank
        echo '<p class="error">You forgot to enter your last name.</p>';
        $output_form = 'yes';
    }

    if (!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', $email)) {
        // $email is invalid because LocalName is bad
        echo '<p class="error">Your email address is invalid.</p>';
        $output_form = 'yes';
    }
    else {
        // Strip out everything but the domain from the email
        $domain = preg_replace('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', '', $email);
        // Now check if $domain is registered
        if (!checkdnsrr($domain)) {
            echo '<p class="error">Your email address is invalid.</p>';
            $output_form = 'yes';
        }
    }

    if (!preg_match('/^\(?[2-9]\d{2}\)?[-\s]\d{3}-\d{4}$/', $phone)) {
        // $phone is not valid
        echo '<p class="error">Your phone number is invalid.</p>';
        $output_form = 'yes';
    }

    if (empty($job)) {
        // $job is blank
        echo '<p class="error">You forgot to enter your desired job.</p>';
        $output_form = 'yes';
    }

    if (empty($resume)) {
        // $resume is blank
        echo '<p class="error">You forgot to enter your resume.</p>';
        $output_form = 'yes';
    }
}
else {
    $output_form = 'yes';
}

if (true) {
    ?>

    <form method="post" action="<?php echo URL; ?>jobs/addjob">
        <p>Register with Risky Jobs, and post your resume.</p>
        <table class="center">
            <tr>
                <td><label for="firstname">First Name:</label></td>
                <td><input id="firstname" name="firstname" type="text" required value="<?php if (isset($first_name)){echo $first_name;} ?>"/></td></tr>
            <tr>
                <td><label for="lastname">Last Name:</label></td>
                <td><input id="lastname" name="lastname" type="text" required value="<?php if (isset($last_name)){echo $last_name;} ?>"/></td></tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input id="email" name="email" type="text" required value="<?php if (isset($email)){echo $email;} ?>"/></td></tr>
            <tr>
                <td><label for="phone">Phone:</label></td>
                <td><input id="phone" name="phone" type="text" required value="<?php if (isset($phone)){echo $phone;} ?>"/></td></tr>
            <tr>
                <td><label for="job">Desired Job:</label></td>
                <td><input id="job" name="job" type="text" value="<?php if (isset($job)){echo $job;} ?>"/></td>
            </tr>
        </table>
        <p>
            <label for="resume">Paste your resume here:</label><br />
            <textarea id="resume" name="resume" rows="4" cols="40"><?php  if (isset($resume)){echo $resume;} ?></textarea><br />
            <input type="submit" name="submit_add_job" value="Submit" />
        </p>
    </form>



    <?php
}



?>
</div>
</body>
</html>

