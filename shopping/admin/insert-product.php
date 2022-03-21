<?php
session_start();
if(($_SESSION['login'])==0||($_SESSION['type'])=="user")
    {   
header('location:../login.php');
}
 include 'include/config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Product</title>
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
								<h3>Add Product</h3>
							</div>
							<div class="module-body">

								<form action=""class="form-horizontal row-fluid"method="post" enctype="multipart/form-data">

									<div class="control-group">
										<label class="control-label" for="basicinput">Category</label>
										<div class="controls">
											<select name="category" class="span8 tip" required>
												<option value=" " >Select Category</option> 
												<?php $query=mysqli_query($mysqli,"select * from categories");
													while($row=mysqli_fetch_array($query))
													{?>

													<option  value="<?php echo $row['cid'];?>"><?php echo $row['cname'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>
							


									<div class="control-group">
										<label class="control-label" for="basicinput">Product Name</label>
										<div class="controls">
											<input type="text"    name="productName"  placeholder="Enter Product Name" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Product Company</label>
										<div class="controls">
											<input type="text"    name="productCompany"  placeholder="Enter Product Comapny Name" class="span8 tip" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Price Before Discount</label>
										<div class="controls">
											<input type="text"    name="productpricebd"  placeholder="Enter Product Price" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Product Price After Discount(Selling Price)</label>
										<div class="controls">
											<input type="text"    name="productprice"  placeholder="Enter Product Price" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Product Description</label>
										<div class="controls">
											<textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="span8 tip">
										</textarea>  
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Product Shipping Charge</label>
										<div class="controls">
											<input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Product Availability</label>
										<div class="controls">
											<select   name="productAvailability"  id="productAvailability" class="span8 tip" required>
												<option value="">Select</option>
												<option value="In Stock">In Stock</option>
												<option value="Out of Stock">Out of Stock</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Product Quantity</label>
										<div class="controls">
											<input type="text"    name="productQuantity"  placeholder="Enter Product Quantity" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Product Image1</label>
											<div class="controls">
											<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label" for="basicinput">Product Image2</label>
											<div class="controls">
												<input type="file" name="productimage2"  class="span8 tip" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Image3</label>
											<div class="controls">
												<input type="file" name="productimage3"  class="span8 tip">
											</div>
									</div>

									<div class="control-group">
										<div class="controls  sumbit-ctrl">
											<button type="submit" name="submit" class="btn">Insert</button>
										</div>
									</div>
								</form>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include('include/footer.php');?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

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
</html>
<?php
   include 'include/config.php';
   if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$productquantity=$_POST['productQuantity'];
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
$query=mysqli_query($mysqli,"select max(pid) as id from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['id']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);
	$qr="INSERT into `products`(`cid`, `pname`, `pcompany`, `pprice`, `ppricebd`, `pdescription`, `shippingcharge`, `pavailability`, `pquantity`, `pimage1`, `pimage2`, `pimage3`) VALUES ('$category','$productname','$productcompany','$productprice','$productpricebd','$productdescription','$productscharge','$productavailability','$productquantity','$productimage1','$productimage2','$productimage3')";
$sql=mysqli_query($mysqli,$qr);
if ($sql) {
	echo"<script>alert('Data inserted');</script>";
}

}

?>