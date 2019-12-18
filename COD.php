<?php
require_once 'Payment.php';
class COD implements Payment
{
  public $address;
 public $limitamount;

 function Get_UserInfo($address,$limitamount)
 {
$this->addres = $address;
$this->$limitamount = $limitamount;
}
 function pay($amount)
 {
         if($amount <= $this->$limitamount)
         {

          return true;
      }
      else {
         return false;
      }

}

}


 ?>
