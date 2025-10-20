<?php
//DATABASE CONNECT
$server = "localhost";
$db = "demo";
$user = "root";
$pass = "";
$port = "3306";
$dbcon = mysqli_connect($server, $user, $pass, $db, $port);
if($dbcon->connect_errno) { echo "Failed to connect to MySQLi: (".$dbcon->connect_errno.") ".$dbcon->connect_error; die(); }

function fnRowID($tbl) {
	global $db, $dbcon;
	$rowID = $maxID = $countID = 0;
	$sql = "select MAX(sl), COUNT(sl) from `$db`.`$tbl`;";		$r = mysqli_query($dbcon, $sql) or die($sql);
	while($row = mysqli_fetch_array($r, MYSQLI_BOTH)) { $maxID = $row[0]; $countID =$row[1]; if($maxID>=$countID) { $rowID = $maxID+1; } else { $rowID = $countID+1; } }
	return $rowID;
}
