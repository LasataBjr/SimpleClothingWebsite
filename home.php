<?php
	session_start();
	require_once("useful_func.php");
	$a = new useful_func(); //creating object
	$a->checklogin();
	//$a->test_function();
	//checking if the database contains the data or not
	$table = 'home_page_tb';
	$home = $a->fetch_multiple_data($table);
	  if(!empty($home))
	    {
		header("Location:home_edit.php");
		exit();
	   }

	if(isset($_POST['submit']))
	{
		global $con;		
		$content = $_POST['home_content'];
		// checking if img upload is done with out error
		if($_FILES['background_img']['error'] == UPLOAD_ERR_OK)
		{
			$img_path = "Assets/Images/upload_img/";
			$imgname = $_FILES['background_img']['name'];
			$temp_imgname = $_FILES['background_img']['tmp_name'];
			$upload_img = $a->insertimg_db($img_path,$imgname,$temp_imgname);
		}
		else
		{
			echo "Error:".$_FILES['background_img']['error'];
		}
			$insert_array = array("Background_img"=>$upload_img,
								  "Home_content"=>$content);
			
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
	<title>Add Home Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Assets/CSS/cms.css">
    
    
</head>
<body>
	<div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">

	
					<div id="Insert_form" >
						<h2 id="homeh2">Insert into Home Page</h2><br>
						<form id="Home_add" method = "post" action="" enctype="multipart/form-data" class="border border-primary">
							  <div class="form-group" >
							    <label  class="label" for="exampleFormControlFile1">Image:</label></br>
							    <input type="file"  class="form-control" id="HomeImg_insert" name="background_img">
							  </div>
							  <div class="form-group">
					    		<label class="label" for="exampleFormControlTextarea1">Content:</label></br>
					    		<textarea class="form-control" id="HomeContent_insert" rows="3" name="home_content"></textarea></br>
					 		  </div>

						<!-- Choose a file:<input type="file" name="background_img" id="HomeImg_insert"/></br>
						Content:<textarea row ="5" type="textarea" name="home_content" id="HomeContent_insert"/></textarea></br> -->
						<input type="submit" name="submit" value="Add" id="Homeadd_click" class="btn btn-light">
					</form>
				    </div>
				</div>
			</div>
		    
</body>
</html>