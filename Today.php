<?php require_once 'functions.php' ?>

<?php
$products=get_today();

?>

<?php
$productslide=get_productslide();

?>

<?php

include("config.php");
include("cartt.php"); 


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

									<?php




					if (isset($_SESSION["username"])) {

						$name=$_SESSION["username"];
					
					$get_user="SELECT * FROM cust_reg WHERE username='$name'";
				$run_user=mysqli_query($conn, $get_user);


				$row_user=mysqli_fetch_array($run_user);

				$name=$row_user["username"];


					} else {
						
					}

										if (isset($_SESSION["username"])) { ?>
					
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								 <span><?php echo "$name";?></span>
<a href="logout.php">Logout</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span><?php  if(!isset($_SESSION["shopping_cart"]))  
      {echo 0; } else{ echo array_sum(array_column($_SESSION["shopping_cart"], "item_quantity")); }?></span>
								</div>
								<a href="cart.php">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

					<?php }else{ ?>


					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="login.php">Sign</a> In or <a href="signup.php">Create Account</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span><?php  if(!isset($_SESSION["shopping_cart"]))  
      {echo 0; } else{ echo array_sum(array_column($_SESSION["shopping_cart"], "item_quantity")); }?></span>
								</div>
								<a href="cart.php">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
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



	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			

			<?php

			while ($row=mysqli_fetch_assoc($productslide)) {
								
			?>



			<div class="hs-item set-bg" data-setbg= "Admin/lite version/imgFolderslide/<?php echo $row['productimage']?>"  style="background-image: url('Admin/lite version/imgFolderslide/<?php echo $row['productimage']?>');" >
				<form method="post" action="index.php?action=add&productcode=<?php echo $row["productcode"]; ?>">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Products</span>
							<h2><?php echo $row['productname']?></h2>
							<p><?php echo $row['productdescription']?> </p>
							<a href="Today.php" class="site-btn sb-line">VIEW</a>
							<button type="submit" name="add_to_cart" class="site-btn sb-white" />ADD TO CART</button>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>₦<?php echo $row['productprice']?>
							    <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["productprice"]; ?>" /> 
                               <input type="hidden"  name="quantity" class="form-control" value="1"  />
						</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
				</form>
			</div>

							<?php

							}



							?>





		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	
	
	<div class="Alfred">
		<p>Today's deal</p>	
		
	</div>









	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
																
					
					<div class="filter-widget">
						<h2 class="fw-title">Talk to us:</h2>
						<ul class="category-menu">
							<li><a href="mailto:naviandkayla@yahoo.com"><i class="fa fa-envelope fa-3x"></i></a></li>
							
							<li><a href="https://www.pinterest.com/naviandkayla/_saved/"><i class="fa fa-pinterest fa-3x"></i></a></li>
							<li><a href="https://api.whatsapp.com/send?phone=+2348135151538"><i class="fa fa-whatsapp fa-3x"></i></a></li>
							<li><a href="tel:+2348135151538"><i class="fa fa-phone fa-3x"></i></a></li>
							

						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">

							<?php




							while ($row=mysqli_fetch_assoc($products)) {
								
								?>
								<div class="col-lg-4 col-sm-6">
							<form method="post" action="Today.php?action=add&productcode=<?php echo $row["productcode"]; ?>">
							<div class="product-item">
								<div class="pi-pic">
									<img src="Admin/lite version/imgFoldertoday/<?php echo $row['productimage']?>" alt="">
									<div class="pi-links">
										<button type="submit" name="add_to_cart" class="add-card" /><i class="flaticon-bag"></i><span>ADD TO CART</span></button>
									
									</div>
								</div>
								<div class="pi-text">
									<h6>₦<?php echo $row['productprice']?></h6>
									<p><?php echo $row['productname']?></p>  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["productprice"]; ?>" /> 
                               <select name="quantity" class="form-control">
                               	<option value="1">1</option>
                               	<option value="2">2</option>
                               	<option value="3">3</option>
                               	<option value="4">4</option>
                               	<option value="5">5</option>
                               	<option value="6">6</option>
                               	<option value="7">7</option>
                               	<option value="8">8</option>
                               	<option value="9">9</option>
                               	<option value="10">10</option>
                               	<option value="11">11</option>
                               	<option value="12">12</option>
                               </select>
								</div>
								
							</div>
						</form>
							</div>

							<?php

							}



							?>





					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->

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

	<!-- Footer section end -->



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
