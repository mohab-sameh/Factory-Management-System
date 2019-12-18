<?php



class Tax_Invoice extends M_Invoice 
{
    public $pid;
    public function Get_Price()
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
