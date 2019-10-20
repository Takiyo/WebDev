<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">


<?php
if (isset($_SESSION['username'])) {
  echo '<a class="nav-item nav-link" href="viewprofile.php">View Profile</a>';
  echo '<a class="nav-item nav-link" href="editprofile.php">Edit Profile</a>';
  echo '<a class="nav-item nav-link" href="logout.php"> Log Out (' . $_SESSION['username'] . ')</a>';

}
else {
  echo '<a class="nav-item nav-link" href="login.php">Log In</a> ';
  echo '<a class="nav-item nav-link" href="signup.php">Sign Up</a>';
}
echo '<hr />';
?>

</div>
  </div>
</nav>
