<?php require_once 'functions.php' ?>

<?php
$products=get_products();
include("cartt.php"); 
include("config.php");


?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$errMsg="";

if (isset($_POST["submit"])) {
	$addressa=$_POST["addressa"];
	$state=$_POST["state"];
	$phonenumber=$_POST["phonenumber"];
	$delieverywithinlagos=$_POST["delieverywithinlagos"];
	$delieveryoutsidelagos=$_POST["delieveryoutsidelagos"];
	$storedirectly=$_POST["storedirectly"];
	$payment=$_POST["payment"];
	$name=$_POST["name"];
	$order_email=$_POST["order_email"];
	$order_product=$_POST["order_product"];
	$order_price=$_POST["order_price"];
	$order_total=$_POST["order_total"];
	$order_qty=$_POST["order_qty"];
	$order_date=$_POST["order_date"];

		if (($addressa=="") ||  ($state=="") ||  ($phonenumber=="") ||  (($delieverywithinlagos=="")&& ($delieveryoutsidelagos=="")&& ($storedirectly=="")) ||  ($payment=="") ){
		$errMsg="Please fill in the empty form before you checkout ^_- !";
	}
	elseif (($name=="") ||  ($order_email=="") || ($order_product=="") ||  ($order_price=="") ||  ($order_total=="") ||  ($order_qty=="") ||  ($order_date=="")) {
			header("Location: login.php", "_SELF");
		}
		else{
	

						for ($i=0; $i < count($order_qty) ; $i++) {
							for ($i=0; $i < count($order_product) ; $i++) { 
								for ($i=0; $i < count($order_price) ; $i++) { 
									for ($i=0; $i < count($order_date) ; $i++) { 
							
					
	$insert_reg="INSERT INTO orders (addressa,state,phonenumber,delieverywithinlagos,delieveryoutsidelagos,storedirectly,payment,name,order_email,order_product,order_price,order_total,order_qty,order_date) VALUES('$addressa','$state','$phonenumber', '$delieverywithinlagos', '$delieveryoutsidelagos','$storedirectly','$payment','$name','$order_email','$order_product[$i]','$order_price[$i]','$order_total','$order_qty[$i]','$order_date[$i]')";
										$run_reg=mysqli_query($conn,$insert_reg);
											if ($run_reg) {
									header("Location: thanks.php", "_SELF");
															}
														}
							
								}	                        

							}	
						}
					$insert_the="INSERT INTO total (order_total) VALUES('$order_total')";
					$run_rege=mysqli_query($conn,$insert_the);
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
						<a href="index.html" class="site-logo">
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
								<a href="login.html">Sign</a> In or <a href="signup.html">Create Account</a>
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


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="post">






						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>

							
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Address" name="addressa">
								<input type="text" placeholder="State" name="state">
								<input type="text" placeholder="Phone no." name="phonenumber">
							</div>
						</div>
						<div class="cf-title">Delivery Info</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Delivery within Lagos</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="delieverywithinlagos" id="ship-1" value="₦2000">
										<label for="ship-1">₦2000</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Delivery outside lagos  </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="delieveryoutsidelagos" id="ship-2" value="₦5000">
										<label for="ship-2">₦5000</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Buy from the store directly</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="storedirectly" id="ship-3" value="Free">
										<label for="ship-3">Free</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">Payment</div>
						<ul class="payment-list">

							<input type="text" value="Pay when you get the product" name="payment" readonly>
							
						</ul>
						<?php
			$result = mysqli_query($conn,"SELECT * FROM carti WHERE name='$name'");


							if(mysqli_num_rows($result) > 0)  
                {  


							while ($row=mysqli_fetch_assoc($result)) {
								
								?>
				<input type="hidden" class="form-control" name="name" value="<?php echo "$name";?>" >
				<input type="hidden" class="form-control" name="order_email" value="<?php echo $row['custemail']?>" >
				<input type="hidden" class="form-control" name="order_product[]" value="<?php echo $row['custproducts']?>" >
				<input type="hidden" class="form-control" name="order_price[]" value="<?php echo $row['itemprice']?>" >
				<input type="hidden" class="form-control" name="order_total" value="<?php echo $row['totalprice']?>" >
				<input type="hidden" class="form-control" name="order_qty[]" value="<?php echo $row['quantity']?>" >
				<input type="hidden" class="form-control" name="order_date[]" value="<?php echo $row['dateposted']?>" >
				<?php  
                     }  
                }  
                ?>
						
						<input type="submit" class="site-btn submit-order-btn" name="submit" value="place order" >
					</form>
				</div>

			</div>
		</div>
	</section>
	<!-- checkout section end -->

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
