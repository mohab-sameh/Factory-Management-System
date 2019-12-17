<?php
include_once('V_SubCategory.php');
include_once('V_Category.php');
include('M_SubCategory.php');
include('M_Category.php');

$db = DB::getInstance();
$con = $db->get_Connecion();


$cid=intval($_GET['scid']);



if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:my-cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" )
{
	if(strlen($_SESSION['login'])==0)
    {
			header('location:V_Login.php');
}
else
{

	// same for this wishlist code.. haneb2a n7awlo OOP bas Low Priority
	mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
	echo "<script>alert('Product aaded in wishlist');</script>";
	header('location:V_MyWishlist.php');

}
}

?>
