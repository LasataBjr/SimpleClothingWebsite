<?php
    session_start();
    require_once("useful_func.php");
    $a = new useful_func(); //creating object
    $a->checklogin();
    //$a->test_function();
    //checking if the database contains the data or not
    $table = 'gallery';
    $img_path = "Assets/Images/upload_img/";
    $gallery = $a->fetch_multiple_data($table);
    if(isset($_POST['submit']))
    {
        global $con;
        $input = $_POST['first'];
        $other = $_POST['second'];
        $FaceofBrand = 'Face_img';
        $Slider = 'Slider_img';
        $face = $a->image_check($img_path, $FaceofBrand);
        $slider = $a->image_check($img_path, $Slider);
         if($face)
         {
            $insert_array1 = array(
                                    "Col_Name" => $input,
                                    "Gallery_Img" =>  $face
                                              
                              );

             if($a->insertinto_db($table,$insert_array1))
                        {
                            echo "Record inserted successfully</br>";
                            header("Location:Gallerytable.php");
                            exit();
                        }
                        else
                        {
                            echo "Error while inserting record </br>";
                        }
         }

         if($slider)
         {

            $insert_array2 = array(
                                    "Col_Name" => $other,
                                    "Gallery_Img" => $slider
                                              
                              );

        
                       if($a->insertinto_db($table,$insert_array2))
                        {
                            echo "Record inserted successfully</br>";
                            header("Location:Gallerytable.php");
                            exit();
                        }
                        else
                        {
                            echo "Error while inserting record </br>";
                        }  

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

    <title>Gallery CMS</title>
</head>
<body>
    <div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
            <h1 class="gin">Upload image </h1>
            <div id="Addimg">

         <form  action="" method="POST" enctype="multipart/form-data" class="border border-secondary gint">
        <h2 class="gin">Face of Brand</h2>
        <div class="form-group">
            <input type="hidden" value="Face of Brand" name="first">
            <label  class="ll" for="exampleFormControlFile1">Choose an img:</label></br><input  class="gt" type="file" class="input" class="form-control" name="Face_img" >
        </div>        
        <br>
        <h2 class="gin">Slider</h2>
        <div class="form-group">
            <input type="hidden" value="Slider" name="second">
            <label  class="ll" for="exampleFormControlFile1">Choose an img:</label></br><input class="gt" type="file" class="input" class="form-control" name="Slider_img" >
        </div>
        </br>
            <input type="submit" name="submit" value="Insert" class="btn btn-danger gbtn">
        </form>
    </div>
</div>
</div>

</body>
</html>