<?php
include('C_MainHeader.php');
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/Factory/M_Products.php";
include_once($path);

?>


	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
	<a href="index.php">

		<h2>Abo El Kheir Factories</h2>

	</a>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
<div class="search-area">
    <form name="search" method="post" action="V_SearchResult.php">
        <div class="control-group">

            <input class="search-field" placeholder="Search here..." name="product" required="required" />

            <button class="search-button" type="submit" name="search"></button>

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
<?php

if(MainHeaderController::ifCartSession()){
	?>
	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">EGP</span>
						<span class="value"><?php echo(MainHeaderController::returnTP()); ?></span>
					</span>
				</div>
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count"><?php echo(MainHeaderController::returnQnty());?></span></div>

		    </div>
		</a>
		<ul class="dropdown-menu">

		 <?php

  $products =  Products::GetProductsbyID($_SESSION['cart']);
       $totalprice=0;
       $totalqunty=0;

       if(!empty($products)){
foreach($products as $product )
{

			   $quantity=$_SESSION['cart'][$product->id]['quantity'];
         $subtotal= $_SESSION['cart'][$product->id]['quantity']*$product->productPrice+$product->shippingCharge;
         $totalprice += $subtotal;
         $_SESSION['qnty']=$totalqunty+=$quantity;
         ?>

			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img  src="admin/productimages/<?php echo $product->id;?>/<?php echo $product->productImage1;?>" width="35" height="50" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">

							<h3 class="name"><a href="index.php?page-detail"><?php echo $product->productName; ?></a></h3>
							<div class="price">EGP.<?php echo ($product->productPrice+$product->shippingCharge); ?>*<?php echo $_SESSION['cart'][$product->id]['quantity']; ?></div>
						</div>

					</div>
				</div><!-- /.cart-item -->

				<?php } }?>
				<div class="clearfix"></div>
			<hr>

			<div class="clearfix cart-total">
				<div class="pull-right">

						<span class="text">Total :</span><span class='price'>EGP<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>

				</div>

				<div class="clearfix"></div>

				<a href="V_MyCart.php" class="btn btn-upper btn-primary btn-block m-t-20">My Cart</a>
			</div><!-- /.cart-total-->


		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->
<?php } else { ?>
<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">EGP</span>
						<span class="value">00.00</span>
					</span>
				</div>
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count">0</span></div>

		    </div>
		</a>
		<ul class="dropdown-menu">




			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-12">
							Your Shopping Cart is Empty.
						</div>


					</div>
				</div><!-- /.cart-item -->


			<hr>

			<div class="clearfix cart-total">

				<div class="clearfix"></div>

				<a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shopping</a>
			</div><!-- /.cart-total-->


		</li>
		</ul><!-- /.dropdown-menu-->
	</div>
	<?php }?>




<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div>
