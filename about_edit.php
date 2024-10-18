<?php
    session_start();
    require_once("useful_func.php");
    $a = new useful_func();
    $a->checklogin();
    $col_name = 'SN';
    $table = 'about';
    $img_path = "Assets/Images/upload_img/";
    $content = $a->fetch_multiple_data($table);
    if(isset($_POST['submit']))
    {
        global $con;
        $about_id = $_POST['aboutpage_id']; 
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
        $uploadmain_img = "";
        $uploadfirst_img = "";
        $uploadsecond_img  = "";
        $uploadthird_img = "";
        $uploadceo_img = "";
        $uploadmem_img = "";
        $oldmain_img = $_POST['Main_Img'];
        $oldfirst_img = $_POST['First_Img'];
        $oldsecond_img = $_POST['Sec_Img'];
        $oldthird_img = $_POST['Third_Img'];
        $oldCEO_img = $_POST['CEO_Img'];
        $oldMem_img = $_POST['Mem_Img'];
        
        if(!empty($_FILES[$mainimg]['name']))
        {
            // checking if img upload is done with out error
                 $uploadmain_img = $a->image_check($img_path, $mainimg);
                //deleting old banner image
               if(!empty($uploadmain_img)){ unlink($img_path.$oldmain_img);
            }
            else
            {
                echo "Error:".$_FILES[$mainimg]['error'];
            }
        }
        else
        {
            $uploadmain_img = $oldmain_img; //if it is empty then the same old will display
        }
        if(!empty($_FILES[$Firstimg]['name']))
        {
            // checking if img upload is done with out error
                 $uploadfirst_img = $a->image_check($img_path, $Firstimg);
                //deleting old banner image
               if(!empty($uploadfirst_img)){ unlink($img_path.$oldfirst_img);
            }
            else
            {
                echo "Error:".$_FILES[$Firstimg]['error'];
            }
        }
        else
        {
            $uploadfirst_img = $oldfirst_img; //if it is empty then the same old will display
        }
        if(!empty($_FILES[$Secimg]['name']))
        {
            // checking if img upload is done with out error
                 $uploadsecond_img = $a->image_check($img_path, $Secimg);
                //deleting old banner image
               if(!empty($uploadsecond_img)){ unlink($img_path.$oldsecond_img);
            }
            else
            {
                echo "Error:".$_FILES[$Secimg]['error'];
            }
        }
        else
        {
            $uploadsecond_img = $oldsecond_img; //if it is empty then the same old will display
        }

        if(!empty($_FILES[$Thirdimg]['name']))
        {
            // checking if img upload is done with out error
                 $uploadthird_img = $a->image_check($img_path, $Thirdimg);
                //deleting old banner image
               if(!empty($uploadthird_img)){ unlink($img_path.$oldthird_img);
            }
            else
            {
                echo "Error:".$_FILES[$Thirdimg]['error'];
            }
        }
        else
        {
            $uploadthird_img = $oldthird_img; //if it is empty then the same old will display
        }

        if(!empty($_FILES[$CEOimg]['name']))
        {
            // checking if img upload is done with out error
                 $uploadceo_img = $a->image_check($img_path, $CEOimg);
                //deleting old banner image
               if(!empty($uploadceo_img)){ unlink($img_path.$oldCEO_img);
            }
            else
            {
                echo "Error:".$_FILES[$CEOimg]['error'];
            }
        }
        else
        {
            $uploadceo_img = $oldCEO_img; //if it is empty then the same old will display
        }

        if(!empty($_FILES[$Memimg]['name']))
        {
            // checking if img upload is done with out error
                 $uploadmem_img = $a->image_check($img_path, $Memimg);
                //deleting old banner image
               if(!empty($uploadmem_img)){ unlink($img_path.$oldMem_img);
            }
            else
            {
                echo "Error:".$_FILES[$Memimg]['error'];
            }
        }
        else
        {
            $uploadmem_img = $oldMem_img; //if it is empty then the same old will display
        }  

     if($uploadmain_img && $uploadfirst_img && $uploadsecond_img && $uploadthird_img && $uploadceo_img && $uploadmem_img){  
        $update_array = array(
                                "Main_Img" =>  $uploadmain_img,
                                "First_txt" =>  $first_section,
                                "First_Img" =>  $uploadfirst_img,
                                "Sec_txt" =>   $second_section,
                                "Sec_Img" =>  $uploadsecond_img,
                                "Third_txt" =>  $third_section,
                                "Third_Img" =>   $uploadthird_img,
                                "CEO_txt" =>  $ceo_section,
                                "CEO_Img" => $uploadceo_img,
                                "Mem_txt" =>  $member_section,
                                "Mem_Img" => $uploadmem_img
                             );
            
        if($a->update_row($table, $update_array, $col_name, $about_id))
        {
            echo "Record updated successfully</br>";
            header("Location:about_edit.php");

        }else
        {
            echo "Error while updating record </br>";
        }
        }
        else{
            echo "Error while uploading file";
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
    <title>About CMS</title>
</head>
<body>
    <div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
            <h2 id="abtudp">Update Data</h2>
            <div id="udpabt">
        <form  id="aboutudp" action=" " method="post" enctype="multipart/form-data" class="border border-black">
            <input type="hidden" name="aboutpage_id" value="<?php echo $content[0]['SN'];?>"/>
            <input type="hidden" name="Main_Img" value="<?php echo $content[0]['Main_Img'];?>"/>
            <input type="hidden" name="First_Img" value="<?php echo $content[0]['First_Img'];?>"/>
            <input type="hidden" name="Sec_Img" value="<?php echo $content[0]['Sec_Img'];?>"/>
            <input type="hidden" name="Third_Img" value="<?php echo $content[0]['Third_Img'];?>"/>
            <input type="hidden" name="CEO_Img" value="<?php echo $content[0]['CEO_Img'];?>"/>
            <input type="hidden" name="Mem_Img" value="<?php echo $content[0]['Mem_Img'];?>"/>

                <div id="sec">
                    <h2 id="abtudp">Our Story</h2>
                    <img src="<?php echo $img_path.$content[0]['Main_Img'];?>" class="rounded mx-auto d-block" width= "300" height= "200" alt=""></br></br>
                    <input type="file" name="main_img" class="form-control " id="seca">
                </div><br><br>
                <h2 id="abtudp">Sub Sections</h2>
         <div id="row">
            
            <div class="column">
                <h4 class="abouth">Section 1</h4>
                <label  class="" for="exampleFormControlFile1">Content:</label></br><textarea row ="10" col="10" type="textarea" class="form-control" name="First_content">
                    <?php echo $content[0]['First_txt'];?>
                </textarea><br></br>
                <img src="<?php echo $img_path.$content[0]['First_Img'];?>" class="rounded mx-auto d-block"  width= "200" height= "200" alt=""></br></br>
                <label  class="" for="exampleFormControlFile1">Image:</label></br><input type="file" name="First_img" class="form-control ab"><br>
            </div>
            <div class="column">
                <h4 class="abouth">Section 2</h4>
                <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea row ="10"  col="10" type="textarea" class="form-control" name="Second_content"><?php echo $content[0]['Sec_txt'];?></textarea></br></br>
                    
                <img src="<?php echo $img_path.$content[0]['Sec_Img'];?>" class="rounded mx-auto d-block" width= "200" height= "200" alt=""></br></br>
                <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="Sec_img" class="form-control ab"><br>
            </div>
            <div class="column">
            <h4 class="abouth">Section 3</h4>
            <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea class="form-control" row ="10" col="10" type="textarea" name="Third_content">
                    <?php echo $content[0]['Third_txt'];?>
                </textarea><br></br>
                 <img src="<?php echo $img_path.$content[0]['Third_Img'];?>" class="rounded mx-auto d-block" width= "200" height= "200" alt=""></br></br>
                <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="Third_img" class="form-control ab"><br>
            </div>
        </div><br><br>
        <div id="secb">
            <div class="col">
            <h3 class="abouth">CEO</h3>
            <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea class="form-control"row ="10" col="10" type="textarea" name="CEO_content">
                <?php echo $content[0]['CEO_txt'];?>
            </textarea><br></br>
            <img src="<?php echo $img_path.$content[0]['CEO_Img'];?>" class="rounded mx-auto d-block" width= "200" height= "200" alt=""></br></br>
            <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="CEO_img" class="form-control ab"><br>
            </div>
            <div class="col">
            <h3 class="abouth">Member</h3>
            <label  class="la" for="exampleFormControlFile1">Content:</label></br><textarea class="form-control"row ="10" col="10" type="textarea" name="Mem_content">
                <?php echo $content[0]['Mem_txt'];?>
            </textarea><br></br>
             <img src="<?php echo $img_path.$content[0]['Mem_Img'];?>" class="form-control" width= "200" height= "200" alt=""></br></br>
            <label  class="la" for="exampleFormControlFile1">Image:</label></br><input type="file" name="Mem_img" class="form-control ab"><br>
            </div>
        </div>    
        <input type="submit" class="btn btn-danger" id="abtn" name="submit" value="Save">
    </form>
</div>
</div>
</div>
</body>
</html>
