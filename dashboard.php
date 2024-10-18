<?php 
    session_start();
    require_once("useful_func.php");
    $a = new useful_func(); //creating object
    $a->checklogin();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/CSS/cms.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <title>Dashboard</title>
</head>
<body>
    
    <div class="container">
        <?php include("sidebar.php")?>
        <div class="maindiv">
            <div id="hash">
                        <?php echo"<h2>Welcome,". $_SESSION['Username']." to the page</h2>";?>
            </div><br><br><br>
            <div class="stats">
                <div class="stat-box">
                    <div class="icon new-order-icon"></div>
                    <div class="text">
                        <div>New Order</div>
                        <div>123</div>
                    </div>
                </div>
                <div class="stat-box">
                    <div class="icon visitors-icon"></div>
                    <div class="text">
                        <div>Visitors</div>
                        <div>100</div>
                    </div>
                </div>
                <div class="stat-box">
                    <div class="icon sales-icon"></div>
                    <div class="text">
                        <div>Sales</div>
                        <div>560</div>
                    </div>
                </div>
            </div>
        
       </div>
    </div>
    
                       
</body>
</html>





