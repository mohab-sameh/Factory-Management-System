<?php
session_start();
error_reporting(0);
require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion()
?>
