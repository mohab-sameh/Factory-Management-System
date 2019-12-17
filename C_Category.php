<?php
include('M_Category.php');
include('M_SubCategory.php');
include_once('V_Category.php');

$db = DB::getInstance();
$con = $db->get_Connecion();





$cid=intval($_GET['cid']);
if(isset($_GET['action']) && $_GET['action']=="add")
{
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id]))
	{
		$_SESSION['cart'][$id]['quantity']++;
	}
	else
	{
		$sql=mysqli_query($con,"select id,subcategory  from subcategory where categoryid='$cid'");

		/*
		$allCategories= Category::getCategoryWithID($id);
		if(count($allCategories)!=0)
		{
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:V_MyCart.php');
		}
		else
		{
			$message="Product ID is invalid";
		}*/
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:V_MyCart.php');
		}else{
			$message="Product ID is invalid";
		}

	}
}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" )
{
	if(strlen($_SESSION['login'])==0)
    {
			header('location:V_Login.php');
		}
else
{
	// lesa yet to be turned into OOP code... El Wishlist Low Priority
	// (might be left procedural) w momkn nsibo zay mahowa law mafish wa2t
	mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
	echo "<script>alert('Product aaded in wishlist');</script>";
	header('location:V_MyWishlist.php');
	}
}






?>
