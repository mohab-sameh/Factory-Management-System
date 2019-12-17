<?php
include('Invoice.php');
include('Iinvoice.php');
class Product_Invoice extends Invoice implements Iinvoce
{
    public $pid;
    public function Get_Price()
    {
         $return $price;
    }

        public function Get_TotalPrice()
        {
          return $invoice->Get_Price() + $price ;
        }


}
















 ?>
