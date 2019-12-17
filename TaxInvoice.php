<?php
include('Invoice.php');
include('Iinvoice.php');
class Tax_Invoice extends Invoice implements Iinvoce
{
    public $pid;
    public function Get_Price()
    {
         $return $price * 1/10;
    }

    public function Get_TotalPrice()
    {
      return $invoice->Get_Price() + $price ;
    }

}
