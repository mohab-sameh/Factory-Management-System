<?php
require_once('invoice.php');

include('Product_Invoice.php');
include('TaxInvoice.php');
include('Shipping_Invoice.php');
include('C_MyCart.php');


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Cart</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->


		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">



		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');
?>

<?php include('includes/main-header.php');
?>
<?php include('includes/menu-bar.php');
?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">
<?php
if(!empty($_SESSION['cart'])){
	?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>

					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total last-item">Grandtotal</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php

 $pdtid=array();
 $invoices = array();

  $products = Products::GetProductsbyID($_SESSION['cart']);

			$totalprice=0;
			$totalqunty=0;
			if(!empty($products) ){
 foreach ($products as $product) {

				$quantity=$_SESSION['cart'][$product->id]['quantity'];


        $invoice = new M_Invoice();
				$invoice->invoice(0,0,0);


			  $productInvoice = new Product_Invoice();
				$productInvoice->invoice($product->id,$product->productPrice,$quantity);
 $productInvoice->Calculate_TotalPrice();
		    $shippingInvoice = new Shipping_Invoice();
				$shippingInvoice->invoice($product->id,$product->shippingCharge,$quantity);
			$shippingInvoice->Get_Price();
			  $taxInvoice = new Tax_Invoice();

				$taxInvoice->invoice($product->id,$product->productPrice,$quantity);

      $taxInvoice->Calculate_Tax();
				$invoice->WrapInvoice($productInvoice);

			  $productInvoice->WrapInvoice($shippingInvoice);
				$shippingInvoice->WrapInvoice($taxInvoice);

			  $subtotal = $invoice->Get_TotalPrice();

				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

array_push($invoices,$invoice);
				array_push($pdtid,$product->id);
//print_r($_SESSION['pid'])=$pdtid;exit;

	?>

				<tr>
					<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($product->id);?>" /></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $product->id;?>/<?php echo $product->productImage1;?>" alt="" width="114" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="V_ProductDetails.php?pid=<?php echo htmlentities($pd=$product->id);?>" ><?php echo $product->productName;

$_SESSION['sid']=$pd;
						 ?></a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>
								<div class="reviews">
									( <?php echo htmlentities($num);?> Reviews )
								</div>
								<?php } ?>
							</div>
						</div><!-- /.row -->

					</td>
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				             <input type="text" value="<?php echo $_SESSION['cart'][$product->id]['quantity']; ?>" name="quantity[<?php echo $product->id; ?>]">

			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "Rs"." ".$productInvoice->price; ?>.00</span></td>
<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "Rs"." ".$shippingInvoice->price; ?>.00</span></td>

					<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo ($invoice->Get_TotalPrice()); ?>.00</span></td>
				</tr>

				<?php } }
$_SESSION['pid']=$pdtid;
				?>

			</tbody><!-- /tbody -->
		</table><!-- /table -->

	</div>
</div><!-- /.shopping-cart-table -->			<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Shipping Address</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
						<?php
	echo htmlentities($user->shippingAddress)."<br />";
	echo htmlentities($user->shippingCity)."<br />";
	echo htmlentities($user->shippingState);
	echo htmlentities($user->shippingPinCode);
						?>

						</div>

					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Billing Address</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
						<?php
						echo htmlentities($user->shippingAddress)."<br />";
						echo htmlentities($user->shippingCity)."<br />";
						echo htmlentities($user->shippingState);
						echo htmlentities($user->shippingPinCode);

						?>

						</div>

					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>
<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>

					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md"><?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" name="ordersubmit" class="btn btn-primary">PROCCED TO CHEKOUT</button>

						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table>
	<?php } else {
echo "Your shopping Cart is empty";
		}?>
</div>			</div>
		</div>
		</form>
<?php echo include('includes/brands-slider.php');?>
</div>
</div>
<?php include('includes/footer.php');?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>

	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->

	<script src="switchstylesheet/switchstylesheet.js"></script>

	<script>
		$(document).ready(function(){
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->
</body>
</html>
