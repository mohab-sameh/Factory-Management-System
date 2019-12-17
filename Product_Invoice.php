<?php
include('Invoice.php');
include('Iinvoice.php');
class Product_Invoice extends Invoice implements Iinvoce
{
    public $pid;
    public function Calculate_Price()
    {
      $totalprice = $quantity * $price;
         $return $totalprice;
    }


        function Get_TotalPrice()
        {
           $totalprice = $totalprice + $invoice->Get_TotalPrice();
              return $totalprice;
        }



}
















 ?>
