<?php

include("config.php");
session_start();
$errMsg="";


if (isset($_POST["submit"])) {
	$name=$_POST["name"];
	$password=$_POST["password"];
	





	$select_user="SELECT * FROM cust_reg WHERE username='$name' AND password='$password'";
	$run_user=mysqli_query($conn, $select_user);
	$count_user=mysqli_num_rows($run_user);

if (($name=="") ||  ($password=="") ){
	$errMsg="A field or more is empty";
}elseif ($count_user==0) {
$errMsg="User not found";
}else{
	$_SESSION["username"]=$name;
	header("Location: welcome.php", "_SELF");
}



}


?>








<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>NAVI&KAYLA | ONLINE STORE</title>
	<meta charset="UTF-8">
	<meta name="description" content=" NAVI&KAYLA | ONLINE STORE">
	<meta name="keywords" content="Navi, Kayla, Navi&Kayla, Plastic Bucket,cheap items,">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="naviicon.png" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->



	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="#" class="site-logo">
							<img src="titled-1.fw.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							    <div class="wrapper">
      							<div class="search-input">
        						<a href="" target="_blank" hidden></a>

							<input type="text" placeholder="Search on Navi&Kayla ....">
							 <div class="icon"><i class="fa fa-search"></i></div>
							        <div class="autocom-box">
          							<!-- here list are inserted from javascript -->
        							</div>
        						</div>
        					</div>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="login.php">Sign</a> In or <a href="signup.php">Create Account</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="cart.php">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">products</a>

						<ul class="sub-menu">
							<li><a href="Plastic.php">Plastic Products</a>



							</li>
							<li><a href="ceramic.php">Ceramic Products</a>



							</li>
							
							<li><a href="Wooden.php">Wooden Products</a>


							</li>

							<li><a href="other.php">Other Products</a>


							</li>
						</ul>

					</li>


					
					<li><a href="Today.php">Today's deal
						<span class="new">New</span>
					</a></li>
					
					<li><a href="contact.php">Contact us</a></li>
					
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

<!-- sign-up form-->
<div class="Ara-ara">

	<form  method="POST">
<?php
			if ($errMsg=="") {
				echo "";
			}
			else{

				echo "<div class='alert alert-danger'>
				$errMsg
			</div>";
			}
				?>

<H2>LOGIN HERE</H2>


		<label>Username:</label>
		<input class="form-control" type="text" name="name" placeholder="Username">



		<label>Password:</label>
		<input class="form-control" type="Password" name="password" placeholder="Password">


		<div class="koyin">
		<input type="submit" name="submit" value="SUBMIT">	

		</div>

		

	</form>
	


</div>



	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="#"><img src="Untitled-1.fw.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Navi&Kayla e-commerce site is a one-stop solution for a wide variety of plastic, wooden, ceramic, and other products. We sell to you high-quality products using an advanced, modish, and sanitary approach. Navi&Kayla provides basic necessities and household items such as plastic and ceramic products, toilet paper and rolls, serviettes, and dinnerwares.</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div>
					
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2> Got Questions?</h2>
						<ul>
							<li><a href="tel:+2348135151538">Call-us: +234 813 515 1538</a></li>
							<li><a href="mailto:naviandkayla@gmail.com">Email us:naviandkayla@gmail.com</a></li>
							<li><a href="https://api.whatsapp.com/send?phone=+2348135151538">Send us a Whatsapp Message:+234 813 515 1538</a></li>
							<li><a href= "https://www.instagram.com/naviandkayla/">Send us a Message on Instagram: @naviandkayla</a></li>
						</ul>
						
					</div>
				</div>

				<div>
					
				</div>
				
				
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Contact us</h2>
						<div class="con-info">
							<span>N.</span>
							<p>Navi&Kayla.ltd </p>
						</div>
						<div class="con-info">
							<span>A.</span>
							<p>Fela Ahmed street, Aunty kenny, Agric bus stop, Ikorodu LGA.  </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+234 813 515 1538</p>
 						</div>

						<div class="con-info">
							<span>E.</span>
							<p>naviandkayla@yahoo.com</p>
						</div>
					</div>
				</div>
			</div>
			<div class="osi">
			<a href="Admin/lite version/adminlogin.php">DEVELOPED BY ALFRED.</a>
			</div>
		</div>

		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="https://www.instagram.com/naviandkayla/" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="https://api.whatsapp.com/send?phone=+2348135151538" class="whatsapp"><i class="fa fa-whatsapp"></i><span>whatsapp</span></a>
					<a href="https://www.pinterest.com/naviandkayla/_saved/" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					
					<a href="mailto:naviandkayla@yahoo.com" class="MAIL"><i class="fa fa-envelope"></i><span>Yahoo mail</span></a>
					<a href="tel:+2348135151538" class="youtube"><i class="fa fa-phone"></i><span>Phone</span></a>
					<a href="mailto:naviandkayla@gmail.com" class="google"><i class="fa fa-google"></i><span>Gmail</span></a>
				</div>
			</div>
		</div>
	</section>






	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>









