<?php
session_start();
// Other PHP code follows...
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<title> THE ටෙඩි HOUSE | Home</title>
	<link rel="icon" href="images/home/OIP.png" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* Styles for animation */
.product-image-wrapper {
    position: relative;
    overflow: hidden;
}
.product-image-wrapper .productinfo {
    background: white; /* Background color */
    margin-bottom: 15px;
    padding: 10px;
    transition: all 0.3s ease;
    color: white; /* Text color */
}
.product-image-wrapper:hover .productinfo {
    background: white; /* Background color on hover */
}
.product-image-wrapper .productinfo img {
    transition: transform 0.5s ease;
}
.product-image-wrapper:hover .productinfo img {
    transform: scale(1.1);
}
.product-image-wrapper .product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.6);
    width: 100%;
    height: 100%;
    color: #fff;
    opacity: 0;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.product-image-wrapper:hover .product-overlay {
    opacity: 1;
}
.product-image-wrapper .product-overlay h2,
.product-image-wrapper .product-overlay p {
    margin: 5px 0;
}





</style>
	 
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 07685304017/0768365008/0912253492</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> inforteddyhouse@gmail.com </a></li>
								<!--EMAIL-->
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/the.teddy.hous?mibextid=kFxxJD" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<!--url and facebook page join-->
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<!--url and facebook page join-->
<!-- plese check the url email not cumplete -->
								<li><a href="https://myaccount.google.com/u/1/?pli=1&pageId=none" target="_blank"><i class="fa fa-google-plus"></i></a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/OIP.png" alt="" style="width: 150px; height: auto;" /></a>
							<a href="index.php"></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								<b>Sri Lanka</b>	
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">Sri Lanka</a></li>
									<li><a href="#">UK</a></li>
									<li><a href="#">India</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									<b>LKR</b>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Dollar</a></li>
									<li><a href="#">Pound</a></li>
									<li><a href="#">Indian Rupees</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						 <div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
						<li><a href="login.php"><i class="fa fa-user"></i> <b>Admin</b></a></li>
						<li><a href="products.php"><i class="fa fa-user"></i> <b>My Orders</b></a></li>
						<li><a href="wishlist.php"><i class="fa fa-star"></i><b> Wishlist</b></a></li>
						<li><a href="checkout.php"><i class="fa fa-crosshairs"></i><b> Checkout</b></a></li>
						<li><a href="cart.php"><i class="fa fa-shopping-cart"></i><b> Cart</b></a></li>
								<?php if(isset($_SESSION['user_name'])): ?>
						<li><a href="logout.php"><i class="fa fa-lock"></i> Logout (<?php echo $_SESSION['user_name']; ?>)</a></li>
								<?php else: ?>
						<li><a href="login.php"><i class="fa fa-lock"></i><b> Login</b></a></li>
							<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active"><b>Home</b></a></li>
								<li class="dropdown"><a href="#"><b>Shop</b><i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html"><b>Products</b></a></li>
										<li><a href="products.php"><b>Product Details</b></a></li> 
										<li><a href="checkout.php"><b>Checkout</b></a></li> 
										<li><a href="cart.php"><b>Cart</b></a></li> 
										<li><a href="login.php"><b>Login</b></a></li> 
                                    </ul>
                       
								<li><a href="ABOUT.html"><b>About Us</b> </a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
							<li data-target="#slider-carousel" data-slide-to="4"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span> THE ටෙඩි HOUSE</span><span style="font-size: 20px;">by rammuthu</span></h1>
									<h2>Teddies</h2>
									<p>Meet our adorable companions, the epitome of warmth and comfort, as they bring joy with every hug and spark smiles with their cuddly charm - welcome to the world of Teddies!" </p>
									<!--ADD IMAGE IN THIS PLASE -->
									<button type="button" class="btn btn-default get">Get it now</button><!--add the hashmap in teddypage-->
								</div>
								<div class="col-sm-6">
									<img src="images/home/teddy.jpg" class="girl img-responsive" alt=""style="width: 475px; height: auto;" />
								
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span> THE ටෙඩි HOUSE</span><span style="font-size: 20px;">by rammuthu</span></h1>
									<h2>Chocolates</h2>
									<p>"Indulge in the rich symphony of flavors, where every bite is a journey into blissful decadence, savoring the essence of pure cocoa perfection - welcome to the divine realm of Chocolates!" </p>
									<button type="button" class="btn btn-default get">Get it now</button><!--add the hashmap in teddypage-->
								</div>
								<div class="col-sm-6">
									<img src="images/home/choca.jpg" class="girl img-responsive" alt=""style="width: 475px; height: auto;" />
									<img src="images/home/off.png" class="pricing" alt="" style="opacity: 0.7;" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span> THE ටෙඩි HOUSE</span><span style="font-size: 20px;">by rammuthu</span></h1>
									<h2>Cakes</h2>
									<p>"Prepare to delight your senses with layers of moist decadence, adorned with luscious frosting and intricate designs, each slice a celebration of sweetness and culinary artistry - welcome to the delectable world of Cakes!"</p>
									<button type="button" class="btn btn-default get">Get it now</button><!--add the hashmap in teddypage-->
								</div>
								<div class="col-sm-6">
									<img src="images/home/cake.jpg" class="girl img-responsive" alt=""style="width: 475px; height: auto;" />
									
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span> THE ටෙඩි HOUSE</span><span style="font-size: 20px;">by rammuthu</span></h1>
									<h2>Birthday Surprises</h2>
									<p>"Step into a world of excitement and wonder, where each birthday is a tapestry of unforgettable moments woven with love, laughter, and unexpected delights - welcome to the enchanting realm of Birthday Surprise Events!"</p>
									<button type="button" class="btn btn-default get">Get it now</button><!--add the hashmap in teddypage-->
								</div>
								<div class="col-sm-6">
									<img src="images/home/events.jpg" class="girl img-responsive" alt="" style="width: 475px; height: auto;" />

									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span> THE ටෙඩි HOUSE</span><span style="font-size: 20px;">by rammuthu</span></h1>
									<h2>Special Gift Packs</h2>
									<p> "Embrace the art of thoughtful gifting with our curated selection of Special Gift Packs, where every package is a treasure trove of delights, meticulously crafted to evoke smiles and warm hearts, perfect for every occasion!"</p>
									<button type="button" class="btn btn-default get">Get it now</button><!--add the hashmap in teddypage-->
								</div>
								<div class="col-sm-6">
									<img src="images/home/gift.jpg" class="girl img-responsive" alt=""style="width: 475px; height: auto;" />
									
								</div>
							</div>
						</div>
						
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<h4 class="panel-title">
											<a href="Teddy.html">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												Teddies
											</a>
											</h4>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fuzzy</a></li>
											<li><a href="#">Softy</a></li>
											<li><a href="#">Baby Bear</a></li>
											<li><a href="#">Snugglebug</a></li>
											<li><a href="#">Fuzzy Bear</a></li>
											<li><a href="#">Cuddles</a></li>
											<li><a href="#">Fuzzball</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a href="Chocolate.html">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Chocolates
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Cadbury</a></li>
											<li><a href="#">Lindt & Sprüngli</a></li>
											<li><a href="#">Nestlé</a></li>
											<li><a href="#">Hershey's</a></li>
											<li><a href="#">Ferrero Rocher</a></li>
											<li><a href="#">Mars</a></li>
											<li><a href="#">Diary Milk</a></li>
											
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a href="Cakes.html">
										
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Cakes
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Banana cake with cream cheese</a></li>
											<li><a href="#">New York baked cheesecake</a></li>
											<li><a href="#">Chocolate coconut cake</a></li>
											<li><a href="#">Vanilla Cakes</a></li>
											<li><a href="#">Flourless orange cake</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									<h4 class="panel-title"><a href="BIRTHDAY SURPRISES.html"> Birthday Surprises</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									<h4 class="panel-title"><a href="SPECIAL GIFT PACKS.html">Special Gift Packs</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									<h4 class="panel-title"><a href="OTHERS.html">OTHERS</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>JUST FOR YOU</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(12)</span>Teddies</a></li>
									<li><a href="#"> <span class="pull-right">(12)</span>Chocolates</a></li>
									<li><a href="#"> <span class="pull-right">(12)</span>Cakes</a></li>
									<li><a href="#"> <span class="pull-right">(12)</span>Birthday Surprises</a></li>
									<li><a href="#"> <span class="pull-right">(12)</span>Special Gift Packs</a></li>
									<li><a href="#"> <span class="pull-right"></span>OTHERS</a></li>
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="50" data-slider-max="50000" data-slider-step="5" data-slider-value="[25000,45000]" id="sl2" ><br />
								 <b class="pull-left">LKR 50</b> <b class="pull-right">LKR 50000</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
						<img src="images/home/ADD.jpeg" alt="" width="300" height="400" /><br>
						</br>
						<img src="images/home/add2.jpeg" alt="" width="300" height="400" />
							<!-- ADDS IMAGES -->

						</div><!--/shipping-->
					
					</div>
				</div>
				
				
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/ted.jpeg" alt="" width="125" height="215" />
											<h2>LKR 2400.00 </h2>
											<p>Panda Soft Toys</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>LKR 2400.00</h2>
												<p>Panda Teddy Colloection</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/cho.jpeg" alt="" width="125" height="215" />
										<h2>LKR 700.00</h2>
										<p> Orion To You Milk Chocolate</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>LKR 700.00</h2>
											<p>Orion To You Milk Chocolate</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/ted2.jpeg" alt="" width="125" height="215" />
										<h2>LKR 3000.00</h2>
										<p>Unicorn Soft Teddies</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>LKR 3000.00</h2>
											<p>Unicorn Soft Teddies</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/ch.jpeg" alt="" width="125" height="215" />
										<h2>LKR 200.00</h2>
										<p>Hershey's Milk Chocolate </p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>LKR 200.00</h2>
											<p>Hershey's Milk Chocolate</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="images/home/new.png" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/cak.jpeg" alt="" width="125" height="215" />
										<h2>LKR 7500.00</h2>
										<p>Birthday Cakes</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>LKR 7500.00</h2>
											<p>Birthday Cakes</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="images/home/sale.png" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/kk.jpeg" alt="" width="125" height="215" />
										<h2>LKR 10000.00</h2>
										<p> Gift Packs</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>LKR 10000.00</h2>
											<p>Gift Packs</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Teddies</a></li>
								<li><a href="#blazers" data-toggle="tab">Chocolates</a></li>
								<li><a href="#sunglass" data-toggle="tab">Cakes</a></li>
								<li><a href="#kids" data-toggle="tab">Birthday Surprises</a></li>
								<li><a href="#poloshirt" data-toggle="tab">Special Gift Packs</a></li>
								<li><a href="#poloshir" data-toggle="tab">OTHERS</li></a>
								</li>
							</ul>
						</div>
						
						<!--teddy-->
						
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/te1.jpeg" alt="" />
												<h2>LKR 2500.00</h2>
												<p> Soft Teddies </p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/te6.jpeg" alt="" width="125" height="205" /> 
												<h2> LKR 20300.00 </h2>
												<p>Yellow Teddies</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/te3.jpeg" alt="" />
												<h2> LKR 22900.00 </h2>
												<p>Red Teddies</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/te4.jpeg" alt="" />
												<h2>LKR 18500.00</h2>
												<p>Purple Teddies</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							
							<!--Chocolate-->
							<div class="tab-pane fade" id="blazers" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/1.jpeg" alt="" />
												<h2>LKR 1300.00 </h2>
												<p>Cookies'N'Creme</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/2.jpeg" alt="" />
												<h2>LKR 1850.00</h2>
												<p>Ghana Mild Chocolates</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/3.jpeg" alt="" />
												<h2>LKR 950.00 </h2>
												<p>Almnd & Granola</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/4.jpeg" alt="" />
												<h2>LKR 250.00</h2>
												<p>Mini Chocolates</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<!--cake-->
							
							<div class="tab-pane fade" id="sunglass" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/c1.jpeg" alt=""  width="125" height="250"/>
												<h2>LKR 8000.00</h2>
												<p>Strawberry Cake</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/c2.jpeg" alt="" width="125" height="250" />
												<h2>LKR 10000.00</h2>
												<p> Angel Bento Cake</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/c3.jpeg" alt="" width="125" height="250" />
												<h2>LKR 3500.00</h2>
												<p>Mini Bento Cake </p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/c4.jpeg" alt=""width="125" height="250" />
												<h2>LKR 8850.00</h2>
												<p> Blue Sky Cake </p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<!--BIRTHDAY-->
							
							<div class="tab-pane fade" id="kids" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/b1.jpeg" alt="" />
												<h2>LKR 25000.00</h2>
												<p>Outdoor Birthday Surprises</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/b2.jpeg" alt="" />
												<h2>LKR 30000.00</h2>
												<p> Indoor Birthday Surprises</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/events.jpg" alt="" />
												<h2>LKR 18000.00 </h2>
												<p> Indoor Birthday Surprises</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/b4.jpg" alt="" />
												<h2>LKR 23000.00</h2>
												<p>Outdoor Birthday Surprises</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<!--Gift-->
							
							<div class="tab-pane fade" id="poloshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/1.jpg" alt=""width="125" height="250"  />
												<h2>LKR 26000.00</h2>
												<p>Large Gift Packs</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/2.jpg" alt=""width="125" height="250"  />
												<h2>LKR 12000.00</h2>
												<p>Medium Gift Packs</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/3.jpg" alt=""width="125" height="250"  />
												<h2>LKR 19000.00</h2>
												<p>Large Gift Packs</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/4.jpg"width="125" height="250"  alt="" />
												<h2>LKR 8000.00</h2>
												<p>Small Gift Packs</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<!--OTHERS-->
							
							<div class="tab-pane fade" id="poloshir" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/Other1.jpg" alt="" />
												<h2>LKR 5000.00</h2>
												<p>Vouchers</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/Other2.jpg" alt="" />
												<h2>LKR 1200.00</h2>
												<p>Ramen</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/Other3.jpg" alt="" />
												<h2>LKR 1500.00</h2>
												<p>Cute Bags</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/Other4.jpg" alt="" />
												<h2>LKR 15000.00</h2>
												<p>Road to EMF Tickets</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<!--/Recommended Items-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/rec1.jpg" width="100" height="280" alt="" />
													<h2>LKR 10000.00</h2>
													<p>Special Fresh Flowers Bouqet</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/rec2.jpg" width="100" height="280" alt="" />
													<h2>LKR 60000.00</h2>
													<p>Special Chocalates Gift Packs</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/rec3.jpg" width="100" height="280" alt="" />
													<h2>LKE 5000.00</h2>
													<p>Special Dried Flowers Bouqet</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/rec4.jpg"width="100" height="280" alt="" />
													<h2>LKR 2000.00</h2>
													<p>Jaya Sri Hikka</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/rec5.jpg"width="100" height="280" alt="" />
													<h2>LKR 2000.00</h2>
													<p>One Last Time</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/rec6.jpg"width="100" height="280" alt="" />
													<h2>LKR2000.00 - 3500.00</h2>
													<p>අම්බා  Night ANTS</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>ටෙඩි</span>HOUSE</h2>
							<p>Welcome to Delight Haven, your ultimate destination for cuddly teddies, decadent chocolates, exquisite cakes, and beautifully curated special gift packs. Perfect for any occasion, our shop brings joy and smiles to your loved ones with every delightful offering.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<a href="https://fb.watch/sIW8R-xZHt/?mibextid=v7YzmG" target="_blank">
										<img src="images/home/v1.jpg"   alt="" style="width: 25; height: auto;"/>
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<a href="https://fb.watch/sIX4kjdDRG/?mibextid=v7YzmG" target="_blank">
										<img src="images/home/v2.jpeg"   alt="" style="width: 25; height: auto;"/>
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<a href=" https://fb.watch/sIYJpb-VeV/?mibextid=v7YzmG " target="_blank">
										<img src="images/home/v3.jpeg"   alt="" style="width: 25; height: auto;"/>
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<a href=" https://fb.watch/sIXwrt1xvX/?mibextid=v7YzmG " target="_blank">
										<img src="images/home/v4.jpg"   alt="" style="width: 25; height: auto;"/>
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png"style="width: 400px; height: auto;" />
							<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2231607776243!2d80.05189657482919!3d6.234286993753921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae181c60d4996b1%3A0x4f97378d92a64!2zVEhFIOC2p-C3meC2qeC3kyBIb3VzZSBCeSBSYW1tdXRodQ!5e0!3m2!1sen!2slk!4v1718291374955!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-p ills nav-stacked">
								<li><a href="#">Teddies</a></li>
								<li><a href="#">Chocalates</a></li>
								<li><a href="#">Cakes</a></li>
								<li><a href="#">Birthday Surprises</a></li>
								<li><a href="#">Special Gift Packs</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
    <div class="single-widget">
        <h2>Secured Payment Options </h2>
        <!-- Replace the form with an image -->
        <img src="images/About/Ab7.png" alt="" style="width: 100%; height: auto;">
       
    </div>
</div>

					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Final project of W3 Developers 2024. </p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.W3 Developers.com">W3 Developers by ICBT Bach 4 (Cardiff Metropolitan)</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>