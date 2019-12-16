<?php
session_start();
include_once('../DB.php');
include_once('V_SubCategory.php');
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_SubCategory.php";
include_once($path);

$db = DB::getInstance();
$con = $db->get_Connecion();
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{

	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$catID = Category::getCategory($category);
	$catID = $catID->id;
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	SubCategory::addSubCategory($catID, $subcat, $currentTime);

$_SESSION['msg']="SubCategory Created !!";
$message=$_SESSION['msg'];

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from subcategory where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="SubCategory deleted !!";
		  }
}
?>
