<?php
session_start();

include("connection.php"); // Ensure this connects to teddy_house_login database
include("functions.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if (!empty($user_name) && !empty($password)) {
            $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
            $stmt = $con->prepare($query);
            $stmt->bind_param("s", $user_name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $user_data = $result->fetch_assoc();

                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['user_name'] = $user_data['user_name'];

                    if ($user_data['is_admin'] == 1) {
                        header("Location: admin.php");
                    } else {
                        header("Location: index.php");
                    }
                    die;
                } else {
                    echo "Wrong password!";
                }
            } else {
                echo "No such user found!";
            }
        } else {
            echo "Please enter valid username and password!";
        }
    }

    if (isset($_POST['signup'])) {
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name)) {
            $query = "SELECT * FROM users WHERE user_name = ? OR email = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("ss", $user_name, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $insert_query = "INSERT INTO users (user_name, email, password) VALUES (?, ?, ?)";
                $insert_stmt = $con->prepare($insert_query);
                $insert_stmt->bind_param("sss", $user_name, $email, $hashed_password);

                if ($insert_stmt->execute()) {
                    $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
                    $stmt = $con->prepare($query);
                    $stmt->bind_param("s", $user_name);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result && $result->num_rows > 0) {
                        $user_data = $result->fetch_assoc();
                        $_SESSION['user_id'] = $user_data['user_id'];
                        $_SESSION['user_name'] = $user_data['user_name'];
                        header("Location: index.php");
                        die;
                    } else {
                        echo "Error: Unable to fetch user data after registration.";
                    }
                } else {
                    echo "Error: " . $con->error;
                }
            } else {
                echo "User already exists with that username or email!";
            }
        } else {
            echo "Please enter valid username, email, and password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ටෙඩි HOUSE|Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body>
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href=""><i class="fa fa-phone"></i>07685304017/0768365008/0912253492</a></li>
                                <li><a href=""><i class="fa fa-envelope"></i> inforteddyhouse@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/the.teddy.hous?mibextid=kFxxJD" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://myaccount.google.com/u/1/?pli=1&pageId=none" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/home/OIP.png" alt="" style="width: 150px; height: auto;" /></a>
                            <a href="login.php"></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Canada</a></li>
                                    <li><a href="">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Canadian Dollar</a></li>
                                    <li><a href="">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                
                                <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php if(isset($_SESSION['user_name'])): ?>
                                    <li><a href="logout.php"><i class="fa fa-lock"></i> Logout (<?php echo $_SESSION['user_name']; ?>)</a></li>
                                <?php else: ?>
                                    <li><a href="login.php" class="active"><i class="fa fa-lock"></i> Login</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <h2>Login to your account</h2>
                        <form method="post">
                            <input type="text" name="user_name" placeholder="Username" required />
                            <input type="password" name="password" placeholder="Password" required />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Keep me signed in
                            </span>
                            <button type="submit" name="login" class="btn btn-default">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>New User Signup!</h2>
                        <form method="post">
                            <input type="text" name="user_name" placeholder="Username" required />
                            <input type="email" name="email" placeholder="Email Address" required />
                            <input type="password" name="password" placeholder="Password" required />
                            <button type="submit" name="signup" class="btn btn-default">Signup</button>
                        </form>
                    </div>
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
										<img src="images/home/v1.jpg"   alt="" style="width: 45; height: auto;"/>
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
										<img src="images/home/v2.jpeg"   alt="" style="width: 60; height: auto;"/>
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
										<img src="images/home/v3.jpeg"   alt="" style="width: 45; height: auto;"/>
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
										<img src="images/home/v4.jpg"   alt="" style="width: 45; height: auto;"/>
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
							<h2>About <span>ටෙඩි</span> House Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
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