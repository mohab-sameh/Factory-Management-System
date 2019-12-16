<?php
session_start();
require_once 'DB.php';
include("M_Orders.php");
include("M_OrderTrackHistory.php");
$db = DB::getInstance();
$con = $db->get_Connecion();

$oid=intval($_GET['oid']);
$orders = Orders::getOrderbyID($oid);
$orderTracks = OrderTrackHistory::getOrderHistoryByID($oid);
 ?>
