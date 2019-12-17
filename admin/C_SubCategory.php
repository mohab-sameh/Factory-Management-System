<?php
session_start();
include_once('../DB.php');
include_once('V_SubCategory.php');
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_SubCategory.php";
include_once($path);

$db = DB::getInstance();
$con = $db->get_Connecion();


$elements = SubCategory::getAllSubCategories();


if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{



$allCategories = Category::getAllCategories();


if(isset($_POST['submit']))
{

	$categoryName=$_POST['category'];
	$catID=$categoryName;
	$catName = Category::getCategoryWithID($categoryName);
	$catName = $catName->categoryName;
	$subcat=$_POST['subcategory'];
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	SubCategory::addSubCategory($catID, $catName, $subcat, $currentTime);

$_SESSION['msg']="SubCategory Created !!";
$message=$_SESSION['msg'];

}

if(isset($_GET['del']))
		  {
				$id =$_GET['id'];
				SubCategory::removeSubCategoryByID($id);
        $_SESSION['delmsg']="SubCategory deleted !!";
		  }
}
?>
