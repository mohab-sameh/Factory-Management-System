<?php

class Product_Invoice extends M_Invoice
{
    public $pid;

      public function Get_TotalPrice()
        {
             echo "is ks1";

              return  $this->totalprice + $this->invoice->Get_TotalPrice();
        }



}


?>
