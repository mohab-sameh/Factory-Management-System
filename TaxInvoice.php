<?php



class Tax_Invoice extends M_Invoice
{
    public $pid;
    public function Calculate_Tax()
    {

         $this->totalprice = $this->quantity * $this->price * 1/10;
            return $this->totalprice;
       }

    function Get_TotalPrice()
    {
       echo "is ks3";

          return $this->totalprice ;
    }

}
?>
