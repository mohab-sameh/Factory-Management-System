<?php

$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/Factory/DB.php";
include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/Factory/M_Category.php";
include_once($path);
$db = DB::getInstance();
$con = $db->get_Connecion();

 ?>


<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
		<ul class="nav navbar-nav">
			<li class="active dropdown yamm-fw">
				<a href="index.php" data-hover="dropdown" class="dropdown-toggle">Home</a>

			</li>
              <?php
              $allCategories = Category::getAllCategories();

              //$sql=mysqli_query($con,"select id,categoryName  from category limit 6");
for($i=0; $i<count($allCategories) and $i < 6; $i++)
{
    ?>

			<li class="dropdown yamm">
				<a href="V_Category.php?cid=<?php echo($allCategories[$i]->id); ?>"> <?php echo($allCategories[$i]->categoryName);?></a>

			</li>
			<?php } ?>


		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>
	</div>
</div>


            </div>
        </div>
    </div>
</div>
