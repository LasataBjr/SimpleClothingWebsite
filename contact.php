<?php
		require_once("useful_func.php");
		$a = new useful_func();
		$setting = $a->fetch_multiple_data('setting_tb');
		$img_path = "Assets/Images/upload_img/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Clothing Store</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/jquery/jquery.js"></script>
	<script type="text/javascript" src="assets/jquery/jquery-validate.js"></script>
	<script type="text/javascript" src="assets/jquery/custom.js"></script>

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
			<li><a href="about.php">About</a></li>
			<li><a class="active" href="contact.php">Contact</a></li>
			<li><a href="shop.php">Shop</a></li>
		</ul>
		</div>
	</nav>

			<div class="contanctForm">
			   		<form id="contact" method="get">
			   			<h3>Contact Us</h3>
			   					<input type="text" id="name" name="name" placeholder="Username" > <br>  
			   		  			<p id="error" class="warning"></p> 
			   		  		
			   				
			   		  			<input type="text" id="address" name="address" placeholder="Address" > <br> 
			   		  			<p id="error1" class="warning"></p> 
			   		  		
			   		  		
  								<input type="email" id="email" name="email" placeholder="Email Id" > <br> 
  								<p id="error2" class="warning"></p>
  							
  							
  								<input type="password" id="password" name="password" placeholder="Password" > <br> 
  								<p id="error3"class="warning"></p> 
  							
			   		  			<textarea row="4" id="text" name="text" placeholder="How can we help you?"></textarea><br>			   		  			 
			   				
			   		  			<input type="submit" id="submit" value="Submit">
			   				
			  		</form>
			</div>

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