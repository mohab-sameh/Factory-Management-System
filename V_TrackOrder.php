<?php include('C_TrackOrder.php'); ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print();
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order Tracking Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>

    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php
    if( count($orderTracks) > 0 )
    {
foreach ( $orderTracks as $orderTrack)
{
     ?>



      <tr height="20">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $orderTrack->postingDate ;?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $orderTrack->status ;?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink"><?php echo $orderTrack->remark;?></td>
    </tr>


    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php }
 } 
else{
   ?>
   <tr>
   <td colspan="2">Order Not Process Yet</td>
   </tr>
   <?php  }
$st='Delivered';

     foreach($orders as $order)
     {
     $currrentSt=$order->orderStatus;
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Delivered successfully </b></td>
   <?php }

  ?>
</table>
 </form>
</div>

</body>
</html>
