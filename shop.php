<?php
		require_once("useful_func.php");
		$a = new useful_func();
		$table = "featured_product";
		$tab = "newarrival_product";
		$img_path = "Assets/Images/upload_img/";
		$data = $a->fetch_multiple_data($table);
		$result = $a->fetch_multiple_data($tab);
		$setting = $a->fetch_multiple_data('setting');

?>



<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Online Clothing Store</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/style.js"></script>
</head>
<body>
	<script type="text/javascript" src="assets/js/style.js"></script>
	<nav class="header">
		<div>
			<a href="index.php"><img src="<?php echo $img_path.$setting[0]['site_Logo'];?>" class="logo" alt=""></a>
		</div>
		<div>
		<ul id="navbar">
			<li><a href="index.php">Home</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a class="active" href="shop.php">Shop</a></li>
		</ul>
		</div>
	</nav>
<div id="pagehead">
	<h1>#Stayhome</h1>
	<p>Save more with coupons & up to 70% off!</p>
</div>
<section id="pro" class="product">
	<h2 class="slogan">Featured Product</h2>
	<p class="slogan">Summer Collection New Modern Design</p>
	<div id="cloth1" class="pic1">
		<?php foreach ($data as $v) {	?>
		<div class="product-box">
			<img class="p-image" src="<?php echo $img_path.$v['P_Image'];?>">
			<h4 class="p-title"><?php echo $v['P_Name'];?></h4>
			<span class="price"><?php echo $v['P_Price'];?></span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<?php } ?>
		<!--div class="product-box">
			<img class="p-image" src="assets/images/product1.jpg">
			<h4 class="p-title">Summer Dress</h4>
			<span class="price">Rs.2000</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product2.jpg">
			<h4 class="p-title">Short Sleeve Shirt</h4>
			<span class="price">Rs.900</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product3.jpg">
			<h4 class="p-title">All over Print Skirt</h4>
			<span class="price">Rs.1200</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
			
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product4.jpg">
			<h4 class="p-title">One Button Shirt</h4>
			<span class="price">Rs.1700</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product5.jpg">
			<h4 class="p-title">Flap Pocket Cargo Pant</h4>
			<span class="price">Rs.1400</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product6.jpg">
			<h4 class="p-title">Pinstripe Sleeve Shirt</h4>
			<span class="price">Rs.2000</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product13.jpg">
			<h4 class="p-title">Strap Buckle Sandal</h4>
			<span class="price">Rs.1500</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product14.jpg">
			<h4 class="p-title">Casual Men Sandal</h4>
			<span class="price">Rs.1600</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div-->
	</div>
	<h2 class="slogan">New Arrival Product</h2>
	<p class="slogan">Casual Sporty Collection New Modern Design</p>
	<div id="cloth2" class="pic1">
		<?php foreach ($result as $v) {	?>
		<div class="product-box">
			<img class="p-image" src="<?php echo $img_path.$v['P_Image'];?>">
			<h4 class="p-title"><?php echo $v['P_Name'];?></h4>
			<span class="price"><?php echo $v['P_Price'];?></span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<?php } ?>
		<!--div class="product-box">
			<img class="p-image" src="assets/images/product7.jpg">
			<h4 class="p-title">Men Hoodie</h4>
			<span class="price">Rs.2800</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product8.jpg">
			<h4 class="p-title">Casual Men Jacket</h4>
			<span class="price">Rs.3000</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product9.jpg">
			<h4 class="p-title">Waist Joggers</h4>
			<span class="price">Rs.2100</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
			
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product10.jpg">
			<h4 class="p-title">Loose Fit Sweatpant</h4>
			<span class="price">Rs.2000</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product11.jpg">
			<h4 class="p-title">Zip Hoodie</h4>
			<span class="price">Rs.1900</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product12.jpg">
			<h4 class="p-title">High Waist Shorts</h4>
			<span class="price">Rs.1200</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product15.jpg">
			<h4 class="p-title">Men Sneakers</h4>
			<span class="price">Rs.2200</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div>
		<div class="product-box">
			<img class="p-image" src="assets/images/product16.jpg">
			<h4 class="p-title">Tracking Running Shoes</h4>
			<span class="price">Rs.2500</span>
			<button><img src="assets/images/shopicon.jpg" class="shop"></button>
		</div-->
	</div>
</section>	
<div id="page-bottom">
	<div  class="pic3">
		<div id="I">
			<h4 class="ad">Trade-in-offer</h4>
			<h5 class="ad">Super value deals</h5>
			<h6 class="ad">On all products</h6>
		</div>
		<div id="II">
			<h4 class="ad">Trade-in-offer</h4>
			<h5 class="ad">Super value deals</h5>
			<h6 class="ad">On all products</h6>
	    </div>
	</div>
</div>	
<footer class="tf1">
	<div class="col">
		<img src="<?php echo $setting[0]['site_Logo'];?>" class="logo" alt="">
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

</body>

</html>