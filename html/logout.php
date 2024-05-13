<?php
session_start();
$_SESSION['loggedin'] = false;
$_SESSION['username'] = null;
$_SESSION['userID'] = null;
$_SESSION['fname'] = null;
$_SESSION['lname'] = null;
$_SESSION['adminID'] = null;
header("Location: loginPage.php");
exit();

?>