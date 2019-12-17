<?php



class Tax_Invoice extends M_Invoice implements Iinvoice
{
    public $pid;
    public function Calculate_Tax()
    {

         $this->totalprice = $this->quantity * $this->price * 1/10;
            return $this->totalprice;
       }

    function Get_TotalPrice()
    {


          return $this->totalprice ;
    }

}
?>
