<?php
session_start();
include('../DB.php');
$db = DB::getInstance();
$con = $db->get_Connecion();
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit1']))
{
	$productname=$_POST['productName'];
	$productimage1=$_FILES["productimage1"]["name"];
//$dir="productimages";
//unlink($dir.'/'.$pimage);


	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$pid/".$_FILES["productimage1"]["name"]);
	$sql=mysqli_query($con,"update  products set productImage1='$productimage1' where id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";

}
if(isset($_POST['submit2']))
{
	$productname=$_POST['productName'];
	$productimage2=$_FILES["productimage2"]["name"];

//dir="productimages";
//unlink($dir.'/'.$pimage);


	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$pid/".$_FILES["productimage2"]["name"]);
	$sql=mysqli_query($con,"update  products set productImage2='$productimage2' where id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";

}
if(isset($_POST['submit3']))
{
	$productname=$_POST['productName'];
	$productimage3=$_FILES["productimage3"]["name"];



	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$pid/".$_FILES["productimage3"]["name"]);
	$sql=mysqli_query($con,"update  products set productImage3='$productimage3' where id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";

}
}

?>
