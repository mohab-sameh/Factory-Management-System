<?php
include('DB.php');
class Admin
{
  public $id;
  public $username;
  public $password;
  public $creationDate;
  public $updateDate;
  static function  LoginUser($email,$password)
  {

    $db = DB::getInstance();
    $con = $db->get_Connecion();
  $sql ="SELECT * FROM admins WHERE email='$email' and password='$password'";
    $query=mysqli_query($con,$sql);
    $num = mysqli_fetch_array($query);
    return $num;
  }
}
?>
