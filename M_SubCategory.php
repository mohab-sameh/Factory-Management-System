<?php
include('M_Category.php');

class SubCategory
{
public $id;
public $categoryID;
public $subCategoryName;
public $creationDate;
public $updateDate;

function __construct()
{
  $this->subCategoryName = "subcategory name";
  $this->categoryID = "parent category ID";
  $this->creationDate= "date";
  $this->updateDate= "date";
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


static function addSubCategory($id, $categoryID, $subCategoryName, $creationDate, $updateDate)
{
$db = DB::getInstance();
$sql = "insert into subcategory (id, categoryid, subcategory, creationDate, updateDate) values('$id', '$categoryID', '$subCategoryName', '$creationDate', '$updateDate')";
$query=mysqli_query($db->get_Connecion(),$sql);
return $query;
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

}
?>
