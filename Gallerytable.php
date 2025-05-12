<?php
    session_start();
    require_once("useful_func.php");
    $a = new useful_func(); //creating object
    //$a->checklogin();
    //$a->test_function();
    //checking if the database contains the data or not
    $table = 'gallery_tb';
    $img_path = "Assets/Images/upload_img/";
    $gallery = $a->fetch_multiple_data($table);
 ?>
 
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Assets/CSS/cms.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <title>Display</title>
    
</head>
<body>
    <div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
    
    <br>
    <button id="addimg" class="btn btn-secondary"><a href="gallery_cms.php">Add New Item</a></button>
    <div id="inserttb">
        <h2 id="galleryh2">Images</h2>
        
        <div id="gallerytb">
        <table class="table table-hover table-bordered bg-light tbl">
            <thead class="table-secondary thl" >
                <tr>
                    
                    <th>Col_Name</th>
                    <th>Gallery_Img</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tbol">
                <?php
                    foreach($gallery as $y)
                    {

                        $sn = $y['SN'];
                        $col = $y['Col_Name'];
                        $img = $y['Gallery_Img'];
                        echo"
                             <tr>
                             <td>".$col."</td>
                             
                             <td><div><img src='".$img_path.$img."' width=150 height=150></div></td>
                             <td><button class='btn btn-dark bttn'><a href='gallery_edit.php?row=".$sn."'>Edit</a></button> | <button class='btn btn-dark bttn'><a href='gallery_delete.php?row=".$sn."'>Delete</a></button></td>
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