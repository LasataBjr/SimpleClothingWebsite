<?php
    session_start();
    require_once("useful_func.php");
    $a = new useful_func(); //creating object
    $a->checklogin();
    //$a->test_function();
    //checking if the database contains the data or not
    $table = 'about_tb';
    $img_path = "Assets/Images/upload_img/";
    $about = $a->fetch_multiple_data($table);
    if(!empty($about))
    {
        header("Location:about_edit.php");
        exit();
    }
    if(isset($_POST['submit']))
    {
        global $con;
        $first_section = $_POST['First_content'];
        $first_section = addcslashes($first_section, ";'.");
        $second_section = $_POST['Second_content'];
        $second_section = addcslashes($second_section, ";'.");
        $third_section = $_POST['Third_content'];
        $third_section = addcslashes($third_section, ";'.");
        $ceo_section = $_POST['CEO_content'];
        $ceo_section = addcslashes($ceo_section, ";'.");
        $member_section = $_POST['Mem_content'];
        $member_section = addcslashes($member_section, ";'.");
        $mainimg = 'main_img';
        $Firstimg = 'First_img';
        $Secimg = 'Sec_img';
        $Thirdimg = 'Third_img';
        $CEOimg = 'CEO_img';
        $Memimg = 'Mem_img';
        $main = $a->image_check($img_path,$mainimg);
        $first = $a->image_check($img_path,$Firstimg);
        $sec = $a->image_check($img_path,$Secimg);
        $third = $a->image_check($img_path,$Thirdimg);
        $CEO = $a->image_check($img_path,$CEOimg);
        $Mem = $a->image_check($img_path,$Memimg);
        if($main && $first && $sec && $third && $CEO && $Mem){
        $insert_array = array(
                                "Main_Img" =>  $main,
                                "First_txt" =>  $first_section,
                                "First_Img" =>  $first,
                                "Sec_txt" =>   $second_section,
                                "Sec_Img" =>  $sec,
                                "Third_txt" =>  $third_section,
                                "Third_Img" =>   $third,
                                "CEO_txt" =>  $ceo_section,
                                "CEO_Img" => $CEO,
                                "Mem_txt" =>  $member_section,
                                "Mem_Img" => $Mem
                              );
                if($a->insertinto_db($table,$insert_array))
                        {
                            echo "Record inserted successfully</br>";
                           // header("Location:about_cms.php");
                           // exit();
                        }
                        else
                        {
                            echo "Error while inserting record </br>";
                        }
            }else{
                echo "Error while uploading file";
            }

    }    




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/CSS/cms.css">
    

    <title>About CMS</title>
</head>
<body>
    <div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
         <h2 id="abttop">Insert the Data</h2>
         <div id="addabt">
            <form  id="about" action=" " method="post" enctype="multipart/form-data" enctype="multipart/form-data" class="border border-black">
        <div id="sec">
            <h2 class="abouth">Our Story</h2>
            <input type="file" name="main_img" class="form-control sec">
        </div><br><br>
        <h3 class="abouth">Sub Sections</h3>
        <div id="row">
            
            <div class="column">
            <h4 class="abouth">Section 1</h4>
            <label  class="" for="exampleFormControlFile1">Content:</label></br><textarea row ="10" col="10" type="textarea" class="form-control" name="First_content"></textarea></br>
            <label  class="" for="exampleFormControlFile1">Image:</label></br><input type="file" name="First_img" class="form-control ab"><br>
            </div>
            <div class="column">
            <h4 class="abouth">Section 2</h4>
            <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea row ="10"  col="10" type="textarea" class="form-control" name="Second_content"></textarea></br>
            <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="Sec_img" class="form-control ab"><br>
            </div>
            <div class="column">
            <h4 class="abouth">Section 3</h4>
            <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea class="form-control" row ="10" col="10" type="textarea" name="Third_content"></textarea></br>
            <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="Third_img" class="form-control ab"><br>
            </div>
        </div><br><br>
        <div id="secb">
            <div class="col">
            <h3 class="abouth">CEO</h3>
            <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea class="form-control"row ="10" col="10" type="textarea" name="CEO_content"></textarea></br>
            <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="CEO_img" class="form-control ab"><br>
            </div>
            <div class="col">
            <h3 class="abouth">Member</h3>
            <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea class="form-control"row ="10" col="10" type="textarea" name="Mem_content"></textarea></br>
           <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="Mem_img" class="form-control ab"><br>
            </div>
        </div>
        <input type="submit" class="btn btn-danger" id="abtn" name="submit" value="Save">
    </form>

</div>

</body>
</html>