<?php
session_start();
include('../DB.php');
$db = DB::getInstance();
$con = $db->get_Connecion();
include_once('V_ManageProducts.php');
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_Products.php";
include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_Category.php";
include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_SubCategory.php";
include_once($path);

if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

	$products = Products::getAllProductsDetails();

date_default_timezone_set('Africa/Cairo');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
				$id =$_GET['id'];
				$id = intval($id);
				$query = Products::removeProductByID($id);
				if($query)
				{
					$_SESSION['delmsg']="Product deleted !!";
				}
		  }
}

?>
