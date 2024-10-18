
<?php
	require_once("useful_func.php");
	$a = new useful_func(); //creating object
	$setting = $a->fetch_multiple_data('setting');
	$gallery = $a->fetch_multiple_data('gallery');
	$img_path = "Assets/Images/upload_img/";
	$fob = array();
	$slider = array();
	for ($i=0; $i <	sizeof($gallery) ; $i++) { 
		if($gallery[$i]['Col_Name'] == "Face of Brand"){
			array_push($fob, $gallery[$i]['Gallery_Img']);
		}else if ($gallery[$i]['Col_Name'] == "Slider") {
			array_push($slider, $gallery[$i]['Gallery_Img']);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Online Clothing Store</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>
<body>
	<nav class="header">
		<div>
			<a href="index.php"><img src="<?php echo $img_path.$setting[0]['site_Logo'];?>" class="logo" alt=""></a>
		</div>
		<div>
		<ul id="navbar">
			<li><a href="index.php">Home</a></li>
			<li><a class="active" href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="shop.php">Shop</a></li>
		</ul>
		</div>
	</nav>
	<div class="hero-sections">
        <p>Your Style Is Our Style</p>
    </div>
    <div class="shop-section">
        <div class="box">
            <div class="box-content">
                <h2 class="name">Face of the Brand</h2>
                <div class="box-img">
                	<img src="<?php echo $img_path.$fob[0];?>">
                </div>
                <!--button class="b" onclick="show()">More</button>
                <div class="modal" id="popup1">
					<div id="popup-content1">
					<h2 align="center">More Info</h2>
					<span class="BT" id="close1" onclick="hide()">X</span>
        			<p class="text">She was referred to as “China’s first genuine supermodel” in 2012 by The New York Times. Liu Wen was the first Chinese model to walk in the Victoria’s Secret Fashion Show, the first representative of the East Asian region for Estée Lauder Cosmetics and the first Asian model to ever make Forbes magazine’s annual list of the highest-paid models. </p>
					</div>
				</div-->
                
            </div>
        </div>
        <div class="box">
            <div class="box-content" >
            	<h2 class="name">Our Ambassadors</h2>
            	<div class="box-img slider">
            		<?php 
            			foreach($slider as $x){
            				echo '<div class="slide"><img src="'.$img_path.$x.'" ></div>';
            			}
            		 ?>
            		<!--<div class="slide"><img src="assets/images/model.jpg" ></div>
            		<div class="slide"><img src="assets/images/model1.jpg"></div>
            		<div class="slide"><img src="assets/images/model2.jpg"></div>
            		<div class="slide"><img src="assets/images/model3.jpg"></div>
            	-->
            	</div>
            	<button class="b1" onclick="control(-1)">Previous</button>
            	<button class="b1 b2" onclick="control(1)">Next</button>
            </div>
   		</div>
        <div class="box">
            <div class="box-content">
                <h2 class="name">Face of the Brand</h2>
                <div class="box-img">
                	<img src="<?php echo $img_path.$fob[1];?>">
                </div>
                <!--button class="b" onclick="open()">More</button>
                <div id="popup2">
					<div id="popup-content2">
					<span class="BT" id="close2" onclick="close()">X</span>
					<h2 align="center">More Info</h2>
					<p> Barrett has long been a popular It model in his native Australia; he was initially recognized when he was just 14 years old. Barrett was named the Breakthrough Model of the Year by Models.com in 2015. She has walked the catwalk and been in periodicals for brands including Versace, BOSS, Tommy Hilfiger, Balmain, and many more. </p>
					</div>
				</div-->
            </div>
        </div>
    </div>
   <script type="text/javascript" src="assets/js/style.js"></script>
</body>
<footer class="tf1">
	<div class="col">
		<img src="<?php echo $img_path.$setting[0]['site_Logo'];?>" class="logo" alt="">
		<h2 class="topic">Contact</h2>
		<p><strong>Address:</strong> <?php echo $setting[0]['address'];?></p>
		<p><strong>Phone:</strong> <?php echo $setting[0]['contact_number'];?></p>
		<p><strong>Working Hours:</strong> <?php echo $setting[0]['working_hour'];?></p>		
	<div class="follow">
		<h3 class="topic">Follow Us</h3>
		<div >
		<a href="<?php echo $setting[0]['facebook'];?>"> <img class="icon" src="Assets/Images/fb.png"></a>
		<a href="<?php echo $setting[0]['instagram'];?>"> <img class="icon" src="Assets/Images/ig.png"></a>
		<a  href="<?php echo $setting[0]['youtube'];?>"> <img class="icon" src="Assets/Images/yt.png"></a>
		</div>
	</div>
	</div>
	<div class="col about">
		<h2 class="topic">Activity</h2>
		
		<a href="#">Delivery Information</a>
		<a href="#">Terms & Condition</a>
		<a href="#">Contact Us</a>
		<h2 class="topic">Store International</h2>
		<a href="#"><img src="assets/images/Nepal.png" class="flag" alt="">
		<img src="assets/images/bhutan.png" class="flag" alt="">
		<img src="assets/images/pakistan.png" class="flag" alt=""></a>
	</div>
	<div class="col install">
		<h2 class="topic">Install App</h2>
		<p>From App Store or Google Play</p>
		<div class="pic">
			<a href="https://www.apple.com/"><img class="app" src="assets/images/app1.png" alt=""></a>
			<a href="https://play.google.com/store/games"><img class="app" src="assets/images/app2.png" alt=""></a>
		</div>	
		<div id="payment">
			<h2 class="topic">Secured Payment Gateways</h2>
			<a href="#"><img class="pay" src="assets/images/visa.jpg" alt="">
			<img class="pay" src="assets/images/cod.jpg" alt="">
			<img class="pay" src="assets/images/mastercard.png" alt=""></a>
		</div>
	</div>
</footer>



</html>