<?php
include_once('M_Category.php');
require_once('DB.php');

class SubCategory
{
public $id;
public $categoryID;
public $subCategoryName;
public $creationDate;
public $updateDate;
public $categoryName;

function __construct()
{
  $this->subCategoryName = "subcategory name";
  $this->categoryID = "parent category ID";
  $this->creationDate= "date";
}


function getSubCategoryName()
{
  return $this->subCategoryName;
}
function getSubCategoryID()
{
return $this->id;
}

static function getSubCategory($subCategoryName)
{
$category = new SubCategory();
$db = DB::getInstance();
$con = $db->get_Connecion();
$sql ="SELECT * FROM subcategory WHERE subcategory='$subCategoryName'";
$query=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$category->id = $row['id'];
$category->categoryID = $row['categoryid'];
$category->subCategoryName  = $row['subcategory'];
$category->creationDate = $row['creationDate'];
$category->updationDate = $row['updationDate'];
return $category;
}

static function getSubCategoryWithID($id)
{
$category = new SubCategory();
$db = DB::getInstance();
$con = $db->get_Connecion();
$sql ="SELECT * FROM subCategory WHERE id='$id'";
$query=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$category->id = $row['id'];
$category->categoryID = $row['categoryid'];
$category->subCategoryName  = $row['subcategory'];
$category->creationDate = $row['creationDate'];
$category->updationDate = $row['updationDate'];
return $category;
}


static function addSubCategory($categoryID, $categoryName, $subCategoryName, $creationDate)
{
$db = DB::getInstance();
$sql = "INSERT INTO subcategory (categoryid, categoryname, subcategory, creationDate) VALUES('$categoryID', '$categoryName', '$subCategoryName', '$creationDate')";
$query=mysqli_query($db->get_Connecion(),$sql);
}


static function updateSubCategory($categoryID, $subCategoryName)
{
$db = DB::getInstance();
$con = $db->get_Connecion();

$sql = "update category set categoryid='$categoryID',subcategory='$subCategoryName";
$query= mysqli_query($con,$sql);
return $query;
}

static function removeSubCategory($id)
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql = "DELETE FROM subcategory WHERE subcategory='$subCategoryName'";
  $query= mysqli_query($con,$sql);
  return $query;
}

static function getAllSubCategories()
{

$db = DB::getInstance();
$sql = "SELECT * FROM subcategory";
$categories = array();
$query=$db->selectFromTable("subcategory");
while($row=mysqli_fetch_array($query))
{
  $category = new SubCategory();
  $category->id = $row['id'];
  $category->categoryID = $row['categoryid'];
  $category->subCategoryName  = $row['subcategory'];
  $category->creationDate = $row['creationDate'];
  $category->updationDate = $row['updationDate'];
  array_push($categories,$category);
}
return $categories;
}

static function getAllSubCategoriesForCategory($categoryname)
{
  $categoryid = Category::getCategory($categoryname);
  $categoryid = $categoryid->id;

$sql = "SELECT * FROM subcategory WHERE categoryid = $categoryid";
$categories = array();
$query=$db->selectFromTable("subcategory");
while($row=mysqli_fetch_array($query))
{
  $category = new SubCategory();
  $category->id = $row['id'];
  $category->categoryID = $row['categoryid'];
  $category->subCategoryName  = $row['subcategory'];
  $category->creationDate = $row['creationDate'];
  $category->updationDate = $row['updationDate'];
  array_push($categories,$category);
}
return $categories;
}

static function getAllSubCategoriesForCategoryByID($id)
{
  $categoryid = $id;

$sql = "SELECT * FROM subcategory WHERE categoryid = $categoryid";
$categories = array();
$query=$db->selectFromTable("subcategory");
while($row=mysqli_fetch_array($query))
{
  $category = new SubCategory();
  $category->id = $row['id'];
  $category->categoryID = $row['categoryid'];
  $category->subCategoryName  = $row['subcategory'];
  $category->creationDate = $row['creationDate'];
  $category->updationDate = $row['updationDate'];
  array_push($categories,$category);
}
return $categories;
}

static function getJointSubCategories()
{

  $db = DB::getInstance();
  $sql="SELECT subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate FROM subcategory JOIN category ON category.id=subcategory.categoryid";
  $categories = array();
  $query=$db->selectFromTable("subcategory", "category");
  while($row=mysqli_fetch_array($query))
  {
    $category = new SubCategory();
    $category->id = $row['id'];
    $category->categoryID = $row['categoryid'];
    $category->subCategoryName  = $row['subcategory'];
    $category->creationDate = $row['creationDate'];
    $category->updationDate = $row['updationDate'];
    array_push($categories,$category);
  }
  return $categories;
}

}
?>
