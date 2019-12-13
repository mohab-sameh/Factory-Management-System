<?php
session_start();
require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion();
$oid=intval($_GET['oid']);
 ?>
