<?php
session_start();
error_reporting(0);
require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion();
if(strlen($_SESSION['login'])==0)
    {
header('location:V_Login.php');
}
else{
}
?>
