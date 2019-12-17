<?php
session_start();
error_reporting(0);
include("M_User.php");
$db = DB::getInstance();
$con = $db->get_Connecion();

if(strlen($_SESSION['login'])==0)
    {
header('location:index.php');
}
else{
  $user = User::GetWithID($_SESSION['id']);
  echo $user->name ;
	if(isset($_POST['update']))
	{
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
		$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Your info has been updated');</script>";
		}
	}
}

date_default_timezone_set('Africa/Cairo');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$num = User::UpdateUserData(md5($_POST['cpass']),md5($_POST['newpass']),$currentTime,$_SESSION['id']);

if($num>0)
{
echo "<script>alert('Password Changed Successfully !!');</script>";
}
else
{
	echo "<script>alert('Current Password not match !!');</script>";
}
}


?>
