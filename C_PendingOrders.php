<?php
session_start();
error_reporting(0);
require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion()
if(strlen($_SESSION['login'])==0)
    {
header('location:login.php');
}
else{
	if (isset($_GET['id'])) {

		mysqli_query($con,"delete from orders  where userId='".$_SESSION['id']."' and paymentMethod is null and id='".$_GET['id']."' ");
		;

	}
}
?>
