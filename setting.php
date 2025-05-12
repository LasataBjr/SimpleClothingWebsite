<?php
	session_start();
	require_once("useful_func.php");
	$a = new useful_func(); //creating object
	
	//$a->test_function();
	//checking if the database contains the data or not
	$table = 'setting_tb';
	$setting = $a->fetch_multiple_data($table);
	if(!empty($setting))
	{
		header("Location:setting_edit.php");
		exit();
	}

	if(isset($_POST['submit']))
	{
			global $con;		
			$facebook_link = $_POST['facebook_link'];  
			$working_hour = $_POST['working_hour']; 
		    $insta_link = $_POST['insta_link']; 
		    $yt_link = $_POST['yt_link']; 
		    $address = $_POST['address']; 
			$contact=$_POST['contact'];
		// checking if img upload is done with out error
		if($_FILES['site_logo']['error'] == UPLOAD_ERR_OK)
		{
			$img_path = "Assets/Images/upload_img/";
			$imgname = $_FILES['site_logo']['name'];
			$temp_imgname = $_FILES['site_logo']['tmp_name'];
			$upload_img = $a->insertimg_db($img_path,$imgname,$temp_imgname);
		}
		else
		{
			echo "Error:".$_FILES['site_logo']['error'];
		}
			$insert_array = array(
															'site_Logo'=>$upload_img,
														  'address'=>$address,
														  'working_hour'=>$working_hour,
														  'contact_number'=>$contact,
															'facebook'=>$facebook_link,
															'instagram'=>$insta_link,
															'youtube'=>$yt_link
														);
			
		if($a->insertinto_db($table,$insert_array))
		{
			echo "Record inserted successfully</br>";
		}
		else
		{
			echo "Error while inserting record </br>";
		}
	}		
			
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/CSS/cms.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<title>Setting page</title>
</head>
<body>
	<div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
		<h1 class="seth">Setting Page</h1>
		<form class ="set" method = "post" action="" enctype="multipart/form-data" class="border border-light">
			<div id="logo">
				<label  class="lab1" for="exampleFormControlFile1">Logo:</label></br><input class="form-control " id="sb" type="file" name="site_logo"/>
			</div>
		<h2 class="seth">Contact</h2>
			    <div class="contact">
	                <label  class="lab1" for="exampleFormControlFile1">Address:</label></br> <input type="text" class="form-control " id="sb" name="address"  >
	                <label  class="lab1" for="exampleFormControlFile1">Working hours:</label></br><input type="text" class="form-control " id="sb" name="working_hour" >
	                <label  class="lab1" for="exampleFormControlFile1">Contact number:</label></br> <input type="text" class="form-control " id="sb" name="contact">
	            </div></br>
	  	<h2 class="seth">Link</h2>
	   			<div class="link">
	                  <label  class="lab1" for="exampleFormControlFile1">Facebook:</label></br> <input type="text" name="facebook_link" class="form-control " id="sb" >
	                  <label  class="lab1" for="exampleFormControlFile1">Instagram:</label></br> <input type="text" name="insta_link" class="form-control " id="sb">
	                  <label  class="lab1" for="exampleFormControlFile1">Youtube:</label></br> <input type="text" name="yt_link" class="form-control " id="sb">
	            </div><br>
		<input type="submit" class="btn btn-danger" id="settingbtn" name="submit" value="Save">
	</form>
</div>
</div>
</body>
</html>
