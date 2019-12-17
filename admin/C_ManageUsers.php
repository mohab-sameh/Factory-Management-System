<?php
session_start();


include('../M_User.php');
$db = DB::getInstance();
$con = $db->get_Connecion();
//$users = User::GetAllUser();

if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

$users = User::GetAllUser();

date_default_timezone_set('Africa/Cairo');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

if(isset($_GET['submite']))
{

$mailText = $_GET['mailText'];
echo $mailText;
$notifer = new EmailNotification();
$notifer->setEmailText($mailText);
$users = User::GetAllUser();
foreach($users as $user)
{
	echo $user->name;
	 $notifer->addUser($user);
}
$notifer->notifyAll();
foreach($users as $user)
{
	 $user->updateMail();
}
$message = " Notification Sent ";
echo "<script type='text/javascript'>alert('$message');</script>";

}
    }

?>
