<?php

require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion();


class Products
{
  public $id;
  public $category;
  public $subCategory;
  public $productName;
  public $productCompany;
  public $productPrice;
  public $productBeforeDiscount;
  public $productDescription;
  public $productImage1;
  public $productImage2;
  public $productImage3;
  public $shippingCharge;
  public $productAvailability;
  public $postingDate;
  public $updateDate;

  function __construct($id)
	{
    $db = DB::getInstance();
    $con = $db->get_Connecion();
		if ($id !="")
		{
			$sql="select * from products where ID=$id";
			$StudentDataSet = mysql_query($sql) or die(mysql_error());
			if ($row = mysql_fetch_array($StudentDataSet))
			{
            $this->id = $id;
            $this->category=$row["category"];
            $this->subCategory =$row["subcategory"];
            $this->productName =$row["productName"];
            $this->productCompany =$row["productCompany"];
            $this->productPrice =$row["productPrice"];
            $this->productBeforeDiscount =$row["productpricebeforediscount"];
            $this->productDescription =$row["productDescription"];
            $this->productImage1 =$row["productImage1"];
            $this->productImage2 =$row["productImage2"];
            $this->productImage3 =$row["productImage3"];
            $this->shippingCharge =$row["shippingCharge"];
            $this->productAvailability =$row["productAvailability"];
            $this->postingDate =$row["postingDate"];
            $this->updateDate =$row["updationDate"];



			}
		}
	}


  public static function selectAllProducts()
	{
		$db=DbConnection::getInstance();
		$sql="select * from products order by id";
		$dataSet = mysql_query($sql) or die(mysql_error());
		$i=0;
		$Result;
		while ($row = mysql_fetch_array($dataSet))
		{
			$MyObj= new Products($row["Id"]);
			$Result[$i]=$MyObj;
			$i = $i+1;
		}
		return $Result;

	}
static function insertProduct($category,$subCategory,$productName,$productCompany,$productPrice,$productBeforeDiscount,$productDescription,$productImage1,$productImage2,$productImage3,$shippingCharge,$productAvailability,$postingDate,$updateDate)
{
  $db = DB::getInstance();
  $sql = "INSERT into products(category,subCategory,productName,productCompany,productPrice,productBeforeDiscount,productDescription,productImage1,productImage2,productImage3,shippingCharge,productAvailability,postingDate,updationDate) values('$category','$subCategory','$productName','$productCompany','$productPrice','$productBeforeDiscount','$productDescription','$productImage1','$productImage2','$productImage3','$shippingCharge','$productAvailability','$postingDate','$updateDate')";
  $query=mysqli_query($db->get_Connecion(),$sql);
  return $query;
}

static function getAllProductsDetails()
{

  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $query=mysqli_query($con,"SELECT * FROM products");
  $products = array();
  while($row=mysqli_fetch_array($query))
  {
    $product = new Products("");
    $product->id = $row['id'];
    $product->category=$row['category'];
    $product->subCategory =$row['subCategory'];
    $product->productName =$row['productName'];
    $product->productCompany =$row['productCompany'];
    $product->productPrice =$row['productPrice'];
    $product->productBeforeDiscount =$row['productPriceBeforeDiscount'];
    $product->productDescription =$row['productDescription'];
    $product->productImage1 =$row['productImage1'];
    $product->productImage2 =$row['productImage2'];
    $product->productImage3 =$row['productImage3'];
    $product->shippingCharge =$row['shippingCharge'];
    $product->productAvailability =$row['productAvailability'];
    $product->postingDate =$row['postingDate'];
    $product->updateDate =$row['updationDate'];

    array_push($products,$product);
  }
  return $products;

}

}

 ?>
