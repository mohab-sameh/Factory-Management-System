<?php
include('Invoice.php');
include('Iinvoice.php');
class Tax_Invoice extends Invoice implements Iinvoce
{
    public $pid;
    public function Calculate_Tax()
    {

         $totalprice = $quantity * $price * 1/10;
            $return $totalprice;
       }

    function Get_TotalPrice()
    {
       $totalprice = $totalprice + $invoice->Get_TotalPrice();
          return $totalprice;
    }

}
