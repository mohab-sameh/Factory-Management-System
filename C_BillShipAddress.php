<?php
session_start();
//error_reporting(0);
require_once 'DB.php';
include('M_User.php');
$db = DB::getInstance();
$con = $db->get_Connecion();
if(strlen($_SESSION['login'])==0)
    {
header('location:index.php');
}
else{
	// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query= User::UpdateBilling($baddress,$bstate,$bpincode,$_SESSION['id']);
    	if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query= User::UpdateShippingAddress($address,$sstate,$city,$spincode,$_SESSION['id']);
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
		}
	}
}

?>
