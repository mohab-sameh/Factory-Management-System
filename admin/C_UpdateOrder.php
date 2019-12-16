<?php
session_start();

include('../DB.php');
include('../M_Orders.php');
$db = DB::getInstance();
$con = $db->get_Connecion();
if(strlen($_SESSION['alogin'])==0)
  {
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
$orders = Orders::getOrderbyID($oid);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$remark=$_POST['remark'];//space char

$query=mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
Orders::UpdateOrder($status,$oid);
echo "<script>alert('Order updated sucessfully...');</script>";
//}
}
}

 ?>
