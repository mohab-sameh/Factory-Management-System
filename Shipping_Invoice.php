<?php

class Shipping_Invoice extends M_Invoice
{
    public $pid;
    public function Get_Price()
    {
      $this->totalprice = $this->price;

         return $this->totalprice;
    }

        public function Get_TotalPrice()
        {
                 echo "is ks2";
          return $this->totalprice + $this->invoice->Get_TotalPrice() ;
        }


}
?>
