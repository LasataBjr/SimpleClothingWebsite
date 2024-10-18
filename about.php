<?php
	require_once("useful_func.php");
	$a = new useful_func(); //creating object
	$setting = $a->fetch_multiple_data('setting');
	$about = $a->fetch_multiple_data('about');
	$img_path = "Assets/Images/upload_img/";

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Clothing Store</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/style.js"></script>
</head>
<body>
	<nav class="header">
		<div>
			<a href="index.php"><img src="<?php echo $img_path.$setting[0]['site_Logo'];?>" class="logo" alt=""></a>
		</div>
		<div>
		<ul id="navbar">
			<li><a href="index.php">Home</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a class="active" href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="shop.php">Shop</a></li>
		</ul>
		</div>
	</nav>
<section id="aboutp">	
	<h2 id="abt1">Our Story</h2>
	<div id="play">
		<img src="<?php echo $img_path.$about[0]['Main_Img'];?>" id="group">
		<p class="paragraph"><b>Welcome to Clothing Center, where fashion meets comfort and style!</b>
 					<p class="paragraph">We're excited to introduce you to the world of clothing that's not only trendy 
 					but also designed with your comfort.</p>
 	</div>
 	<div id="row">
			<div class="column">
				<h3 class="bold" align="center">Who We Are?</h3>
				<img src="<?php echo $img_path.$about[0]['First_Img'];?>" width="150px" height="150px" class="image-box">
				<p class="text"><?php echo $about[0]['First_txt'];?></p>
			</div>
			<div class="column">
				<h3 class="bold"  align="center">Our Vision?</h3>
				<img src="<?php echo $img_path.$about[0]['Sec_Img'];?>" width="150px" height="150px" class="image-box">	
				<p class="text"><?php echo $about[0]['Sec_txt'];?></p>
				<button class="BT" name="show" onclick="openup()">Show More</button>
				<div class="modal" id="popup">
					<div class="popup-content">
					<h2 align="center">More Info</h2>
					<button class="BT" id="close" onclick="closeup()">&times;</button>
					<h2 id="pop">"Where Fashion Meets Passion."</h2>
        			<p class="text"><!--"Dress to Impress,Shop to Express"--> "A journey born out of a deep love for fashion and a commitment to redefine the clothing industry.<b>In the Beginning</b>, it all started with a dream and a sewing machine in a small boutique.Back in year 2015, our teams embarked on a mission to create clothing that blended style with comfort effortlessly. They beleived that fashion should not only look good but feel good too."</p>
					</div>
				</div>
			</div>
			<div class="column">
				<h3 class="bold" align="center">What We Do?</h3>
				<img src="<?php echo $img_path.$about[0]['Third_Img'];?>" width="150px" height="150px" class="image-box">	
				<p class="text"><?php echo $about[0]['Third_txt'];?></p>
			</div>
	</div>
	<section id="CEO_abt">
	<div id="ceo">
		<div id="ceo_img">
		<img src="<?php echo $img_path.$about[0]['CEO_Img'];?>" id="c">
		</div>
		<div id="ceo_info">
		<h2 class="top"> CEO</h2>
		<p><b><?php echo $about[0]['CEO_txt'];?></b></p>
		</div>
	</div>
	</section>
	<section id="MEM_abt">
	<div id="member">
		<div id="mem_img">
		<img src="<?php echo $img_path.$about[0]['Mem_Img'];?>" id="mem">
		</div>
		<div id="mem_info">
		<h2 class="top"> Members</h2>
		<p><b><?php echo $about[0]['Mem_txt'];?></b></p>
		</div>
	</div>
	</section>
</section>      
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