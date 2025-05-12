<?php
session_start();
	error_reporting(E_ALL);/*controlstitle which types of errors, warnings, and notices should be reported (either to 							screen or to logs).*/
	require_once("useful_func.php");
	$a = new useful_func(); 
	$a->checklogin();
	
	$table = "featured_product_tb";
	$tab = "newarrival_product_tb";
	$img_path = "Assets/Images/upload_img/";
	$select = $a->fetch_multiple_data($table);//to show the inserted/updated value in table format
	$sel = $a->fetch_multiple_data($tab);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/CSS/cms.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

	<title>Display</title>
	
</head>
<body>
	<div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
        
					<button id="add" class="btn btn-secondary"><a href="Shop_cms.php">Add New Item</a></button>
					<br>
					<div id="featured">
						<h2>Featured Product List</h2>
						<div class="shoptb" >
						<table  class="table table-hover table-bordered bg-light tb" >
							<thead class="table-secondary th">
								<tr>
									<th>S.N</th>
									<th>Name</th>
									<th>Price</th>
									<th>Image</th>
									<th>Action</th>
							    </tr>
							</thead>
							<tbody class="tbo">
								<?php
									foreach($select as $y)
									{

										$sn = $y['SN'];
										$title = $y['P_Name'];
										$price = $y['P_Price'];
										$img = $y['P_Image'];
										
										echo"
											 <tr>
											 <td>".$sn."</td>
											 <td>".$title."</td>
											 <td>".$price."</td>
											 <td><div><img src='".$img_path.$img."' width=100 height=100></div></td>
											 <td><button class='btn btn-dark bttn'><a href='Shop_cmsedit.php?row=".$sn."'>Edit</a></button> | <button class='btn btn-dark bttn'><a href='Shop_delete.php?row=".$sn."'>Delete</a></button></td>
											 </tr>";
									}
								?>
							</tbody>
							</table>
							</div>
					</div><br><br>

					<div id="newarrival">
						<h2>New Arrival Product List</h2>
						<div class="shoptb" >
						<table class="table table-hover table-bordered bg-light tb">
							<thead class="table-secondary th">
								<tr>
									<th>S.N</th>
									<th>Name</th>
									<th>Price</th>
									<th>Image</th>
									<th>Action</th>
							    </tr>
							</thead>
							<tbody class="tbo">
								<?php
									foreach($sel as $z)
									{

										$SN = $z['SN'];
										$Title = $z['P_Name'];
										$Price = $z['P_Price'];
										$Img = $z['P_Image'];
										
										echo"
											 <tr>
											 <td>".$SN."</td>
											 <td>".$Title."</td>
											 <td>".$Price."</td>
											 <td><div><img src='".$img_path.$Img."' width=100 height=100></div></td>
											 <td><button class='btn btn-dark bttn'><a href='shopedit.php?row=".$SN."'>Edit</a></button> |<button class='btn btn-dark bttn'> <a href='shopdelete.php?row=".$SN."'>Delete</a></td></button>
											 </tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
</body>
</html>