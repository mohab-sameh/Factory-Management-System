<?php
include_once('DB.php');
class Category
{
  public $id;
  public $categoryName;
  public $categoryDescription;
  public $creationDate;
  public $updateDate;


  function __construct()
  {
    $this->categoryName = "category name";
    $this->categoryDescription= "description";
    $this->creationDate= "date";
    $this->updateDate= "date";
  }

static function deleteCategory($categoryName)
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql ="DELETE * FROM category WHERE categoryName='$categoryName'";
  $query=mysqli_query($con,$sql);
}

function getCategoryName()
{
  return $this->categoryName;
}

function getCategoryID()
{
  return $this->id;
}
static function getCategory($categoryName)
{
  $category = new Category();
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql ="SELECT * FROM category WHERE categoryName='$categoryName'";
  $query=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
  $category->id = $row['id'];
  $category->categoryName  = $row['categoryName'];
  $category->categoryDescription = $row['categoryDescription'];
  $category->creationDate = $row['creationDate'];
  $category->updationDate = $row['updationDate'];
  return $category;
}

static function getCategoryWithID($id)
{
  $category = new category();
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql ="SELECT * FROM category WHERE id='$id'";
  $query=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
  $category->id = $row['id'];
  $category->categoryName  = $row['categoryName'];
  $category->categoryDescription = $row['categoryDescription'];
  $category->creationDate = $row['creationDate'];
  $category->updationDate = $row['updationDate'];
  return $category;
}


static function addCategory($categoryID, $categoryName, $categoryDescription, $creationDate, $updateDate)
{
  $db = DB::getInstance();
  $sql = "insert into category(categoryID, categoryName, categoryDescription, creationDate, updateDate) values('$categoryID', '$categoryName', '$categoryDescription', '$creationDate', '$updateDate')";
  $query=mysqli_query($db->get_Connecion(),$sql);
  return $query;
}


static function updateCategory($categoryName, $categoryDescription)
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();

  $sql = "update category set categoryName='$categoryName',categoryDescription='$categoryDescription";
  $query= mysqli_query($con,$sql);
  return $query;
  }

  static function removeCategory($categoryName)
  {
    $db = DB::getInstance();
    $con = $db->get_Connecion();
    $sql = "DELETE FROM category WHERE categoryName='$categoryName'";
    $query= mysqli_query($con,$sql);
    return $query;
}

  static function removeCategoryByID($id)
  {
    $db = DB::getInstance();
    $con = $db->get_Connecion();
    $sql = "DELETE FROM category WHERE id='$id'";
    $query= mysqli_query($con,$sql);
    return $query;
}

static function getAllCategories()
{

  $db = DB::getInstance();
  $sql = "SELECT * FROM category";
  $categories = array();
  $query=$db->selectFromTable("category");
  while($row=mysqli_fetch_array($query))
  {
    $category = new Category();
    $category->id = $row['id'];
    $category->categoryName  = $row['categoryName'];
    $category->categoryDescription = $row['categoryDescription'];
    $category->creationDate = $row['creationDate'];
    $category->updationDate = $row['updationDate'];
    array_push($categories,$category);
  }
  return $categories;
}

public static function getNextAutoIncrement()
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql ="SELECT max(id) as pid from category";
  $query=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
  $maxid = $row['pid'];
  $maxid = $maxid +1;
  return $maxid;
}

public static function insertNewCategory($id, $categoryName, $categoryDescription)
{
  $db = DB::getInstance();
  $sql="INSERT into category(id,categoryName,categoryDescription) values('$id', '$categoryName', '$categoryDescription')";
  $query=mysqli_query($db->get_Connecion(),$sql);
  return 'success';
}


}


 ?>
