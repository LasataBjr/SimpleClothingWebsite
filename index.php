<?php
	require_once("useful_func.php");
	$a = new useful_func(); //creating object
	//checking if the database contains the data or not
	$table = 'home_page';
	$img_path = "Assets/Images/upload_img/";
	$home = $a->fetch_multiple_data($table);
	$content = $home[0]['Home_content'];
	$setting = $a->fetch_multiple_data('setting');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Clothing Store</title>
	<link rel="stylesheet" type="text/css" href="Assets/CSS/style.css">
	<script type="text/javascript" src="assets/js/style.js"></script>
</head>
<body>
	<nav class="header">
		<div>
			<a href="#"><img src="<?php echo $img_path.$setting[0]['site_Logo'];?>" class="logo" alt=""></a>
		</div>
		<div>
		<ul id="navbar">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="shop.php">Shop</a></li>
		</ul>
		</div>
	</nav>
	<div id="content">
		<img src="<?php echo $img_path.$home[0]['Background_img']; ?>" id="background_img">
		<div id="intro">
		<h3>Welcome to our website</h3>
			<p><?php echo $content; ?></p>
			<button><a href="about.php">Read More</a></button>
		</div>
	</div>
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