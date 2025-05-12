<?php
	session_start();
	require_once("useful_func.php");
	$a = new useful_func();
	$home_content = $a->fetch_multiple_data('home_page_tb');
	$col_name = 'Homepage_id';
	$table = 'home_page_tb';
	$img_path = "Assets/Images/upload_img/";
	if(isset($_POST['submit']))
	{
		global $con;
		$home_id = $_POST['Homepage_id'];	
		$content = $_POST['home_content'];
		$upload_img = "";
		$old_img = $_POST['oldbackground_img'];

		if(!empty($_FILES['background_img']['name']))
		{
			// checking if img upload is done with out error
			if($_FILES['background_img']['error'] == UPLOAD_ERR_OK)
			{
				$img_path = "Assets/Images/upload_img/";
				$imgname = $_FILES['background_img']['name'];
				$temp_imgname = $_FILES['background_img']['tmp_name'];

				//calling function to upload img
				$upload_img = $a->insertimg_db($img_path,$imgname,$temp_imgname);

				//deleting old banner image
				unlink($img_path.$old_img);
			}
			else
			{
				echo "Error:".$_FILES['background_img']['error'];
			}
		}
		else
		{
			$upload_img = $old_img; //if it is empty then the same old will display
		}	
		//updating value in db
		$update_array = array("Background_img"=>$upload_img,
							  "Home_content"=>$content);
			
		if($a->update_row($table, $update_array, $col_name, $home_id))
		{
			echo "Record updated successfully</br>";
			header("Location:home_edit.php");

		}else
		{
			echo "Error while updating record </br>";
		}
	}		
			
?>
<html>
<head>
	<title>Home Edit Page</title>
	<link rel="stylesheet" type="text/css" href="assets/CSS/cms.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
				<div class="container">
      				  <?php include("sidebar.php")?>
        		<div class="maindiv">
                	
                		<h2 id="homeedith2">Home Edit Page</h2>
                				<div>
									<form id="Homeedit" method = "post" action="" enctype="multipart/form-data" class="border border-secondary">

								<input type="hidden" name="Homepage_id" value="<?php echo $home_content[0]['Homepage_id']?>"/>
								<input type="hidden" name="oldbackground_img" value="<?php echo $img_path.$home_content[0]['Background_img']?>"/>
								<div class="form-group" >
								<label class="homeedit_h3" for="exampleFormControlFile1">Background Image</label>
								<img id="bckimg" class="rounded mx-auto d-block" src="<?php echo $img_path.$home_content[0]['Background_img'];?>"  alt=""></br></br>
									</div>
								<div class="form-group" >
								<label class="homeedit_h3" for="exampleFormControlFile1">Update Image</label></br>
								<div ><input type="file" class="form-control" id="homeditimg" name="background_img" /></div></br></br>
								</div>
								<div class="form-group" >
								<label class="homeedit_h3" for="exampleFormControlFile1">Content</label></br><textarea id="hometxt" class="form-control" row ="25" cols="30" name="home_content"/><?php echo $home_content[0]['Home_content'];?></textarea></br>

								<input id="editbtn" type="submit" name="submit" class="btn btn-light" value="Edit">
								</div>
							</form>
						</div>
					</div>
				</div>
				
</body>
</html>