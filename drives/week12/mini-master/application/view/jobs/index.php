<?php
/**
 * Created by PhpStorm.
 * User: Takiyo
 * Date: 11/24/2018
 * Time: 3:14 PM
 */?>
<head>
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <title>Risky Jobs - Submitted</title>
</head>



<h3>List of songs (data from first model)</h3>
<table class="jobtable">
    <thead style="background-color: #ddd; font-weight: bold;">
    <tr>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Job</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($jobs as $job) { ?>
        <tr>
            <td><?php if (isset($job->first_name)) echo htmlspecialchars($job->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($job->last_name)) echo htmlspecialchars($job->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($job->email)) echo htmlspecialchars($job->email, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($job->phone)) echo htmlspecialchars($job->phone, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($job->job)) echo htmlspecialchars($job->job, ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<a href="<?php echo URL ?>" class="button center"><h2>Register another applicant</h2></a>
