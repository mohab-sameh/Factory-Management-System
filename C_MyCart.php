<?php

session_start();
error_reporting(0);

#require_once 'M_Products.php';
#require_once 'V_MyCart.php';


include('M_User.php');
$db = DB::getInstance();
$con = $db->get_Connecion();



$user = User::GetWithID($_SESSION['id']);

if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Your Cart hasbeen Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){

				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit']))
{

if(strlen($_SESSION['login'])==0)
    {
header('location:V_Login.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);


		foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
header('location:V_PaymentMethod.php');
}
}
}






?>
