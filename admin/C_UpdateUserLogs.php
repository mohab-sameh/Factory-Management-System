<?php
session_start();

include('../M_UserLog.php');


if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
	$userlogs = Userlog::getAllUserLogs();
}
?>
