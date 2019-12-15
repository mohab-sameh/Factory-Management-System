<?php
session_start();
error_reporting(0);

require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion();

if(strlen($_SESSION['login'])==0)
    {
header('location:index.php');
}
else{
// Code forProduct deletion from  wishlist
$wid=intval($_GET['del']);
if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
}


if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"delete from wishlist where productId='$id'");
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
header('location:V_MyWishlist.php');
}
		else{
			$message="Product ID is invalid";
		}
	}
}
}

?>
