

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Price comparison &mdash; Find Your Best PC Price</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
 
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style2.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	  
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="left-menu text-right menu-1">
					<ul>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="about.html">About</a></li>
					</ul>
				</div>
				<div class="logo text-center">
					<div id="fh5co-logo"><a href="index.html">Home.</a></div>
				</div>
				<div class="right-menu text-left menu-1">
					<ul>
						<li><a href="login.html">Login</a></li>
						<li><a href="signup.html">Sign up</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>


	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Find your best pc price</h1>
							<h2></h2>
							&nbsp;&nbsp;
							<div class="row">
							<form class="form-inline" id="fh5co-header-subscribe" action="scrap2.php" method="POST">
									<div class="col-md-6 col-md-offset-3">
									<div class="form-group">
												<input type="text" class="form-control" name="product" placeholder="Enter the brand name">
												<input type="submit" class="btn btn-default" name="submit" value="search">
										</div>								
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php
    if($products){
	echo '<div id="fh5co-blog" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Result of your search</h2>
				</div>
			</div>;
		</div>';
		$uniqueProducts = [];

		// Loop through all products 
		 
		foreach($products as $product){
		   
			// Check if the product title is already in the unique products array
			$found = false;
			foreach($uniqueProducts as $uniqueProduct){
				if($uniqueProduct['title'] == $product['title']){
					$found = true;
					break;
				}
			}
		
			// If the product title is not found in the unique products array, add it
			if(!$found){
				$uniqueProducts[] = $product;
			}
		}
		$displayedProducts = 0;
		 
		 foreach($uniqueProducts as $product){
			 
			if( $product['image'] != 'https://ir.ebaystatic.com/rs/v/fxxj3ttftm5ltcqnto1o4baovyl.png' && $product['image'] != 'https://ir.ebaystatic.com/rs/v/fxxj3ttftm5ltcqnto1o4baovyl.png'){
		echo '<div class="product"> 
			<div class="product-image">
			  <img src="'. $product['image'] .' " alt="PC Image">
			  <a href="' . $product['href'] .'"> 
			  <div class="favorite-icon">&#9825;</div>
			</div>
			<div class="product-details">
			  <h3 style="color: #000;">' . $product['title'] . '<b></h3>
			  <div class="product-price style="color: #000;">  
			  <p style="color: #000;">' . $product['price'] . '<b></p>
			  </div>
			  <div class="product-rating">
				<span class="star">&#9733;</span>
				<span class="star">&#9733;</span>
				<span class="star">&#9733;</span>
				<span class="star">&#9733;</span>
				<span class="star">&#9734;</span>
				<p>' . $product['rating'] . '</p> 
			  </div>
			</div>
		    </a>
		    </div>';
		// Increment the displayed products counter
		$displayedProducts++;

		// If we have displayed 10 products, exit the loop
		if($displayedProducts == 10){
			break;
		}
		 
		 }
		}
		 
		}
	
		?>
	</div>
 
	<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
		<div class="overlay"></div>s
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Happy Clients</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quote"></i></span></span>
							<p>&ldquo;The website was easy to navigate and gave me a comprehensive list of all the options available in my price range. I was able to find a great deal on a new computer that I wouldn't have found otherwise. The website saved me a lot of time and hassle, and I feel like I got the best value for my money. I would definitely recommend this website to anyone in the market for a new computer.&rdquo;</p>
						</blockquote>
						<p class="author">Romayssa Boukrif<span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quote"></i></span></span>
							<p>&ldquo;I was skeptical about using a PC prices comparison website at first, but I'm so glad I did! The website was incredibly user-friendly and made it easy to compare prices and specifications for a variety of computers. I found the perfect computer for my needs at a great price. Overall, I had a great experience and would definitely use this website again in the future.&rdquo;</p>
						</blockquote>
						<p class="author">Guoual Belhamidi Kawthar<span class="subtext">Creative Director</span></p>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quote"></i></span></span>
							<p>&ldquo;Using a PC prices comparison website was a game-changer for me! I had been shopping around for a new computer for weeks and was feeling overwhelmed by all the options and price ranges. This website made it easy to narrow down my choices and find the best deals available. I was able to save a significant amount of money on my purchase and felt confident that I was making an informed decision.&rdquo;</p>
						</blockquote>
						<p class="author">Bouchra Manar Benkehil<span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	 
	<footer id="fh5co-footer" role="contentinfo">
		<div class="container"> 
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
							 
						</ul>
					</p>
				</div>
			</div>
		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>