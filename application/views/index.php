<?php

	//include 'controller.php';

	?>

<!DOCTYPE html>

<html lang="zxx">



<head>

	<title>AAHRS</title>

	<!-- Meta tag Keywords -->

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="UTF-8">

	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"

	/>

	<script>

		addEventListener("load", function () {

			setTimeout(hideURLbar, 0);

		}, false);



		function hideURLbar() {

			window.scrollTo(0, 1);

		}

	</script>

	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

	<!-- //Meta tag Keywords -->

	<!-- Extra css code writen in this file-->

	<link rel="stylesheet" href="<?php echo base_url('css/indexExtra.css') ?>" type="text/css" media="all">

	<!-- Custom-Files -->

	<link href="<?php echo base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css" media="all" />

	<!-- Bootstrap css -->

	<link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet" type="text/css" media="all" />

	<!-- Main css -->

	<link rel="stylesheet" href="<?php echo base_url('css/fontawesome-all.css') ?>">

	<!-- Font-Awesome-Icons-CSS -->

	<link href="<?php echo base_url('css/popuo-box.css') ?>" rel="stylesheet" type="text/css" media="all" />

	<!-- pop-up-box -->

	<link href="<?php echo base_url('css/menu.css') ?>" rel="stylesheet" type="text/css" media="all" />

	<!-- menu style -->

	<!-- //Custom-Files -->





	<!-- //web fonts -->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://www.solodev.com/assets/password/strength.js"></script>

</head>



<body>

		

	<!-- top-header -->

	<?php

		include 'navbar.php';

	?>

