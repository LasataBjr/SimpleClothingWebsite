<?php
session_start();
	require_once("useful_func.php");
	 error_reporting(E_ALL);
	$a = new useful_func(); //creating object
	// $a->checklogin();

	//$a->test_function();
	//checking if the database contains the data or not
	//$featured = $a->fetch_multiple_data($table);
	//$newarrival = $a->fetch_multiple_data($table1);
	
	if(isset($_POST['submit']))
	{
		global $con;	
		$table = $_POST['product_type'];
		$productname = $_POST['Productname'];
		$productprice = $_POST['Productprice'];
		
			// checking if img upload is done with out error
			if($_FILES['Productimg']['error'] == UPLOAD_ERR_OK)
				{
					$img_path = "Assets/Images/upload_img/";
					$imgname = $_FILES['Productimg']['name'];
					$temp_imgname = $_FILES['Productimg']['tmp_name'];
					$upload_img = $a->insertimg_db($img_path,$imgname,$temp_imgname);
				}
				else
				{
					echo "Error:".$_FILES['Productimg']['error'];
				}
				$insert_array = array("P_Name"=>$productname,"P_Price"=>$productprice,"P_Image"=>$upload_img);
        		var_dump($insert_array);
        //to insert in two different table
        			if($a->insertinto_db($table,$insert_array))
						{
							echo "Record inserted successfully</br>";
							header("Location:Shoptable.php");
							exit();
						}
						else
						{
							echo "Error while inserting record </br>";
						}
					
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/CSS/cms.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<title>Shop CMS</title>
	
</head>
<body>
		<div class="container">
        <?php include("sidebar.php")?>
        	<div class="maindiv">
	
                		<h1 id="t1">Add a Product</h1>
						<form id="Shop_form" action=" " method="post" enctype="multipart/form-data" class="border border-light">
						<div id="featured">
							<input type="hidden" value="featured_product" name="featured">
							<div>
								<label  class="lab" for="exampleFormControlFile1">Product Name:</label></br>
								<input type="text" name="Productname" class="form-control ib" />
							</div>
							<div>
								<label  class="lab" for="exampleFormControlFile1">Product Price:</label></br>
								<input type="text" name="Productprice" class="form-control ib" />
							</div>
							<div>
								<label  class="lab" for="exampleFormControlFile1">Product Image:</label></br>
								<input type="file" name="Productimg" class="form-control ib" />
							</div></br>
							<div>
								<select  name="product_type" class="form-select is" aria-label="Default select example">
  										<option selected>Open this select menu</option>
  										<option value="featured_product">Featured_Product</option>
										<option value="newarrival_product">NewArrival_Product</option>
 								</select>
 							</div>					
						</div>
						<br>
				<input type="Submit" class="btn btn-danger" id="shopbtn" name="submit" value="Save" >
			</form>
			</div>
		</div>

</body>
</html>