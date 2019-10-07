<?php
  // If the user is logged in, delete the session vars to log them out
  session_start();
  if (isset($_COOKIE['gwAdminId'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_COOKIE = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
      setcookie('gwAdminId', '', time() - 3600);
      setcookie('gwAdminUN', '', time() - 3600);
      setcookie('gwAdminLoggedIn', '', time() - 3600);

    // Destroy the session
    session_destroy();
  }

  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url);
?>
