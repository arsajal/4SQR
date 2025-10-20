<?php
if(isset($_SESSION['user']) && $_SESSION['user']<>"" && isset($_SESSION['pass']) && $_SESSION['pass']<>"") { $u = $_SESSION['user']; }
else { echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=index.php\">"; exit(); }
?>
