<?php

session_start();
error_reporting(0);

require_once 'DB.php';
require_once 'M_Orders.php';

if(strlen($_SESSION['login'])==0)
    {
header('location:V_Login.php');
}
else{
	if (isset($_POST['submit'])) {
      if($_POST['paymethod'] == "COD")
    {

      require_once('COD.php');
           $payment = new COD();
           $payment->$limitamount = 999;
           if($payment->pay(500))
           {
            Orders::updateOrderMethod($_POST['paymethod'],$_SESSION['id']);
            $message = "Order In Process";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('location:V_OrderHistory.php');

           }

    }
    else if($_POST['paymethod'] ==  'Internet Banking'){

    require_once('InternetBanking.php');
          $payment = new  InternetBanking();
           $payment->accountBalance = 999;
           if($payment->pay(500))
          {
         Orders::updateOrderMethod($_POST['paymethod'],$_SESSION['id']);
          $message = "Order In Process";
           echo "<script type='text/javascript'>alert('$message');</script>";
          header('location:V_OrderHistory.php');

          }

    }
    else {
      require_once('Visa.php');
           $payment = new Visa();
          $payment->cardAmount = 999;
          if($payment->pay(500))
          {
           Orders::updateOrderMethod($_POST['paymethod'],$_SESSION['id']);
           $message = "Order In Process";
           echo "<script type='text/javascript'>alert('$message');</script>";
           header('location:V_OrderHistory.php');

          }

    }

    unset($_SESSION['cart']);

	}
}
?>