<!-- top Products -->

	<div class="ads-grid py-sm-5 py-4">

		<div class="container py-xl-4 py-lg-2">

		

			<div class="row">

				<!-- product left -->

				<div class="agileinfo-ads-display col-lg-9">

					<div class="wrapper">

						<!-- first section -->

						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">

							<h3 class="heading-tittle text-center font-italic">AAHRS Premium</h3>

							<div class="row" style="height: 350px; overflow:hidden;">

								<?php foreach($hospitals as $x): ?>

								<div class="col-md-4 product-men mt-5">

									<div class="men-pro-item simpleCart_shelfItem">

										<div class="men-thumb-item text-center">

											<img src="<?php echo base_url('userUploads/'.$x['logo']) ?>" alt="" style="height: 200px; width: 200px;">

											<div class="men-cart-pro">

												<div class="inner-men-cart-pro">

													<a href="hospital_profile_view.php" class="link-product-add-cart">Quick View</a>

												</div>

											</div>

										</div>

										<div class="item-info-product text-center border-top mt-4">

											<h4 class="pt-1">

												<a href="<?php echo site_url() ?>mainController/viewHospital/<?php echo $x['hos_id'] ?>"><?php echo $x['hos_name'] ?></a>

											</h4>

											<div class="info-product-price my-2">

												<!--<span class="item_price">$200.00</span>

												<del>$280.00</del>-->

											</div>

											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

												<form action="#" method="post">

													<fieldset>

														<input type="hidden" name="cmd" value="_cart" />

														<input type="hidden" name="add" value="1" />

														<input type="hidden" name="business" value=" " />

														<input type="hidden" name="item_name" value="Samsung Galaxy J7" />

														<input type="hidden" name="amount" value="200.00" />

														<input type="hidden" name="discount_amount" value="1.00" />

														<input type="hidden" name="currency_code" value="USD" />

														<input type="hidden" name="return" value=" " />

														<input type="hidden" name="cancel_return" value=" " />

														<input type="submit" name="submit" value="Reviews" class="button btn" />

													</fieldset>

												</form>

											</div>

										</div>

									</div>

								</div>

								<?php endforeach; ?>

							</div>

						</div>

						<!-- //first section -->

						<!-- second section -->

						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">

							<h3 class="heading-tittle text-center font-italic">Most Searched</h3>

							<div class="row" style="height: 380px; overflow:hidden;">

							<?php foreach($diseases as $x): ?>

								<div class="col-md-4 product-men mt-5">

									<div class="men-pro-item simpleCart_shelfItem">

										<div class="men-thumb-item text-center">

											<img src="<?php echo base_url('userUploads/'.$x['picture']) ?>" alt=""  style="height: 200px; width: 200px;">

											<div class="men-cart-pro">

												<div class="inner-men-cart-pro">

													<a href="single.html" class="link-product-add-cart">Quick View</a>

												</div>

											</div>

										</div>

										<div class="item-info-product text-center border-top mt-4">

											<h4 class="pt-1">

												<a href="<?php echo site_url() ?>/disease_Controller/diseaseView/<?php echo $x['dis_id'] ?>"><?php echo $x['dis_name'] ?></a>

											</h4>

											<div class="info-product-price my-2">

												<span class="item_price">2.5M visitors</span>

												<!-- <del>$340.00</del>-->

											</div>

											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

												<form action="#" method="post">

													<fieldset>

														<input type="hidden" name="cmd" value="_cart" />

														<input type="hidden" name="add" value="1" />

														<input type="hidden" name="business" value=" " />

														<input type="hidden" name="item_name" value="Sony 80 cm (32 inches)" />

														<input type="hidden" name="amount" value="320.00" />

														<input type="hidden" name="discount_amount" value="1.00" />

														<input type="hidden" name="currency_code" value="USD" />

														<input type="hidden" name="return" value=" " />

														<input type="hidden" name="cancel_return" value=" " />

														<input type="submit" name="submit" value="Best Hospitals" class="button btn" />

													</fieldset>

												</form>

											</div>

										</div>

									</div>

								</div>

								<?php endforeach; ?>

							</div>

						</div>

						<!-- //second section -->

					

						<!-- fourth section -->

						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">

							<h3 class="heading-tittle text-center font-italic">Top Rated Doctors</h3>

							<div class="row" style="height: 380px; overflow:hidden;">

							<?php foreach($doctors as $x): ?>

								<div class="col-md-4 product-men mt-5">

									<div class="men-pro-item simpleCart_shelfItem">

										<div class="men-thumb-item text-center">

											<img src="<?php echo $x['picture'] ?>" alt=""  style="height: 200px; width: 200px;">

											<div class="men-cart-pro">

												<div class="inner-men-cart-pro">

													<a href="single.html" class="link-product-add-cart">Quick View</a>

												</div>

											</div>

										</div>

										<span class="product-new-top">New</span>

										<div class="item-info-product text-center border-top mt-4">

											<h4 class="pt-1">

												<a href="<?php echo site_url() ?>/mainController/viewDoctor/<?php echo $x['doc_id'] ?>">Dr. <?php echo $x['doc_name'] ?></a>

											</h4>

											<div class="info-product-price my-2">

												<span class="item_price">Review</span>

											</div>

											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

												<form action="#" method="post">

													<fieldset>

														<input type="hidden" name="cmd" value="_cart" />

														<input type="hidden" name="add" value="1" />

														<input type="hidden" name="business" value=" " />

														<input type="hidden" name="item_name" value="Whirlpool 245" />

														<input type="hidden" name="amount" value="230.00" />

														<input type="hidden" name="discount_amount" value="1.00" />

														<input type="hidden" name="currency_code" value="USD" />

														<input type="hidden" name="return" value=" " />

														<input type="hidden" name="cancel_return" value=" " />

														<input type="submit" name="submit" value="Get in touch" class="button btn" />

													</fieldset>

												</form>

											</div>



										</div>

									</div>

								</div>

								<?php endforeach; ?>

							</div>

						</div>

						<!-- //fourth section -->

					</div>

				</div>

				<!-- //product left -->



				<!-- product right -->

				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">

					<div class="side-bar p-sm-4 p-3">

						

						<!-- discounts -->

						<div class="left-side border-bottom py-2">

							<h3 class="agileits-sear-head mb-3">Discount</h3>

							<ul>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">5% or More</span>

								</li>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">10% or More</span>

								</li>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">20% or More</span>

								</li>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">30% or More</span>

								</li>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">50% or More</span>

								</li>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">60% or More</span>

								</li>

							</ul>

						</div>

						<!-- //discounts -->

						<!-- reviews -->

						<div class="customer-rev border-bottom left-side py-2">

							<h3 class="agileits-sear-head mb-3">Customer Review</h3>

							<ul>

								<li>

									<a href="name.jsp">

									<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<span name="ee">5.0</span>

									</a>

								</li>

								<li>

									<a href="name1.jsp">

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<span>4.0</span>

									</a>

								</li>

								<li>

									<a href="name2.jsp">

			

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star-half"></i>

										<span name="eee" value="3">3.5</span>

									</a>

								</li>

								<li>

									<a href="#">

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<span>3.0</span>

									</a>

								</li>

								<li>

									<a href="#">

										<i class="fas fa-star"></i>

										<i class="fas fa-star"></i>

										<i class="fas fa-star-half"></i>

										<span>2.5</span>

									</a>

								</li>

							</ul>

						</div>

				

						<!-- //reviews -->

						

						<!-- delivery -->

						<div class="left-side border-bottom py-2">

							<h3 class="agileits-sear-head mb-3">Health Insurance</h3>

							<ul>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">Eligible for Mediclaim, Sasthosathi & other plans</span>

								</li>

							</ul>

						</div>

						<!-- //delivery -->

						<!-- arrivals -->

						<div class="left-side border-bottom py-2">

							<h3 class="agileits-sear-head mb-3">New Arrivals</h3>

							<ul>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">Last 30 days</span>

								</li>

								<li>

									<input type="checkbox" class="checked">

									<span class="span">Last 90 days</span>

								</li>

							</ul>

						</div>

						<!-- //arrivals -->

						<!-- best seller -->

						<div class="f-grid py-2">

							<h3 class="agileits-sear-head mb-3">Best Departments</h3>

							<div class="box-scroll">

								<div class="scroll">

									<div class="row">

										<div class="col-lg-3 col-sm-2 col-3 left-mar">

											<img src="<?php echo base_url('userUploads/ckbirla.jpg') ?>" alt="" class="img-fluid">

										</div>

										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">

											<a href="">Cardiology Department - B.M.Birla</a>

										</div>

									</div>

									<br><br>

									<div class="row">

										<div class="col-lg-3 col-sm-2 col-3 left-mar">

											<img src="<?php echo base_url('userUploads/medical.png') ?>" alt="" class="img-fluid">

										</div>

										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">

											<a href="">Accident and Emergency (A&E) - Medica Superspecialty Hospital</a>

											

										</div>

									</div>

									<br><br>

									<div class="row">

										<div class="col-lg-3 col-sm-2 col-3 left-mar">

											<img src="<?php echo base_url('userUploads/woodlands.jpg') ?>" alt="" class="img-fluid">

										</div>

										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">

											<a href="">Critical Care - Woodlands</a>

											

										</div>

									</div>

									<br><br>

									<div class="row">

										<div class="col-lg-3 col-sm-2 col-3 left-mar">

											<img src="<?php echo base_url('userUploads/ckbirla.jpg') ?>" alt="" class="img-fluid">

										</div>

										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">

											<a href="">Cardiology Department - B.M.Birla</a>

										</div>

									</div>

									<br><br>

									<div class="row">

										<div class="col-lg-3 col-sm-2 col-3 left-mar">

											<img src="<?php echo base_url('userUploads/kothari.png') ?>" alt="" class="img-fluid">

										</div>

										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">

											<a href="">CHEST MEDICINE - Kothari Medical Centre</a>

											

										</div>

									</div>

								</div>

							</div>

						</div>

						<!-- //best seller -->

					</div>

					<!-- //product right -->

				</div>

			</div>

		</div>

	</div>

	<!-- //top products -->



	<!-- middle section -->

	<div class="join-w3l1 py-sm-5 py-4">

		<div class="container py-xl-4 py-lg-2">

			<div class="row">

				<div class="col-lg-6">

					<div class="join-agile text-left p-4">

						<div class="row">

							<div class="col-sm-7 offer-name">

								<h6>Smooth, Rich & Loud</h6>

								<h4 class="mt-2 mb-3">Book your appointment</h4>

								<p>10% off in all associated hospitals appointment booking.</p>

							</div>

							<div class="col-sm-5 offerimg-w3l">

								<img src="<?php echo base_url('userUploads/appointment.jpg') ?>" alt="" class="img-fluid">

							</div>

						</div>

					</div>

				</div>

				<div class="col-lg-6 mt-lg-0 mt-5">

					<div class="join-agile text-left p-4">

						<div class="row ">

							<div class="col-sm-7 offer-name">

								<h6>A Smart Step</h6>

								<h4 class="mt-2 mb-3">Get recommendation</h4>

								<p>Special care for being recommendated.</p>

							</div>

							<div class="col-sm-5 offerimg-w3l">

								<img src="<?php echo base_url('userUploads/hospital.jpeg') ?>" alt="" class="img-fluid">

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- middle section -->



	<!-- footer -->

	<?php include 'footer.php'; ?>

	



	<!-- js-files -->

	<!-- jquery -->

	<script src="<?php echo base_url('js/jquery-2.2.3.min.js') ?>"></script>

	<!-- //jquery -->



	<!-- nav smooth scroll -->

	<script>

		$(document).ready(function () {

			$(".dropdown").hover(

				function () {

					$('.dropdown-menu', this).stop(true, true).slideDown("fast");

					$(this).toggleClass('open');

				},

				function () {

					$('.dropdown-menu', this).stop(true, true).slideUp("fast");

					$(this).toggleClass('open');

				}

			);

		});

	</script>

	<!-- //nav smooth scroll -->



	<!-- popup modal (for location)-->

	<script src="<?php echo base_url('js/jquery.magnific-popup.js') ?>"></script>

	<script>

		$(document).ready(function () {

			$('.popup-with-zoom-anim').magnificPopup({

				type: 'inline',

				fixedContentPos: false,

				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,

				preloader: false,

				midClick: true,

				removalDelay: 300,

				mainClass: 'my-mfp-zoom-in'

			});



		});

	</script>

	<!-- //popup modal (for location)-->



	<!-- cart-js -->

	<script src="<?php echo base_url('js/minicart.js') ?>"></script>

	<script>

		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js



		paypals.minicarts.cart.on('checkout', function (evt) {

			var items = this.items(),

				len = items.length,

				total = 0,

				i;



			// Count the number of each item in the cart

			for (i = 0; i < len; i++) {

				total += items[i].get('quantity');

			}



			if (total < 3) {

				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');

				evt.preventDefault();

			}

		});

	</script>

	<!-- //cart-js -->



	<!-- password-script -->

	<script>

		window.onload = function () {

			document.getElementById("password1").onchange = validatePassword;

			document.getElementById("password2").onchange = validatePassword;

		}



		function validatePassword() {

			var pass2 = document.getElementById("password2").value;

			var pass1 = document.getElementById("password1").value;

			if (pass1 != pass2)

				document.getElementById("password2").setCustomValidity("Passwords Don't Match");

			else

				document.getElementById("password2").setCustomValidity('');

			//empty string means no validation error

		}

	</script>

	<!-- //password-script -->

	

	<!-- scroll seller -->

	<script src="<?php echo base_url('js/scroll.js') ?>"></script>

	<!-- //scroll seller -->



	<!-- smoothscroll -->

	<script src="<?php echo base_url('js/SmoothScroll.min.js') ?>"></script>

	<!-- //smoothscroll -->



	<!-- start-smooth-scrolling -->

	<script src="<?php echo base_url('js/move-top.js') ?>"></script>

	<script src="<?php echo base_url('js/easing.js') ?>"></script>

	<script>

		jQuery(document).ready(function ($) {

			$(".scroll").click(function (event) {

				event.preventDefault();



				$('html,body').animate({

					scrollTop: $(this.hash).offset().top

				}, 1000);

			});

		});

	</script>

	<!-- //end-smooth-scrolling -->



	<!-- smooth-scrolling-of-move-up -->

	<script>

		$(document).ready(function () {

			/*

			var defaults = {

				containerID: 'toTop', // fading element id

				containerHoverID: 'toTopHover', // fading element hover id

				scrollSpeed: 1200,

				easingType: 'linear' 

			};

			*/

			$().UItoTop({

				easingType: 'easeOutQuart'

			});



		});

	</script>

	

	<script type="text/javascript">

	$(document).ready(function($) {

	$('#password1').strength({

	            strengthClass: 'strength',

	            strengthMeterClass: 'strength_meter',

	            strengthButtonClass: 'button_strength',

	            strengthButtonText: 'Show Password',

	            strengthButtonTextToggle: 'Hide Password'

	        });

	});

	</script>

	<!-- //smooth-scrolling-of-move-up -->



	<!-- for bootstrap working -->

	<script src="<?php echo base_url('js/bootstrap.js') ?>"></script>

	<!-- //for bootstrap working -->

	<!-- //js-files -->

	

</body>



</html>

