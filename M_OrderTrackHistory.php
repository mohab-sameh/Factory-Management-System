<?php

class OrderTrackHistory
{
  public $id;
  public $orderID;
  public $status;
  public $remark;
  public $postingDate;


function getOrderHistoryByID($oid)
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
    $orderTracks = array();
$query = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
$num=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query))
{
  $orderTrack = new OrderTrackHistory();
  $orderTrack->id = $row['id'];
  $orderTrack->orderID = $row['orderId'];
  $orderTrack->status = $row['status'];
  $orderTrack->postingDate = $row['postingDate'];
  $orderTrack->remark = $row['remark'];
  array_push($orderTracks,$orderTrack);


}
return $orderTracks;
}
}

?>
