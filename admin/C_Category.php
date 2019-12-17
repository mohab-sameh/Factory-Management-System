
<?php
session_start();
require_once('../DB.php');
include_once('V_Category.php');
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_Category.php";
include_once($path);

$db = DB::getInstance();
$con = $db->get_Connecion();
$category = new Category();
$arr = Category::getAllCategories();

if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
date_default_timezone_set('Africa/Cairo');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$description=$_POST['description'];
	$categoryid=Category::getNextAutoIncrement();
	$case = Category::insertNewCategory($categoryid, $category, $description);
	if($case == 'success')
	{
		$_SESSION['msg']="Category Created !!";
	}
	else {
		echo("error caught");
	}



}

if(isset($_GET['del']))
		  {
				//Category::deleteCategory($_GET['id']);
				$tmpid = $_GET['id'];
		    $query = Category::removeCategoryByID($tmpid);
        if($query)
				{
					$_SESSION['delmsg']="Category deleted !!";
				}
				else {
					echo("caught error");
				}
		  }
}

?>
