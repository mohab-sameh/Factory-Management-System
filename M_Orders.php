<?php

class Orders
{
public $id;
public $userID;
public $productID;
public $quantity;
public $orderDate;
public $paymentMethod;
public $orderStatus;

static function getOrderbyID($oid)
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $orders = array();
   $query = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
   while($row=mysqli_fetch_array($query))
   {
    $order = new Orders();
    $order->id = $row['id'];
    $order->userID = $row['userId'];
    $order->productID = $row['productId'];
    $order->quantity = $row['quantity'];
    $order->orderDate = $row['orderDate'];
    $order->paymentMethod = $row['paymentMethod'];
    $order->orderStatus = $row['orderStatus'];
    array_push($orders,$order);

   }
   return  $orders;
}
static function updateOrder($status,$oid)
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql=mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");

}

}

?>
