<?php
require_once 'Payment.php';
Class InternetBanking implements Payment
{
  public $bankNumber;
 public $accountBalance;
 public $pinCode;
 function Get_BankAccountInfo($BankNumber,$pinCode,$accountBalance)
 {
    $this->bankNumber = $BankNumber;
    $this->accountBalance = $accountBalance;
    $this->pinCode = $pinCode;

 }
 function pay($amount)
 {
         if($amount <= $this->accountBalance)
         {
          $this->accountBalance = $this->accountBalance - $amount;
             return true;
         }
         else {
            return false;
         }
 }

}

?>
