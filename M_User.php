<?php
include('DB.php');
include('Observer.php');
include('EmailNotification.php');
Class User implements Observer
{
  public $id;
 public $name;
  public $email;
   public $contactNo;
    public $password;
     public $shippingAddress;
      public $shippingPinCode;
      public $shippingCity;
       public $billingAddress;
        public $billingState;
         public $billingCity;
          public $billingPinCode;
          public $regDate;
           public $updateDate;
          public $notifer;
          public $notify;
          public $shippingState;
          function __construct()
          {
            $this->name = "Guest";
            $notifer = new EmailNotification();
          }
function getUsername()
{
  return $this->name;
}
static function UpdateBilling($baddress , $bstate ,$bcity, $bpincode , $id)
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql = "update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id ='".$id."'";
  $query=mysqli_query($con,$sql);
return $query;
}
static function UpdateShippingAddress($address , $sstate , $scity , $spincode , $id )
{
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql = mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$id."'");
  $query=mysqli_query($con,$sql);
  return $query;
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
   $user->shippingCity  = $row['shippingCity'];
       $user->shippingAddress = $row['shippingAddress'];
        $user->shippingPinCode = $row['shippingPincode'];
$user->shippingState = $row['shippingState'];
         $user->billingAddress = $row['billingAddress'];
       $user->billingState = $row['billingState'];
       $user->billingCity = $row['billingCity'];
         $user->billingPinCode =  $row['billingPincode'];
         $user->regDate =  $row['regDate'];
           $user->updateDate =  $row['updationDate'];
  return $user;
}
static function GetWithID($id)
{
  $user = new User();
  $db = DB::getInstance();
  $con = $db->get_Connecion();
  $sql ="SELECT * FROM users WHERE id='$id'";
  $query=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
  $user->id = $row['id'];
 $user->name  = $row['name'];
 $user->email = $row['email'];
 $user->contactNo = $row['contactno'];
   $user->password = $row['password'];
       $user->shippingAddress = $row['shippingAddress'];
        $user->shippingPinCode = $row['shippingPincode'];
        $user->shippingCity  = $row['shippingCity'];
         $user->billingAddress = $row['billingAddress'];
       $user->billingState = $row['billingState'];
       $user->billingCity = $row['billingCity'];
       $user->shippingState = $row['shippingState'];
         $user->billingPinCode =  $row['billingPincode'];
         $user->regDate =  $row['regDate'];
           $user->updateDate =  $row['updationDate'];
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
static function UpdateUserData($currentpass,$newpass,$currentTime,$id)
{
  $db = DB::getInstance();
  $sql = "update students set password='".$newpass."', updationDate='$currentTime' where id='".$id."'";
  $result=mysqli_query($db->get_Connection(),"SELECT password FROM  users where password='".$currentpass."' && id='".$id."'");
  $num=mysqli_fetch_array($sql);
  if($num>0)
  {
   $con=mysqli_query($db->get_Connection(),$sql);
   return $num;
}
else {

  return 0;
}
}
static function GetUser($email,$contact)
{
  $db = DB::getInstance();
  $sql = "SELECT * FROM users WHERE email='$email' and contactno='$contact'";

$query=mysqli_query($db->get_Connection(),$sql);
  $num=mysqli_fetch_array($query);
}

static function GetAllUser()
{

  $db = DB::getInstance();
  $sql = "SELECT * FROM users";

$users = array();


$query=$db->selectFromTable("users");


while($row=mysqli_fetch_array($query))
{


  $user = new User();
  $user->id = $row['id'];
 $user->name  = $row['name'];
 $user->email = $row['email'];
 $user->contactNo = $row['contactno'];
   $user->password = $row['password'];
       $user->shippingAddress = $row['shippingAddress'];
        $user->shippingPinCode = $row['shippingPincode'];
$user->shippingCity  = $row['shippingCity'];
         $user->billingAddress = $row['billingAddress'];
       $user->billingState = $row['billingState'];
       $user->billingCity = $row['billingCity'];
       $user->shippingState = $row['shippingState'];
         $user->billingPinCode =  $row['billingPincode'];
         $user->regDate =  $row['regDate'];
           $user->updateDate =  $row['updationDate'];
 array_push($users,$user);


}
return $users;
}


  public function update($notifer)
  {

     $this->notify = $notifer;
   }
   public function updateMail()
   {
     $emailText = $this->notify->getEmailText();
     $to = $this->email;
    $subject = "AboElKhier Factory Updates";
    $txt = $this->mailText;
    $headers = "From: AboElKhier@fact.com";

    mail($to,$subject,$txt,$headers);

}
}
 ?>
