<?php
session_start();
require_once 'DB.php';
$db = DB::getInstance();
$con = $db->get_Connecion();

$_SESSION['login']=="";
date_default_timezone_set('Africa/Cairo');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE userEmail = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg']="You have successfully logout";

?>
