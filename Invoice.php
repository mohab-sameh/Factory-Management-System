<?php
class Invoice
{
  public $oid;
  public $price;
  public $quantity;
  public $totalquantity;
  public $invoice;


function Invoice($oid,$price,$quantity,$invoice)
{
    $this->oid = $oid;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->invoice = $invoice;
}
function Get_TotalPrice()
{
   $this->totalprice = $this->totalprice + $this->invoice->Get_TotalPrice();
}

}












?>
