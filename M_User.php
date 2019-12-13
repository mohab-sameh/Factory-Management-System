<?php
include('DB.php');
Class User
{
  public $id;
 public $name;
  public $email;
   public $contactNo;
    public $password;
     public $shippingAddress;
      public $shippingPinCode;
       public $billingAddress;
        public $billingState;
         public $billingCity;
          public $billingPinCode;
          public $regDate;
           public $updateDate;

          function __construct()
          {
            $this->name = "Guest";
          }
function getUsername()
{
  return $this->name;
}

static function populate($email,$password)
{
  $user = new User();
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql ="SELECT * FROM users WHERE email='$email' and password='$password'";
  $query=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
 $user->id = $row['id'];
$user->name  = $row['name'];
$user->email = $row['email'];
$user->contactNo = $row['contactno'];
  $user->password = $row['password'];
      $user->shippingAddress = $row['shippingAddress'];
       $user->shippingPinCode = $row['shippingpincode'];
        $user->billingAddress = $row['billingAddress'];
      $user->billingState = $row['billingstate'];
      $user->billingCity = $row['billingcity'];
        $user->billingPinCode =  $row['billingpincode'];
        $user->regDate =  $row['regdate'];
          $user->updateDate =  $row['updationdate'];
  return $user;
}
static function  LogintUser($email,$password)
{

  $db = DB::getInstance();
  $con = $db->get_Connecion();
$sql ="SELECT * FROM users WHERE email='$email' and password='$password'";
  $query=mysqli_query($con,$sql);
  $num = mysqli_fetch_array($query);
  return $num;
}
static function InsertUser($name,$email,$contactno,$password)
{
  $db = DB::getInstance();
  $sql = "insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')";
  $query=mysqli_query($db->get_Connecion(),$sql);
  return $query;

}
static function UpdateUser($password , $email , $contact)
{
  $db = DB::getInstance();
  $sql = "update users set password='$password' WHERE email='$email' and contactno='$contact' ";
$query=mysqli_query($db->get_Connection(),$sql);
}
static function GetUser($emil,$contact)
{
  $db = DB::getInstance();
  $sql = "SELECT * FROM users WHERE email='$email' and contactno='$contact'";

$query=mysqli_query($db->get_Connection(),$sql);
  $num=mysqli_fetch_array($query);
}



}
 ?>
