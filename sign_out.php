<?php
session_start();

// Clear all the session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to Sign In
echo "<script LANGUAGE='JavaScript'>
          window.alert('Signing Out');
          window.location.href='index.php';
       </script>";

exit;
?>