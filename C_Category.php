<?php
session_start();
error_reporting(0);
require_once 'DB.php';
include('M_Category.php');
$db = DB::getInstance();
$con = $db->get_Connecion();
$category = new Category();


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$description=$_POST['description'];
$sql=mysqli_query($con,"insert into category(categoryName,categoryDescription) values('$category','$description')");
$_SESSION['msg']="Category Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
		  }


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
		$sql_p= Category::getCategoryWithID($id);
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0)
		{
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:V_MyCart.php');
		}
		else
		{
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
