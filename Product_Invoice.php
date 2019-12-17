<?php

class Product_Invoice extends M_Invoice implements Iinvoice
{
    public $pid;

      public function Get_TotalPrice()
        {


              return  $this->totalprice + $this->invoice->Get_TotalPrice();
        }



}


?>
