<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
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
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-deskto trans-03 fix-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="?action=home_page" class="logo">
						<img src="<?php echo $business['LogoPath'];?>" alt="IMG-LOGO">                                               
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
				<a href="?action=home_page"><img src="<?php echo $business['LogoPath'];?>" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

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
	</aside>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
        <form class="bg0 p-t-75 p-b-85" method="post" action="?action=pay">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
                                         
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
                                                                        <th class="column-4">Size</th>
                                                                        <th class="column-4">Color</th>
								</tr>
                                                               <?php 
                                                               $cart_total = 0;
                                                               foreach ($_SESSION['cart_product'] as $value): 
                                                                   $line_total = $value['price']* $value['quantity'];
                                                                   $cart_total += $line_total;
                                                               ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
                                                                                    
											<img src="<?php echo $value['image'] ;?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['title'] ;?></td>
									<td class="column-3"><?php echo "R".$value['price'] ;?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div  class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" value="<?php echo $value['quantity'] ;?>" name="num-product1" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?php echo "R".$line_total ;?></td>
                                                                        <td class="column-4" ><?php echo $value['size'] ;?></td>
                                                                        <td class="column-4"><?php echo $value['color'] ;?></td>
								</tr>
                                                                
                                                                <?php endforeach; ?>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
							If a product has a quantity of 0, then it's not included in your pricing.
								
                                                        </div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo "R".$cart_total; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Free Delivery:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
								Petrol is expensive, but deliveries are free for purchases over R1 500. R100 for products less than R1 500.
                                                                </p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Delivery Address info
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                                                          
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
                                                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" autofocus="true" required name="phone_num" placeholder="Phone Number">
									</div>
                                                                    
                                                                        <div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" required type="text" name="house_num" placeholder="House Number">
									</div>
                                                                    
                                                                        <div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" required type="text" name="street_name" placeholder="Street Name">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" required type="text" name="suburb" placeholder="Suburb">
									</div>
                                                                        
                                                                        <div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" required type="text" name="city" placeholder="City">
									</div>
									
							
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									R<?php 
                                                                      if($cart_total < 1500){  
                                                                      echo ($cart_total +100);}
                                                                      else{
                                                                          echo $cart_total;
                                                                      }
                                                                        ?> including delivery costs
								</span>
							</div>
						</div>

                                            <input type="submit" value="Pay Now" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							
                                            </div>
				</div>
			</div>
		</div>
	</form>
	<a href=”https://www.payfast.co.za/eng/process?cmd=_paynow&receiver=support%40payfast.co.za&?item_name=Black+Eye+Boxing+Gloves&amount=129.99″>
<img src=”http://www.payfast.co.za/images/buttons/buynow_basic_logo.gif” width=”95″ height=”57″ alt=”Buy” title=”Buy Now with PayFast” /></a>

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="?action=product" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="?action=product" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="?action=product" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="?action=contact" class="stext-107 cl7 hov-cl1 trans-04">
								Contact us
							</a>
						</li>

					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Contact us
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Website and content created by: Healing &amp; Anathi<br><br><br>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
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