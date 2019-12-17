<?php

if(isset($_Get['action'])){
   if(!empty($_SESSION['cart'])){
   foreach($_POST['quantity'] as $key => $val){
     if($val==0){
       unset($_SESSION['cart'][$key]);
     }else{
       $_SESSION['cart'][$key]['quantity']=$val;
     }
   }
   }
 }

class MainHeaderController
{
 public static function ifCartSession()
 {
   if(!empty($_SESSION['cart']))
   {
     return true;
   }
   else {
     return false;
   }
 }

 public static function returnTP()
 {
   return $_SESSION['tp'];
 }
 public static function returnQnty()
 {
   return $_SESSION['qnty'];
 }

public static function updatePriceAndQuantities()
{

}

}

 ?>
