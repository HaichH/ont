<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmation of payment</title>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-deskto trans-03 fix-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="?action=home_page" class="logo">
                                        <img src="<?php echo $business['LogoPath'];?>" alt="IMG-LOGO" width="200">                                               
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="?action=home_page">Home</a>
								
							</li>

							<li>
								<a href="?action=product">Shop</a>
							</li>

							<li>
								<a href="?action=about">About</a>
							</li>

							<li>
								<a href="?action=contact">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
							
						</div>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
                            <a href="?action=home_page"><img src="<?php echo $business['LogoPath'];?>" alt="IMG-LOGO" width="200"></a>
			</div>

			<!-- Icon header -->

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="?action=home_page">Home</a>
					
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="?action=product">Shop</a>
				</li>
				<li>
					<a href="?action=about">About</a>
				</li>

				<li>
					<a href="?action=contact">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
        </header>
        <!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="?action=home_page" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-13">
						<a href="?action=product" class="stext-102 cl2 hov-cl1 trans-04">
							START SHOPPING
						</a>
					</li>

					<li class="p-b-13">
						<a href="?action=login_page" class="stext-102 cl2 hov-cl1 trans-04">
							Admin Login
						</a>
					</li>


					<li class="p-b-13">
						<a href="?action=contact" class="stext-102 cl2 hov-cl1 trans-04">
							CONTACT DETAILS
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@ Uncommon
					</span>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						About Us
					</span>

					<p class="stext-108 cl6 p-t-27">
                                            <?php echo $business['AboutUs']; ?>
					</p>
				</div>
			</div>
		</div>
	</aside><br><br><br><br>
        <div class="container-fluid">
            <div class="flex-w flex-m m-r-20 m-tb-5">
        <h1>Thank you for your support</h1>
        <h2>We have received your order and is being attended to. You'll get your product/ product(s) very soon.</h2>
            </div>
        </div>
        
        <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    </body>
</html>
