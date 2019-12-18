<?php
require_once 'Payment.php';
Class Visa implements Payment
{
     public $visaNumber;
    public $expirayDate;
    public $cardAmount;
    public $pinCode;
    function Get_CardInfo($visaNumber,$expirayDate,$pinCode,$cardAmount)
    {
       $this->$visaNumber = $visaNumber;
       $this->$expirayDate = $expirayDate;
       $this->$pinCode = $pinCode;
$this->$cardAmount = $cardAmount;
    }
    function pay($amount)
    {
            if($amount <= $this->$cardAmount)
            {
             $this->$cardAmount = $cardAmount - $amount ;
             return true;
         }
         else {
            return false;
         }

}
}
 ?>
