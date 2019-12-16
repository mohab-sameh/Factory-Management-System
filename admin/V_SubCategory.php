
<?php
//include_once('C_SubCategory.php');
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/DB.php";
include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_SubCategory.php";
include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'] . "/Factory/M_Category.php";
include_once($path);
include_once('C_SubCategory.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| SubCategory</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Sub Category</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($message);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="subcategory" method="post" >


<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" class="span8 tip" required>
<option value="">Select Category</option>
<?php
$allCategories = Category::getAllCategories();
for ($i=0;$i<count($allCategories);$i++)
{?>

<option value="<?php echo $allCategories[$i]->id;?>"><?php echo $allCategories[$i]->categoryName;?></option>
<?php } ?>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">SubCategory Name</label>
<div class="controls">
<input type="text" placeholder="Enter SubCategory Name"  name="subcategory" class="span8 tip" required>
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Create</button>
											</div>
										</div>
									</form>
							</div>
						</div>


						<div class="module">
												<div class="module-head">
													<h3>Sub Category</h3>
												</div>
												<div class="module-body table">
													<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
														<thead>
															<tr>
																<th>#</th>
																<th>Category</th>
																<th>Description</th>
																<th>Creation date</th>
																<th>Last Updated</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>

					<?php

					$elements = SubCategory::getAllSubCategories();
					$cnt=1;
					for($i=0; $i<count($elements); $i++)
					{
					?>
															<tr>
																<td><?php echo ($elements[$i]->id);?></td>
																<td><?php

																echo ($elements[$i]->categoryName);?></td>
																<td><?php echo ($elements[$i]->subCategoryName);?></td>
																<td> <?php echo ($elements[$i]->creationDate);?></td>
																<td><?php echo ($elements[$i]->updationDate);?></td>
																<td>
																<a href="V_EditSubCategoryphp?id=<?php echo($elements[$i]->id); ?>" ><i class="icon-edit"></i></a>
																<a href="V_SubCategory.php?id=<?php echo($elements[$i]->id); ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
															</tr>
															<?php $cnt=$cnt+1; } ?>

													</table>
												</div>
											</div>



					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
