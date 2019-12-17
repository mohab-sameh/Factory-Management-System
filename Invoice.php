<?php

class M_Invoice
{
  public $oid;
  public $price;
  public $quantity;
  public $totalquantity;
  public $invoice;

public function __construct()
{
  $this->oid = 0;
  $this->price = 0;
  $this->quantity = 0;
  $this->totalprice = 0;
}
public function invoice($oid,$price,$quantity)
{

    $this->oid = $oid;

    $this->price = $price;

    $this->quantity = $quantity;

  }
public  function WrapInvoice($invoice)
  {

  $this->invoice = $invoice;

  }
public function Calculate_TotalPrice()
{

  $this->totalprice = $this->quantity * $this->price;

  return $this->totalprice;
}
public function Get_TotalPrice()
{


   return $this->totalprice + $this->invoice->Get_TotalPrice();
}

}












?>
