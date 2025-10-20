<?php session_start();
require("session.php");

$_SESSION['user'] = "";
$_SESSION['pass'] = "";
unset($_SESSION['user']);
unset($_SESSION['pass']);

echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=index.php\">";
exit();
?>