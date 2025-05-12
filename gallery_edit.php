<?php
session_start();
	require_once("useful_func.php");
    $a = new useful_func(); //creating object
    $a->checklogin();
    //$a->test_function();
    //checking if the database contains the data or not
    $table = 'gallery_tb';
    $img_path = "Assets/Images/upload_img/";
    $id_name = 'SN';
    if(isset($_GET['row']))
		{	
			$id = $_GET['row'];
			$data = $a->fetch_rowdata($table,$id_name,$id);

		}
    if(isset($_POST['submit']))
    {
        global $con;
        $gallery_id = $_POST['SN'];
        $colname = $_POST['colname'];	

		$upload_img = "";
		$old_img = $_POST['old_image'];

		if(!empty($_FILES['New_img']['name']))
		{
			// checking if img upload is done with out error
			if($_FILES['New_img']['error'] == UPLOAD_ERR_OK)
			{
				$img_path = "Assets/Images/upload_img/";
				$imgname = $_FILES['New_img']['name'];
				$temp_imgname = $_FILES['New_img']['tmp_name'];

				//calling function to upload img
				$upload_img = $a->insertimg_db($img_path,$imgname,$temp_imgname);

				//deleting old banner image
				unlink($img_path.$old_img);
			}
			else
			{
				echo "Error:".$_FILES['New_img']['error'];
			}
		}
		else
		{
			$upload_img = $old_img; //if it is empty then the same old will display
		}	
		//updating value in db
		$update_array = array(
                                    "Col_Name" => $colname ,
                                    "Gallery_Img" => $upload_img
                                );
			print_r($update_array);
		if($a->update_row($table, $update_array, $id_name, $gallery_id))
		{
			echo "Record updated successfully</br>";
			header("Location:Gallerytable.php");
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
	<title>Gallery edit</title>
</head>
<body>
	<div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
	<?php if(!empty($data))
		{
	?>
	<h1 class="gin">Update Image</h1>
	<div id="Updateimg">
	<form action="" method="POST" enctype="multipart/form-data" class="border border-secondary upt">
		<input type="hidden" name="SN" value="<?php echo $data['SN'];?>"/>
		<input type="hidden" name="colname" value="<?php echo $data['Col_Name'];?>"/>
		<input type="hidden" name="old_image" value="<?php echo $data['Gallery_Img'];?>"/>
        <h3 class="gh3">Image</h3>
        	<div>
				<img src="<?php echo $img_path.$data['Gallery_Img'];?>" class="rounded mx-auto d-block " width= "200" height= "200" id="gimg" alt=""/>
			</div>
            <label  class="label" for="exampleFormControlFile1">Choose an img:</label></br>
            <input class="form-control" id="glink" type="file" class="input" name="New_img" >
        <br>
        <input type="submit" class="btn btn-danger gbtn" name="submit" value="Save">
            
    </form>
</div>
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