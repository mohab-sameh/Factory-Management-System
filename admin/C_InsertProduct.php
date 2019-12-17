
<?php

session_start();
include('../DB.php');
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_Category.php";
include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_SubCategory.php";
include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_Products.php";
include_once($path);
include_once('V_InsertProduct.php');

$db = DB::getInstance();
$con = $db->get_Connecion();
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

	$allCategories = Category::getAllCategories();
	$allSubCategories = SubCategory::getAllSubCategories();

if(isset($_POST['category']))
{
	$selectedCategory = $_POST['category'];
}

if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];

//for getting product id

	 $productid=Products::getAvailableProductID();
	 echo($productid);
	 $productid = intval($productid);
	$dir="productimages/$productid";

if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);


$case = Products::insertNewProduct($productid,$category,$subcat,$productname,$productcompany,$productprice,$productdescription,$productscharge,$productavailability,$productimage1,$productimage2,$productimage3,$productpricebd);
if($case == 'success')
{
	$_SESSION['msg']="Product Inserted Successfully !!";
}

}
}

?>
