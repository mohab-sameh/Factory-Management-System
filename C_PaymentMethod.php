<?php

session_start();
error_reporting(0);
require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion();

if(strlen($_SESSION['login'])==0)
    {
header('location:login.php');
}
else{
	if (isset($_POST['submit'])) {

		mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
		unset($_SESSION['cart']);
		header('location:order-history.php');

	}
}
?>
