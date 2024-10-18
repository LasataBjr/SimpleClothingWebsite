<?php
	session_start();
	require_once("useful_func.php");
	
	$a = new useful_func();
	$a->checklogin();
	$col_name = 'SN';
	$table = 'setting';
	$img_path = "Assets/Images/upload_img/";
	$content = $a->fetch_multiple_data($table);
	
	if(isset($_POST['submit']))
	{
		global $con;
		$setting_id = $_POST['Settingpage_id'];	
		$facebook_link = $_POST['facebook_link'];  
		$working_hour = $_POST['working_hour']; 
	    $insta_link = $_POST['insta_link']; 
	    $yt_link = $_POST['yt_link']; 
	    $address = $_POST['address']; 
		$contact=$_POST['contact'];
		$upload_img = "";
		$old_img = $_POST['oldlogo'];
		if(!empty($_FILES['logo_img']['name']))
		{
			// checking if img upload is done with out error
			if($_FILES['logo_img']['error'] == UPLOAD_ERR_OK)
			{
				$img_path = "Assets/Images/upload_img/";
				$imgname = $_FILES['logo_img']['name'];
				$temp_imgname = $_FILES['logo_img']['tmp_name'];

				//calling function to upload img
				$upload_img = $a->insertimg_db($img_path,$imgname,$temp_imgname);

				//deleting old banner image
				unlink($img_path.$old_img);
			}
			else
			{
				echo "Error:".$_FILES['logo_img']['error'];
			}
		}
		else
		{
			$upload_img = $old_img; //if it is empty then the same old will display
		}	
		//updating value in db
		$update_array = array(
								'site_Logo'=>$upload_img,
								'address'=>$address,
								'working_hour'=>$working_hour,
								'contact_number'=>$contact,
								'facebook'=>$facebook_link,
								'instagram'=>$insta_link,
								'youtube'=>$yt_link
							 );
			
		if($a->update_row($table, $update_array, $col_name, $setting_id))
		{
			echo "Record updated successfully</br>";
			header("Location:setting_edit.php");

		}else
		{
			echo "Error while updating record </br>";
		}
	}		
			
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/CSS/cms.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<title>Setting Edit Page</title>
</head>
<body>
	<div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
		<h1 class="seth">Setting Edit</h1>

	<form id="setedit" method = "post" action="" enctype="multipart/form-data"  class="border border-light">

		<input type="hidden" name="Settingpage_id" value="<?php echo $content[0]['SN'];?>"/>
		<input type="hidden" name="oldlogo" value="<?php echo $img_path.$content[0]['site_Logo'];?>"/>
			<div id="logo">
				<h2 class="tt">Logo</h2>
				<img class="rounded mx-auto d-block" src="<?php echo $img_path.$content[0]['site_Logo'];?>"  width= "300" height= "200" alt=""></br>
				<label  class="lab1" for="exampleFormControlFile1">Choose a file:</label><br><input type="file" class="form-control " id="sb" name="logo_img"/></div></br>
			
				<h2 class="tt">Contact</h2>
					<div class="contact">
	                <label  class="lab1" for="exampleFormControlFile1">Address:</label></br><input class="form-control " id="sb" type="text" name="address" value="<?php echo $content[0]['address'];?>" >
	                <label  class="lab1" for="exampleFormControlFile1">Working hours:</label></br><input type="text" class="form-control " id="sb" name="working_hour" value="<?php echo $content[0]['working_hour'];?>">
	                <label  class="lab1" class="form-control " for="exampleFormControlFile1">Contact number:</label></br> <input type="text" class="form-control " id="sb" name="contact" value="<?php echo $content[0]['contact_number'];?>"><br>
	         		</div>
	  		
	  				<h2 class="tt">Link</h2>
	   					<div class="link">
	                  <label  class="lab1" for="exampleFormControlFile1">Facebook:</label><input type="text" class="form-control " id="sb" name="facebook_link" value="<?php echo $content[0]['facebook'];?>" >
	                  <label  class="lab1" for="exampleFormControlFile1">Instagram:</label></br><input type="text" class="form-control " id="sb" name="insta_link" value="<?php echo $content[0]['instagram'];?>">
	                  <label  class="lab1" for="exampleFormControlFile1">Youtube:</label></br> <input type="text" class="form-control " id="sb" name="yt_link" value="<?php echo $content[0]['youtube'];?>">
	         		 </div> 
	    
		<input type="submit" class="btn btn-danger" id="setbtn" name="submit" value="Edit">
	</form>
</div>
</div>
</body>
</html>
