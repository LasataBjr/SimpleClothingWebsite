<?php
session_start();
	require_once("useful_func.php");
		$a = new useful_func();
		$img_path = "Assets/Images/upload_img/";
		if(isset($_GET['row']))
		{	
			$id = $_GET['row'];
			$table = "featured_product";
			$id_name = "SN";
			$data = $a->fetch_rowdata($table,$id,$id_name);

		}
			
	if(isset($_POST['submit']))
	{
		global $con;
		$shop_id = $_POST['featured'];	
		$name = $_POST['Productname'];
		$price = $_POST['Productprice'];
		$upload_img = "";
		$old_img = $_POST['old_image'];

		if(!empty($_FILES['Productimg']['name']))
		{
			// checking if img upload is done with out error
			if($_FILES['Productimg']['error'] == UPLOAD_ERR_OK)
			{
				$img_path = "Assets/Images/upload_img/";
				$imgname = $_FILES['Productimg']['name'];
				$temp_imgname = $_FILES['Productimg']['tmp_name'];

				//calling function to upload img
				$upload_img = $a->insertimg_db($img_path,$imgname,$temp_imgname);

				//deleting old banner image
				unlink($img_path.$old_img);
			}
			else
			{
				echo "Error:".$_FILES['Productimg']['error'];
			}
		}
		else
		{
			$upload_img = $old_img; //if it is empty then the same old will display
		}	
		//updating value in db
		$update_array = array("P_Name"=>$name ,
							  "P_Price"=>$price,
							  "P_Image"=>$upload_img);
			print_r($update_array);
		if($a->update_row($table, $update_array, $id_name, $shop_id))
		{
			echo "Record updated successfully</br>";
			header("Location:shoptable.php");
			exit();

		}
		else
		{
			echo "Error while updating record </br>";
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
	<title>Featured Product Edit</title>
</head>
<body>
	<!-- ?php require_once("sidebar.php")?> -->
	<?php if(!empty($data))
		{
	?>
	<div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
	
			<h2 id="Shoph2">Update the Items</h2>
	
		<form action="" method="POST" enctype="multipart/form-data" class="border border-secondary sedit" >	
		<input type="hidden" name="featured" value="<?php echo $data['SN'];?>"/>
		<input type="hidden" name="old_image" value="<?php echo $data['P_Image'];?>"/>
		<div>
			<label  class="lab1" for="exampleFormControlFile1">Product Name:</label></br><input type="text" name="Productname" class="form-control " id="sb" value="<?php echo $data['P_Name'];?>"/>
		</div>
		<div>
			<label  class="lab1" for="exampleFormControlFile1">Product Price:</label></br><input type="text" name="Productprice" class="form-control " id="sb" value="<?php echo $data['P_Price'];?>"/>
		</div>
		<h3 id="Shoph3">Product Image</h3>
		<img src="<?php echo $img_path.$data['P_Image'];?>"  id="bckpimg" class="rounded mx-auto d-block" alt=""/>
		</br>
		<div>
			<input type="file" class="form-control " id="shopeditimg"  name="background_img" />
		</div>
		<input type="submit" class="btn btn-danger " id="sbtn" name="submit" value="Save">
	</form>
	</div>
</div>
	<?php
	   }
		else{
			echo"No records found";
		}
	?>
	
</body>
</html>

