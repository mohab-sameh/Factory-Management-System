<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/DB.php";
include_once($path);
$db = DB::getInstance();
$con = $db->get_Connecion();
 ?>

 
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a href="#"><i class="icon fa fa-user"></i>Welcome -<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					<li><a href="V_MyAccount.php"><i class="icon fa fa-user"></i>My Account</a></li>
					<li><a href="V_MyWishlist.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li><a href="V_MyCart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="#"><i class="icon fa fa-key"></i>Checkout</a></li>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="V_Login.php"><i class="icon fa fa-sign-in"></i>Login</a></li>
<?php }
else{ ?>

				<li><a href="V_Logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
				<?php } ?>
				</ul>
			</div><!-- /.cnt-account -->

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						<a href="V_TrackOrders.php" class="dropdown-toggle" ><span class="key">Track Order</b></a>

					</li>


				</ul>
			</div>

			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
