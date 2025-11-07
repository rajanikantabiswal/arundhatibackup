<?php

// Define banners
$hero_banners = [
	[
		'desktop' => null,
		'mobile' => 'assets/img/hero/banner/m-new-wedding-offer.jpg',
		'link' => null,
	],
	[
		'desktop' => 'assets/img/hero/banner/diamond-banner-1.jpg',
		'mobile' => 'assets/img/hero/banner/m-diamond-banner-1.jpg',
		'link' => null,
	],
	[
		'desktop' => 'assets/img/hero/banner/diamond-banner-2.jpg',
		'mobile' => null, // missing mobile
		'link' => null,
	],
	[
		'desktop' => 'assets/img/hero/banner/app-banner.jpg',
		'mobile' => 'assets/img/hero/banner/m-app-banner.jpg',
		'link' => 'https://play.google.com/store/apps/details?id=com.acme.jewelloApp.arundhati',
	],
];

// Filter desktop & mobile banners separately
$desktop_banners = array_filter($hero_banners, fn($banner) => !empty($banner['desktop']));
$mobile_banners = array_filter($hero_banners, fn($banner) => !empty($banner['mobile']));
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<title>Arundhati Jewellers | Trusted Jewellery Store in Odisha</title>
	<meta name="author" content="Arundhati Jewellers">
	<meta name="description" content="Arundhati jewellers is a Top rated Gold & Diamond Jewellery Store in Bhubaneswar , Odisha. We are Odisha's Largest Jewellery Brand Presence In Nine Cities across Odisha.">

	<meta name="robots" content="INDEX,FOLLOW">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="shortcut icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
	<link rel="icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com/">-->
	<!--<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>-->
	<!--<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Marcellus&amp;display=swap" rel="stylesheet">-->
	<link rel="stylesheet" href="assets/css/app.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="canonical" href="https://www.arundhatijewellers.com/" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		/* 🔵 Dots */
		.swiper-pagination-bullet {
			background: #bbb;
			/* default color */
			opacity: 1;
		}

		.swiper-slide img {
			width: 100% !important;
		}

		.swiper-pagination-bullet-active {
			background: #ff0000ff;
			/* active dot color */
			transform: scale(1.3);
			/* make active dot bigger */
		}

		/* ⬅️ ➡️ Arrows */
		.swiper-button-next,
		.swiper-button-prev {
			background: rgba(0, 0, 0, 0.5);
			color: #fff;
			width: 40px;
			height: 40px;
			border-radius: 50%;
		}

		.swiper-button-next::after,
		.swiper-button-prev::after {
			font-size: 18px;
			/* icon size */
		}

		.swiper-button-next:hover,
		.swiper-button-prev:hover {
			background: #ff0000ff;
		}



		/* Scratch Card CSS */
		/* Fullscreen Modal Overlay */

		.scratch-card-modal.show {
			visibility: visible;
			opacity: 1;
			z-index: 1000;
		}

		.scratch-card-modal {
			visibility: hidden;
			opacity: 0;
			transition: opacity 0.3s ease;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.767);
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.scratch-card-content {
			text-align: center;
			z-index: 1000;
		}

		.scratch-card {
			position: relative;
			border: 4px solid #c7c6cf;
			border-radius: 8px;
			padding: 12px;
			width: 320px;
			height: 320px;
			background-color: #fff;
		}

		.scratch-card-text {
			color: white;
		}

		.scratch-card-cover-container {
			position: absolute;
			z-index: 999;
			top: 0;
			left: 0;
			border-radius: 4px;
			width: 100%;
			height: 100%;
			filter: url("#remove-black");
			transition: opacity 0.4s;

			&.clear {
				opacity: 0;
			}

			&.hidden {
				display: none;
			}
		}

		.scratch-card-canvas {
			position: absolute;
			z-index: 2;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			cursor: grab;
			touch-action: none;

			&.hidden {
				opacity: 0;
			}

			&:active {
				cursor: grabbing;
			}
		}

		.scratch-card-canvas-render {
			position: absolute;
			z-index: 1;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: transparent;
			transition: background-color 0.2s;

			&.hidden {
				display: none;
			}
		}

		.scratch-card-cover {
			display: flex;
			justify-content: center;
			align-items: center;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: #cfced6;
			background-image: linear-gradient(to right,
					#cfced6,
					#e0dfe6,
					#efeef3,
					#e0dfe6,
					#cfced6);
			overflow: hidden;

			&::before {
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-image: linear-gradient(135deg,
						transparent 40%,
						rgb(255 255 255 / 0.8) 50%,
						transparent 60%);
				background-position: bottom right;
				background-size: 300% 300%;
				background-repeat: no-repeat;

				@at-root .scratch-card-cover.shine::before {
					animation: shine 8s infinite;
				}
			}

			@keyframes shine {
				50% {
					background-position: 0% 0%;
				}

				100% {
					background-position: -50% -50%;
				}
			}

			&::after {
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				opacity: 0.1;
				filter: url("#noise");
			}
		}

		.scratch-card-cover-background {
			width: 100%;
			height: 100%;
			fill: #555;
			opacity: 0.1;
		}

		.scratch-card-image {
			border-radius: 4px;
			width: 100%;
			height: 100%;
			object-fit: contain;
			filter: drop-shadow(0 4px 4px rgb(0 0 0 / 0.16));
			user-select: none;
			will-change: transform;

			&.animate {
				animation: pop-out-in cubic-bezier(0.65, 1.35, 0.5, 1) 1s;
			}
		}

		/* Close Button */
		.scratch-card-close {
			position: absolute;
			top: 10px;
			right: 12px;
			background: none;
			border: none;
			font-size: 22px;
			cursor: pointer;
			color: #ffffff;
		}

		.scratch-card-close:hover {
			color: red;
		}

		@keyframes pop-out-in {
			36% {
				transform: scale(1.125);
			}

			100% {
				transform: scale(1);
			}
		}

		#confettiCanvas {
			position: absolute;
			inset: 0;
			width: 100%;
			height: 100%;
			pointer-events: none;
			/* let clicks pass through */
			z-index: 5;
			/* above scratch card but inside modal */
		}

		/* Scratch card css end here */
	</style>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-204029094-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-204029094-1');
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-TKHB0KPFPE"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-TKHB0KPFPE');
	</script>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-TD7LT6L');
	</script>
	<!-- End Google Tag Manager -->

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD7LT6L"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->


	<!-- Meta Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '267432812605648');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=267432812605648&ev=PageView&noscript=1" /></noscript>
	<!-- End Meta Pixel Code -->

	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "JewelryStore",
			"name": "Arundhati Jewellers Pvt. Ltd.",
			"image": "https://www.arundhatijewellers.com/assets/img/hero/logo-red.webp",
			"@id": "",
			"url": "https://www.arundhatijewellers.com/",
			"telephone": "1800 345 0018",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "11/A, Janpath Rd, Satya Nagar, Odisha",
				"addressLocality": "Bhubaneswar",
				"postalCode": "751014",
				"addressCountry": "IN"
			},
			"geo": {
				"@type": "GeoCoordinates",
				"latitude": 20.2801094,
				"longitude": 85.8440972
			},
			"openingHoursSpecification": {
				"@type": "OpeningHoursSpecification",
				"dayOfWeek": [
					"Monday",
					"Tuesday",
					"Wednesday",
					"Thursday",
					"Friday",
					"Saturday",
					"Sunday"
				],
				"opens": "10:00",
				"closes": "21:00"
			},
			"sameAs": [
				"https://www.facebook.com/arundhatijewellersofficial",
				"https://twitter.com/ArundhatiJewel",
				"https://www.instagram.com/arundhatijewellersofficial/",
				"https://www.youtube.com/@ArundhatiJewellers",
				"https://www.linkedin.com/in/arundhatijewellers/",
				"https://in.pinterest.com/Arundhatiofficial/",
				"https://www.arundhatijewellers.com/"
			]
		}
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-438879242">
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'AW-438879242');
	</script>
</head>

<body class="home-4">
	<!--    <script src="https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js"></script>-->
	<!--<script>-->
	<!--    var sf = new Snowflakes({-->
	<!--        color: "#ffffff"-->
	<!--    });-->
	<!--</script> -->

	<?php include 'header.php'; ?>

	<!-- 🖥️ Desktop Slider -->
	<?php if (!empty($desktop_banners)): ?>
		<div class="hero-section d-none d-md-block">
			<div class="swiper hero-swiper-desktop">
				<div class="swiper-wrapper">
					<?php foreach ($desktop_banners as $banner): ?>
						<div class="swiper-slide bg-black">
							<?php if (!empty($banner['link'])): ?>
								<a href="<?php echo $banner['link']; ?>" target="_blank">
									<img src="<?php echo $banner['desktop']; ?>" alt="Desktop Banner">
								</a>
							<?php else: ?>
								<img src="<?php echo $banner['desktop']; ?>" alt="Desktop Banner">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>

				<!-- Controls -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	<?php endif; ?>


	<!-- 📱 Mobile Slider -->
	<?php if (!empty($mobile_banners)): ?>
		<div class="hero-section d-md-none">
			<div class="swiper hero-swiper-mobile">
				<div class="swiper-wrapper">
					<?php foreach ($mobile_banners as $banner): ?>
						<div class="swiper-slide bg-black">
							<?php if (!empty($banner['link'])): ?>
								<a href="<?php echo $banner['link']; ?>" target="_blank">
									<img src="<?php echo $banner['mobile']; ?>" alt="Mobile Banner">
								</a>
							<?php else: ?>
								<img src="<?php echo $banner['mobile']; ?>" alt="Mobile Banner">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>

				<!-- Controls -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	<?php endif; ?>



	<!-- <div class="swiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide"><img src="assets/img/hero/diwali-banner.jpg"></div>
			<div class="swiper-slide"><img src="assets/img/hero/d-banner-1.jpg"></div>
			<div class="swiper-slide"><img src="assets/img/hero/d-banner-2.jpg"></div>
			<div class="swiper-slide"><a href="https://play.google.com/store/apps/details?id=com.acme.jewelloApp.arundhati" target="_blank"><img src="assets/img/hero/d-banner-3.jpg"></a></div>

		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-pagination"></div>
	</div> -->

	<section>
		<div class="container">
			<div class="row">
				<div class="title-area text-center" data-wow-delay="0.2s"><br /><br />
					<span class="sec-subtitle">Our 5 Star Promise 2</span>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-2">
					<center><img src="assets/img/hero/free-service.png" style="width:70px;"></center>
					<p class="text-center">Life Time Free Services</p>
				</div>
				<div class="col-lg-2">
					<center><img src="assets/img/hero/icon-2.png" style="width:70px;"></center>
					<p class="text-center">Unique Design</p>
				</div>
				<div class="col-lg-2">
					<center><img src="assets/img/hero/icon-3.webp" style="width:70px;"></center>
					<p class="text-center">Free Insurance On Jewellery</p>
				</div>
				<div class="col-lg-2">
					<center><img src="assets/img/hero/icon-4.png" style="width:70px;"></center>
					<p class="text-center">Hall Mark Purity & 100% Exchange Value</p>
				</div>
				<div class="col-lg-2">
					<center><img src="assets/img/hero/icon-5.png" style="width:70px;"></center>
					<p class="text-center">Assured Happiness on Every Purchase</p>
				</div>
				<div class="col-lg-1"></div>
			</div>
		</div>
	</section>


	<br /><br />
	<section>
		<div class="title-area text-center" data-wow-delay="0.2s">
			<span class="sec-subtitle">Wide Range Of Category</span>
			<h2 class="sec-title6">Shop By Categories</h2>
			<div class="sec-shape mb-5 pb-1"><img src="assets/img/shape/sec-shape-1.png" alt="shape"></div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/necklace/"><img src="assets/img/hero/necklace-catg.webp" alt="banner"></a>
						<h5 class="text-center">Necklace</h5>
					</div>
				</div>

				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/bangles/"><img src="assets/img/hero/bangle-catg.webp" alt="banner"></a>
						<h5 class="text-center">Bangles</h5>
					</div>
				</div>

				<div class="col-md-3" data-wow-delay="0.2s">

					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/earrings/"><img src="assets/img/hero/earing-catg.webp" alt="banner"></a>
						<h5 class="text-center">Earrings</h5>
					</div>
				</div>

				<div class="col-md-3" data-wow-delay="0.2s">

					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/mangalsutra"><img src="assets/img/hero/mangalsutra-catg.webp" alt="banner"></a>
						<h5 class="text-center">Mangalsutra</h5>
					</div>
				</div>

				<div class="col-md-3" data-wow-delay="0.2s">

					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/rings/"><img src="assets/img/hero/ring-catg.webp" alt="banner"></a>
						<h5 class="text-center">Rings</h5>
					</div>
				</div>

				<div class="col-md-3" data-wow-delay="0.2s">

					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/chains/"><img src="assets/img/hero/chain-catg.png" alt="banner"></a>
						<h5 class="text-center">Chains</h5>
					</div>
				</div>

				<div class="col-md-3" data-wow-delay="0.2s">

					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/bracelets/"><img src="assets/img/hero/menbracelet-catg.png" alt="banner"></a>
						<h5 class="text-center">Bracelets</h5>
					</div>
				</div>

				<div class="col-md-3" data-wow-delay="0.2s">

					<div class="banner-style2 mega-hover">
						<a href="https://www.arundhatijewellers.com/shop/product-category/gifts/"><img src="assets/img/hero/menchain-catg.png" alt="banner"></a>
						<h5 class="text-center">Gifts</h5>
					</div>
				</div>


			</div>
		</div>
	</section>



	<!--</div><br/>-->
	<br /><br />
	<div class="position-relative space-extra-bottom">
		<div class="gallery-shape1"></div>
		<span class="sec-subtitle text-center">Culture & Fashion</span>
		<h2 class="sec-title6 text-center">Our Collections</h1>
			<div class="sec-shape mb-5 pb-1 text-center"><img src="assets/img/shape/sec-shape-1.png" alt="shape"></div>
			<div class="container">
				<div class="row vs-carousel" data-arrows="true" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2">
					<div class="col-xl-3">
						<div class="team-style1">
							<div class="team-img">
								<a href="https://www.arundhatijewellers.com/shop/product-category/collections/arka-collections/"><img src="assets/img/hero/Archita_1.webp" alt="member"></a>
							</div>

						</div>
					</div>
					<div class="col-xl-3">
						<div class="team-style1">
							<div class="team-img">
								<a href="https://www.arundhatijewellers.com/shop/product-category/collections/shagun-collections/"><img src="assets/img/hero/Archita_2.webp" alt="member"></a>
							</div>

						</div>
					</div>
					<div class="col-xl-3">
						<div class="team-style1">
							<div class="team-img">
								<a href="https://www.arundhatijewellers.com/shop/product-category/collections/aadya-collections/"><img src="assets/img/hero/Archita_3.webp" alt="member"></a>
							</div>

						</div>
					</div>
					<div class="col-xl-3">
						<div class="team-style1">
							<div class="team-img">
								<a href="https://www.arundhatijewellers.com/shop/product-category/collections/ameyaa-collections/"><img src="assets/img/hero/Archita_4.webp" alt="member"></a>
							</div>

						</div>
					</div>
					<div class="col-xl-3">
						<div class="team-style1">
							<div class="team-img">
								<a href="https://www.arundhatijewellers.com/shop/product-category/collections/riwaz-collections/"><img src="assets/img/hero/Archita_5.webp" alt="member"></a>
							</div>

						</div>
					</div>
					<div class="col-xl-3">
						<div class="team-style1">
							<div class="team-img">
								<a href="https://www.arundhatijewellers.com/shop/product-category/collections/zivah-collections/"><img src="assets/img/hero/Archita_6.webp" alt="member"></a>
							</div>
						</div>
					</div>
				</div>


			</div>

	</div>
	</div>




	<!-- <section class="space-extra-top space-bottom">
							<div class="shape-mockup jump-reverse-img d-none d-xxl-block d-hd-none" data-top="4%" data-left="-3%">
								<div class="curb-shape1"></div>
							</div>
							<div class="shape-mockup jump-img d-none d-lg-block" data-top="6%" data-right="39.2%">
								<span class="big-letter">A</span>
							</div>
							<div class="container">
								<div class="row gx-xl-0">
									<div class="col-lg-6 col-xl-7 mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s"><div class="img-box1">
										<img src="assets/img/about/about-1-1.png" alt="about">
										<div class="img-1 jump-reverse">
											<img src="assets/img/shape/leaf-1-5.png" alt="">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-xl-5 align-self-center wow fadeInUp" data-wow-delay="0.3s">
									<span class="sec-subtitle">Experience Wellnez <span class="sec-subtext">25 Years</span></span>
									<h2 class="sec-title">Body Treatments</h2>
									<div class="media-style1">
										<div class="circle-btn style3">
											<a href="about.html" class="btn-icon">
												<i class="far fa-arrow-right"></i>
											</a>
											<div class="btn-text">
												<svg viewBox="0 0 150 150">
													<text>
														<textPath href="#textPath">how to make your makeup last all day</textPath>
													</text>
												</svg>
											</div>
										</div>
										<div class="media-body">
											<p class="media-text">We think your skin should look and refshed matter your lifestyle Wellnez.</p>
										</div>
									</div>
									<p class="about-text">There are many variations of passages of Lofrem the Ipsum availaasble, but the majority have suffered alteration in some form injected.</p>
									<a href="about.html" class="vs-btn style3">View More</a>
								</div>
							</div>
						</div>
					</section> -->
	<br /><br />
	<section class="overflow-hidden  space-extra-bottom bg-gradient-2">
		<div class="shape-mockup jump-reverse-img d-none d-xxl-block" data-top="22%" data-left="-7%">
			<div class="curb-shape1"></div>
		</div>
		<div class="container">
			<div class="row gx-55">
				<div class="col-lg-5 col-xxl-auto align-self-center wow fadeInUp" data-wow-delay="0.2s">
					<span class="sec-subtitle">Join Now Our</span>
					<h2 class="sec-title3">Gold Saving <span class="text-theme">Scheme</span></h2>
					<p class="quote-text">Come and witness the luxurious design which is crafted with pure love and dignity. We assureyou the quality which is maintained by us.</p>
					<div class="package-btn">
						<a href="savingscheme-enroll.php" class="vs-btn style3">Read More</a>
					</div>
				</div>
				<div class="col-lg-7 col-xxl align-self-center wow fadeInUp" data-wow-delay="0.3s">
					<div class="px-xxl-4 mx-xxl-3 pb-md-4 pb-lg-0">
						<div>
							<img src="assets/img/hero/gold-saving.jpg" alt="about">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="overflow-hidden bg-gradient-2">
		<div class="container">
			<div class="row">
				<div class="col-md-6 py-4">
					<a href="https://www.arundhatijewellers.com/shop/gold-exchange/" target="_blank;"><img src="assets/img/hero/of-2.webp"></a>
				</div>
				<div class="col-md-6 py-4">
					<img src="assets/img/hero/of-1.webp">
				</div>
			</div>
		</div>
	</section>

	<!-- <section class="space-top space-extra-bottom" data-bg-src="assets/img/hero/sbg-new.jpg">
						<div class="container">
							<div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
								<span class="sec-subtitle">Smiles</span>
								<h2 class="sec-title">Reason of Client's Happiness</h2>
								<div class="sec-shape">
									<img src="assets/img/shape/sec-shape-1.png" alt="shape">
								</div>
							</div>
							<div class="row vs-carousel arrow-margin wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-md-slide-show="2" data-arrows="true">
								<div class="col-xl-6">
									<div class="vs-blog blog-style1">
										<div class="blog-img">
											<a href="">
												<img src="assets/img/hero/review1.png" alt="Blog Thumbnail" class="w-100">
											</a>
										</div>
										
									</div>
								</div>
								<div class="col-xl-6">
									<div class="vs-blog blog-style1">
										<div class="blog-img">
											<a href="">
												<img src="assets/img/hero/review2.png" alt="Blog Thumbnail" class="w-100">
											</a>
										</div>
										
									</div>
								</div>
								<div class="col-xl-6">
									<div class="vs-blog blog-style1">
										<div class="blog-img">
											<a href="">
												<img src="assets/img/hero/review2.png" alt="Blog Thumbnail" class="w-100">
											</a>
										</div>
										
									</div>
								</div>
								<div class="col-xl-6">
									<div class="vs-blog blog-style1">
										<div class="blog-img">
											<a href="">
												<img src="assets/img/hero/review2.png" alt="Blog Thumbnail" class="w-100">
											</a>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
					</section> -->

	<section class="space-top space-extra-bottom" data-bg-src="assets/img/bg/testi-bg-2-1.jpg">

		<div class="shape-mockup jump d-none d-xxl-block" data-top="35%" data-left="17.5%">

		</div>
		<div class="container">
			<div class="title-area text-center">
				<span class="sec-subtitle">Spreading Love</span>
				<h2 class="sec-title3">Love For Diamond</h2>
			</div>
			<div class="pb-1px"></div>

		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/necklace-diamond/"><img src="assets/img/hero/d-necklace-catg.webp" alt="banner"></a>
						</div>

					</div>
				</div>
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/ear-ring-diamond/"><img src="assets/img/hero/d-earing-catg.webp" alt="banner"></a>
						</div>

					</div>
				</div>
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<img src="assets/img/hero/d-bracelet-catg.webp" alt="banner">
						</div>

					</div>
				</div>
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<img src="assets/img/hero/d-mangalsutra-catg.webp" alt="banner">
						</div>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/"><img src="assets/img/hero/d-bangle-catg.webp" alt="banner"></a>
						</div>

					</div>
				</div>
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<img src="assets/img/hero/d-nosepin-catg.webp" alt="banner">
						</div>

					</div>
				</div>
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<img src="assets/img/hero/d-ring-catg.webp" alt="banner">
						</div>

					</div>
				</div>
				<div class="col-md-3" data-wow-delay="0.2s">
					<div class="mega-hover">
						<div class="banner-img">
							<img src="assets/img/hero/d-pendent-catg.webp" alt="banner">
						</div>

					</div>
				</div>
			</div>

		</div>
	</section>

	<br /><br />
	<section class="space-bottom">
		<div class="container">
			<div class="row text-center justify-content-center">
				<div class="col-xxl-8 col-xl-9 col-lg-11">
					<div class="title-area">
						<span class="sec-subtitle">Special Day</span>
						<h2 class="sec-title3">Gifts & Celebrations</h2>
						<p>We have wide range of gifting collection for all types of celebrations, Choose your favourite one.
						</p>
					</div>
				</div>
			</div>
			<div class="row gy-gx">

				<div class="col-lg-3">
					<div class="row gy-gx">
						<div class="col-sm-6 col-xl-12 order-1 order-sm-0">
							<div class="mega-hover">
								<img src="assets/img/hero/spcl-day.webp" alt="Gallery Image" class="w-100">
							</div>
						</div>
						<div class="col-sm-6 col-xl-12 order-0 order-sm-1">
							<div class="mega-hover">
								<a href="https://www.arundhatijewellers.com/shop/product-category/gifts/valentines-day/"><img src="assets/img/hero/diamond-cl.webp" alt="Gallery Image" class="w-100"></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mega-hover">
						<a href="https://arundhatijewellers.com/shop/customised-jewellery/" target="_blank;"><img src="assets/img/hero/customisation-jewel.webp" alt="shape" class="w-100"> </a>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="row gy-gx">
						<div class="col-sm-6 col-xl-12 order-1 order-sm-0">
							<div class="mega-hover">
								<img src="assets/img/hero/party.webp" alt="Gallery Image" class="w-100">
							</div>
						</div>
						<div class="col-sm-6 col-xl-12 order-0 order-sm-1">
							<div class="mega-hover">
								<img src="assets/img/hero/festival.webp" alt="Gallery Image" class="w-100">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--<section class="space">-->
	<!--	<div class="shape-mockup jump-img d-none d-xl-block" data-right="0" data-bottom="-9%">-->
	<!--		<img src="assets/img/hero/hero-leaf-3.png" alt="shape">-->
	<!--	</div>-->
	<!--	<div class="shape-mockup jump-reverse-img d-none d-xl-block" data-left="0" data-bottom="-13%">-->

	<!--	</div>-->
	<!--	<div class="container">-->
	<!--		<div class="row gx-0">-->
	<!--			<div class="col-lg-6 col-xl-5 wow fadeInUp" data-wow-delay="0.2s">-->
	<!--				<img src="assets/img/hero/ar2.jpg">-->
	<!--			</div>-->
	<!--			<div class="col-lg-6 col-xl-7 wow fadeInUp" data-wow-delay="0.3s">-->
	<!--				<div class="testi-style1" data-bg-src="assets/img/bg/testi-bg-1-1.png">-->
	<!--					<h2 class="inner-title">Our Top Reviews</h2>-->
	<!--					<p class="inner-subtitle">Happy Customer Quotes</p>-->
	<!--					<div class="vs-carousel" data-slide-show="1" data-fade="true" id="testislide1">-->
	<!--						<div>-->
	<!--							<div class="testi-body">-->
	<!--								<img src="assets/img/hero/review1.PNG">-->
	<!--							</div>-->
	<!--						</div>-->
	<!--						<div>-->
	<!--							<div class="testi-body">-->
	<!--								<img src="assets/img/hero/review2.PNG">-->
	<!--							</div>-->
	<!--						</div>-->
	<!--						<div>-->
	<!--							<div class="testi-body">-->
	<!--								<img src="assets/img/hero/review3.PNG">-->
	<!--							</div>-->
	<!--						</div>-->
	<!--						<div>-->
	<!--							<div class="testi-body">-->
	<!--								<img src="assets/img/hero/review4.PNG">-->
	<!--							</div>-->
	<!--						</div>-->
	<!--						<div>-->
	<!--							<div class="testi-body">-->
	<!--								<img src="assets/img/hero/review5.PNG">-->
	<!--							</div>-->
	<!--						</div>-->
	<!--					</div>-->
	<!--					<div class="slide-btns">-->
	<!--						<button data-slick-prev="#testislide1"><i class="far fa-angle-left"></i></button> -->
	<!--						<button data-slick-prev="#testislide1"><i class="far fa-angle-right"></i></button>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->

	<!--		</div>-->
	<!--		<a href="https://www.google.com/search?client=firefox-b-d&q=arundhati+jewellers&bshm=lbse/1#lrd=0x3a19a731adcb39a3:0x7e0cadbad99515b4,1,,,," target="_blank"; class="vs-btn style2 d-none d-xl-inline-block">All Reviews</a>-->
	<!--	</div>-->
	<!--</section>-->

	<section class="space-extra-bottom">
		<div class="container">
			<div class="title-area text-center" data-wow-delay="0.2s">
				<span class="sec-subtitle">Limelight</span>
				<h2 class="sec-title3">Awards & Achievements</h2>
				<div class="sec-shape">
					<img src="assets/img/shape/sec-shape-1.png" alt="shape">
				</div>
			</div>
			<div class="row vs-carousel arrow-margin wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-md-slide-show="2" data-arrows="true">

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/et-now-top-50-jewellery-brand.jpg" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Top 50 Jewellery Brand in India by ET Now</a>
							</h3>
						</div>
					</div>
				</div>

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/next-gen-award.jpg" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Next Gen Awards By Preferred Retailers Of India 2025</a>
							</h3>
						</div>
					</div>
				</div>

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/preffered-retailers-25.jpg" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Preferred Retailers Of India 2025</a>
							</h3>
						</div>
					</div>
				</div>

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/100eliteaward.jpg" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">"Game Changer” in Elite 100 Change Makers of 2024 by Interview Times</a>
							</h3>
						</div>
					</div>
				</div>

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/best-ce-award.jpg" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Best customer experience at the Retail Jeweller MD&CEO Awards 2025</a>
							</h3>
						</div>
					</div>
				</div>

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/times-of-india.webp" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Times icons of odisha 2024 by the times of india group with the esteemed presence of honorable Deputy CM Smt. Pravati Parida</a>
							</h3>
						</div>
					</div>
				</div>

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/award-gjc.webp" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Preferred Retailer of India | GJC 2024 Mumbai</a>
							</h3>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/otv-award1.webp" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Best innovation in Jewellery Design 2023 | OTV Business Award</a>
							</h3>
						</div>
					</div>
				</div>



				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/awards7.png" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">First ever National Award as the Leading Regional chain of the year – EAST
									At The Retail Jeweller MD & CEO Awards 2023 </a>
							</h3>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/awards6.png" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Felicitated By Dia Mirza
									At INWEC Fashion & Lifestyle Mela </a>
							</h3>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/awards4.png" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">“GAON TO GLOBAL” Leadership Recognition by
									WOSACA Parivar, Hyderabad </a>
							</h3>

						</div>
					</div>
				</div>

				<div class="col-xl-4">
					<div class="vs-blog blog-style1">
						<div class="blog-img">
							<a href="#">
								<img src="assets/img/hero/awards3.webp" alt="Blog Thumbnail" class="w-100">
							</a>
						</div>
						<div class="blog-content">
							<h3 class="blog-title h5">
								<a href="#">Honourable Speaker of Odisha Assembly, Surjya Narayan Patro has delivered
									The prestigious UDDAN award of Zee TV </a>
							</h3>

						</div>
					</div>
				</div>
			</div>
			<center><a href="gallery.php" class="vs-btn style3">View More</a></center>
		</div>
	</section>

	<section class="space-extra-bottom">
		<div class="container">
			<div class="title-area text-center" data-wow-delay="0.2s">
				<span class="sec-subtitle">Google Reviews</span>
				<h2 class="sec-title3">What People Are Saying About Us</h2>
				<div class="sec-shape">
					<img src="assets/img/shape/sec-shape-1.png" alt="shape">
				</div>
			</div>
			<div class="row vs-carousel arrow-margin wow fadeInUp" data-wow-delay="0.3s" data-slide-show="1" data-md-slide-show="1" data-arrows="true">

				<div class="col-xl-12">
					<div class="vs-blog blog-style1">

						<div class="blog-content">

							<h6>We had a really good experience at Arundhati Jewellers. The staff were extremely coordinating and polite.Even we got to see a lot of amazing designs and most importantly they give you discounts too. A must visit for all your jewellery solutions.</h6>

						</div>
						<div class="blog-img text-center">
							<a href="#">
								<img src="assets/img/hero/suchismita-review.png" alt="" class="">
							</a>
							<p><a href="#">Suchismita Mishra</a></p>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<div class="vs-blog blog-style1">

						<div class="blog-content">

							<h6>I have been a customer since 2018. Regularly purchasing. Well managed showroom with varieties and executives are there to attend you. Good collection and I have also acquaintance with some employees due to regular customer. Most gold showrooms in the city,I have known persons as they keep changing jobs. The manager here is also known to me from another shop where he worked earlier as executive. Promotions,offers are there throughout the year. Give this place a try. During dhanteras, this shop like many others are filled with crowd and executives get very buy. So, if you are planning to buy,then plan accordingly on that particular day. Offers for every occasion and with discounts on making charge</h6>

						</div>
						<div class="blog-img text-center">
							<a href="#">
								<img src="assets/img/hero/paratha-review.png" alt="" class="">
							</a>
							<p><a href="#">Parthasarathi Dash</a></p>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<div class="vs-blog blog-style1">

						<div class="blog-content">

							<h6>We are a regular customer of Arundhanti. Each time we come to buy anything, we always love the experience here. This time we have got the service from Madhusmita Rout and she was extremely professional and helpful ❤️</h6>

						</div>
						<div class="blog-img text-center">
							<a href="#">
								<img src="assets/img/hero/man-icon.png" alt="" class="">
							</a>
							<p><a href="#">Suman Khuntia</a></p>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<div class="vs-blog blog-style1">

						<div class="blog-content">

							<h6>One of the best jwellery shop in bhubaneswar.. Great customer experience. One of the sales executive named Pragyan is most humble person I ever met. We are very much satisfied with the service. Had a great purchase.️</h6>

						</div>
						<div class="blog-img text-center">
							<a href="#">
								<img src="assets/img/hero/bhagyashree-review.png" alt="" class="">
							</a>
							<p><a href="#">Bhagyashree Patra</a></p>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<div class="vs-blog blog-style1">

						<div class="blog-content">

							<h6>Subhashreeta Pattnaik is well behaved and well mannered. She help so much in choosing jewellery.
								Arundhati jewellers customer service is too good.Good and different varieties of collection , I'm loving it️</h6>
						</div>
					</div>
					<div class="blog-img text-center">
						<a href="#">
							<img src="assets/img/hero/man-icon.png" alt="" class="">
						</a>
						<p><a href="#">Bibhuti Bhusan Behera</a></p>
					</div>
				</div>
			</div>

		</div>

		</div>

		</div>
	</section>

	<section class="overflow-hidden bg-gradient-2" style="margin-top:-30px !important;">
		<div class="container">
			<div class="title-area text-center" data-wow-delay="0.2s">
				<span class="sec-subtitle">Testimonial</span>
				<h2 class="sec-title3">Stories That Inspire</h2>
				<div class="sec-shape">
					<img src="assets/img/shape/sec-shape-1.png" alt="shape">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<iframe height="455" src="https://www.youtube.com/embed/ajIS-IbRQhE">
					</iframe>
				</div>
				<div class="col-md-4">
					<iframe height="455" src="https://www.youtube.com/embed/ZmcH6IAneXg">
					</iframe>
				</div>
				<div class="col-md-4">
					<iframe height="455" src="https://www.youtube.com/embed/TlYdyQJ2Wlo">
					</iframe>
				</div>
			</div>
		</div><br />
		<center><a href="https://www.youtube.com/@ArundhatiJewellers/videos" class="vs-btn style3" target="_blank">View More</a></center>
	</section>

	<!-- Scratch Card Section -->
	<div class="scratch-card-modal" id="scratchCardModal">
		<div>
			<button id="closeScratchCard" class="scratch-card-close">✕</button>
		</div>
		<div class="scratch-card-content">
			<div class="scratch-card">
				<div class="scratch-card-cover-container">
					<canvas
						class="scratch-card-canvas"
						width="320"
						height="320"></canvas>
					<!-- only needed for Safari and iOS browsers -->
					<img class="scratch-card-canvas-render hidden" alt="" />
					<div class="scratch-card-cover shine">
						<svg
							class="scratch-card-cover-background"
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 320 320">
							<path
								d="M72.417 85.633a2 2 0 1 0-3.42-2.075l-3.113 5.129a2 2 0 1 0 3.42 2.075l3.113-5.129zm-8.301 13.679a2 2 0 1 0-3.42-2.075l-3.113 5.129a2 2 0 0 0 3.42 2.075l3.113-5.129zm11.997 1.432a2 2 0 0 1-2.747.672l-5.129-3.113a2 2 0 1 1 2.075-3.42l5.129 3.113a2 2 0 0 1 .672 2.748zm-16.425-7.629a2 2 0 1 0 2.075-3.42l-5.129-3.113a2 2 0 1 0-2.075 3.42l5.129 3.113z" />
							<path
								fill-rule="evenodd"
								d="M262.093 121.254a2 2 0 1 0-3.873-1.001l-1.502 5.809a2 2 0 1 0 3.873 1.001l1.502-5.809zm-4.004 15.491a2 2 0 1 0-3.873-1.001l-1.502 5.809a2 2 0 1 0 3.873 1.001l1.502-5.809zm11.9-2.088a2 2 0 0 1-2.437 1.436l-5.809-1.502a2 2 0 1 1 1.001-3.873l5.809 1.502a2 2 0 0 1 1.436 2.437zm-17.927-2.569a2 2 0 0 0 2.437-1.436 2 2 0 0 0-1.436-2.436l-5.809-1.502a2 2 0 0 0-2.437 1.435 2 2 0 0 0 1.436 2.437l5.809 1.502z" />
							<path
								d="M196.858 235.528a2 2 0 0 0-2.437-1.435 2 2 0 0 0-1.435 2.437l1.504 5.809a2 2 0 1 0 3.872-1.003l-1.504-5.808zm4.01 15.489a2 2 0 0 0-2.437-1.435 2 2 0 0 0-1.435 2.437l1.504 5.809a2 2 0 1 0 3.872-1.003l-1.504-5.808zm9.396-7.597a2 2 0 0 1-1.435 2.437l-5.809 1.504a2 2 0 1 1-1.002-3.873l5.808-1.503a2 2 0 0 1 2.438 1.435zm-16.924 6.447a2 2 0 1 0-1.003-3.873l-5.808 1.504a2 2 0 1 0 1.002 3.873l5.809-1.504zm-129.604 20.16a2 2 0 1 0 3.032-2.609l-3.913-4.548a2 2 0 1 0-3.032 2.609l3.913 4.548zm14.42-3.173a2 2 0 0 0-2.609-3.032l-4.548 3.914a2 2 0 0 0 2.609 3.032l4.548-3.914zM66.027 277.29a2 2 0 1 0-2.609-3.032l-4.548 3.913a2 2 0 1 0 2.609 3.032l4.548-3.913zm10.965 5.077a2 2 0 0 1-2.82-.212l-3.913-4.548a2 2 0 0 1 3.032-2.609l3.913 4.548a2 2 0 0 1-.212 2.821z" />
							<g fill-rule="evenodd">
								<path
									d="M138.629 74.686a2 2 0 0 1 1.66 2.29l-.787 4.936c-1.184 7.422-10.292 10.36-15.589 5.028-3.163-3.183-8.602-1.12-8.858 3.36l-.325 5.701a2 2 0 1 1-3.994-.228l.326-5.701c.452-7.935 10.086-11.59 15.688-5.952 2.991 3.01 8.134 1.351 8.802-2.839l.787-4.936a2 2 0 0 1 2.29-1.66zm129.754 151.907c-3.652-2.608-8.668.338-8.169 4.798.836 7.469-7.16 12.727-13.686 8.999l-4.34-2.479a2 2 0 0 1 1.984-3.473l4.34 2.479c3.684 2.104 8.199-.864 7.727-5.081-.884-7.899 8-13.117 14.469-8.498l4.647 3.318a2 2 0 1 1-2.325 3.256l-4.647-3.319zM219.458 34.1a2 2 0 0 1 .733-2.732l4.33-2.497c6.51-3.754 14.528 1.471 13.723 8.943-.481 4.462 4.547 7.387 8.189 4.764l4.633-3.338a2 2 0 0 1 2.338 3.246l-4.633 3.338c-6.45 4.646-15.356-.536-14.504-8.439.455-4.219-4.073-7.169-7.748-5.049l-4.33 2.497a2 2 0 0 1-2.731-.733zM43.604 115.569a2 2 0 0 1-1.242 2.541l-4.727 1.623c-4.013 1.378-4.764 6.729-1.285 9.158 6.517 4.551 4.571 14.669-3.169 16.478l-5.56 1.3a2 2 0 0 1-.91-3.895l5.561-1.3c4.37-1.021 5.468-6.734 1.789-9.303-6.162-4.303-4.832-13.78 2.276-16.221l4.727-1.623a2 2 0 0 1 2.541 1.242zM77.095 219.2a2 2 0 0 1 2.043-1.956l4.997.108c7.514.162 11.664 8.786 7.103 14.76-2.723 3.566.061 8.674 4.535 8.318l5.693-.454a2 2 0 1 1 .317 3.988l-5.692.453c-7.923.631-12.855-8.415-8.031-14.733 2.575-3.372.232-8.241-4.01-8.333l-4.997-.108a2 2 0 0 1-1.956-2.043zm-14.771-64.574l-.78-.855.129 1.15a8 8 0 0 1-4.645 8.177l-1.054.478h0l1.134.233a8 8 0 0 1 6.341 6.945l.129 1.15.572-1.006a8 8 0 0 1 8.565-3.885l1.134.232-.78-.854a8 8 0 0 1-1.048-9.346l.572-1.006-1.054.478a8 8 0 0 1-9.212-1.891zm-8.003 5.308c-3.529 1.6-2.948 6.781.848 7.561l1.134.232a4 4 0 0 1 3.171 3.473l.129 1.15c.432 3.85 5.539 4.899 7.453 1.53l.572-1.007a4 4 0 0 1 4.282-1.942l1.134.233c3.796.779 6.371-3.754 3.758-6.616l-.78-.854a4 4 0 0 1-.524-4.673l.572-1.007c1.914-3.369-1.602-7.219-5.13-5.618l-1.054.478a4 4 0 0 1-4.606-.946l-.78-.854c-2.613-2.862-7.361-.708-6.929 3.143l.129 1.15a4 4 0 0 1-2.323 4.089l-1.054.478zM110.956 46.42l1.794-1.614-2.4.251a8 8 0 0 1-8.142-4.707l-.98-2.205-.503 2.36a8 8 0 0 1-6.993 6.289l-2.4.251 2.089 1.208-1.856 3.209 1.856-3.209a8 8 0 0 1 3.82 8.594l-.503 2.36 1.794-1.614a8 8 0 0 1 9.353-.977l2.089 1.208-.98-2.205a8 8 0 0 1 1.961-9.198zm4.469 1.36c2.881-2.591.764-7.355-3.09-6.952l-2.401.251a4 4 0 0 1-4.071-2.354l-.98-2.205c-1.574-3.541-6.759-2.999-7.567.791l-.503 2.36a4 4 0 0 1-3.496 3.144l-2.4.251c-3.854.403-4.941 5.502-1.586 7.441l2.089 1.208a4 4 0 0 1 1.91 4.297l-.503 2.36c-.808 3.79 3.706 6.399 6.587 3.808l1.794-1.614a4 4 0 0 1 4.677-.489l2.089 1.208c3.355 1.939 7.232-1.547 5.658-5.088l-.981-2.205a4 4 0 0 1 .981-4.599l1.794-1.614zm104.847 31.673l.737-4.207-3.069 2.97a8 8 0 0 1-9.312 1.32l-3.773-2.001 1.877 3.836a8 8 0 0 1-1.623 9.264l-3.068 2.97 4.228-.599a8 8 0 0 1 8.309 4.406l1.876 3.837.737-4.207a8 8 0 0 1 6.758-6.541l4.228-.599-3.773-2.001a8 8 0 0 1-4.132-8.448zm4.677-3.517c.668-3.817-3.938-6.259-6.722-3.564l-3.069 2.97a4 4 0 0 1-4.656.66l-3.773-2.001c-3.423-1.815-7.17 1.811-5.467 5.292l1.877 3.836a4 4 0 0 1-.812 4.632l-3.068 2.97c-2.785 2.695-.494 7.378 3.343 6.835l4.228-.599a4 4 0 0 1 4.155 2.203l1.876 3.836c1.703 3.481 6.865 2.75 7.533-1.067l.737-4.207a4 4 0 0 1 3.379-3.27l4.229-.599c3.836-.544 4.736-5.679 1.312-7.494l-3.773-2.001a4 4 0 0 1-2.066-4.224l.737-4.207zM167.501 279.54l1.588-.913-1.821-.195a8 8 0 0 1-6.976-6.307l-.377-1.793-.748 1.672a8 8 0 0 1-8.155 4.685l-1.821-.195 1.358 1.228a8 8 0 0 1 1.936 9.203l-.748 1.672 1.588-.912a8 8 0 0 1 9.351 1.002l1.359 1.229-.377-1.793a8 8 0 0 1 3.843-8.583zm3.581 2.556c3.36-1.931 2.287-7.033-1.566-7.446l-1.822-.195a4 4 0 0 1-3.487-3.154l-.378-1.792c-.797-3.792-5.981-4.348-7.565-.812l-.748 1.672a4 4 0 0 1-4.077 2.343l-1.822-.195c-3.853-.414-5.983 4.345-3.109 6.944l1.359 1.228a4 4 0 0 1 .968 4.602l-.749 1.672c-1.583 3.536 2.284 7.033 5.644 5.103l1.588-.913a4 4 0 0 1 4.675.501l1.359 1.229c2.874 2.599 7.395.001 6.597-3.79l-.377-1.793a4 4 0 0 1 1.922-4.292l1.588-.912zm123.357-94.108l1.83-.08-1.528-1.011a8 8 0 0 1-3.298-8.807l.489-1.765-1.433 1.141a8 8 0 0 1-9.395.414l-1.528-1.01.642 1.715a8 8 0 0 1-2.509 9.064l-1.433 1.141 1.83-.081c3.462-.153 6.629 1.942 7.845 5.187l.642 1.716.489-1.766a8 8 0 0 1 7.357-5.858zm2.006 3.916c3.872-.171 5.262-5.196 2.03-7.333l-1.528-1.01a4 4 0 0 1-1.649-4.404l.489-1.765c1.034-3.735-3.315-6.61-6.346-4.197l-1.433 1.141a4 4 0 0 1-4.698.208l-1.528-1.011c-3.232-2.137-7.311 1.111-5.952 4.739l.642 1.716a4 4 0 0 1-1.255 4.532l-1.433 1.141c-3.031 2.413-1.203 7.296 2.668 7.125l1.83-.081a4 4 0 0 1 3.923 2.594l.642 1.715c1.359 3.629 6.567 3.399 7.601-.335l.489-1.765a4 4 0 0 1 3.678-2.929l1.83-.081z" />
								<use href="#B" />
								<use href="#B" x="103" y="30" />
								<use href="#B" x="-34" y="189" />
								<use href="#B" x="64" y="126" />
								<use href="#B" x="-128" y="-2" />
								<use href="#B" x="-128" y="161" />
								<use href="#B" x="71" y="219" />
							</g>
							<path
								d="M201.469 137.109H177.45a24.65 24.65 0 0 0 6.167-3.906c1.284-1.141 2.317-2.535 3.037-4.095s1.108-3.25 1.143-4.967a13.98 13.98 0 0 0-.982-5.566 13.96 13.96 0 0 0-3.105-4.722 13.98 13.98 0 0 0-4.722-3.106 13.96 13.96 0 0 0-5.566-.981c-1.717.035-3.408.424-4.968 1.143a12.48 12.48 0 0 0-4.095 3.036c-2.885 3.257-4.702 7.5-5.859 11.568-1.147-4.068-2.964-8.301-5.859-11.568a12.48 12.48 0 0 0-4.095-3.036c-1.56-.719-3.251-1.108-4.968-1.143a13.96 13.96 0 0 0-5.566.981 13.98 13.98 0 0 0-4.722 3.106 13.96 13.96 0 0 0-3.105 4.722 13.98 13.98 0 0 0-.982 5.566c.035 1.717.424 3.408 1.143 4.967s1.753 2.954 3.037 4.095a24.65 24.65 0 0 0 6.167 3.906h-24.019a5.86 5.86 0 0 0-4.143 1.717c-1.099 1.098-1.716 2.589-1.716 4.143v15.625a5.86 5.86 0 0 0 5.859 5.859h1.953v33.203a5.86 5.86 0 0 0 5.86 5.86h70.312a5.86 5.86 0 0 0 5.86-5.86v-33.203h1.953a5.86 5.86 0 0 0 5.859-5.859v-15.625c0-1.554-.617-3.045-1.716-4.143a5.86 5.86 0 0 0-4.143-1.717zm-34.18-20.576a8.6 8.6 0 0 1 6.25-2.861h.298c1.345.001 2.676.272 3.915.797s2.36 1.292 3.297 2.257a10.05 10.05 0 0 1 2.159 3.361c.488 1.253.72 2.592.683 3.936-.022 1.183-.287 2.349-.779 3.424s-1.201 2.038-2.083 2.826c-5.903 5.225-16.147 6.451-20.508 6.734.303-4.326 1.524-14.546 6.768-20.474zm-34.18 7.49c-.037-1.344.195-2.683.683-3.936a10.05 10.05 0 0 1 2.159-3.361c.937-.965 2.058-1.733 3.297-2.257s2.57-.796 3.915-.797h.298a8.6 8.6 0 0 1 6.25 2.861c5.229 5.904 6.45 16.148 6.733 20.508-4.34-.283-14.585-1.509-20.507-6.733-.88-.796-1.585-1.765-2.071-2.847a8.6 8.6 0 0 1-.757-3.438zm-19.531 34.571v-15.625c0-.518.206-1.015.572-1.381a1.95 1.95 0 0 1 1.381-.572h41.016v19.531h-41.016c-.518 0-1.015-.206-1.381-.572s-.572-.863-.572-1.381zm7.813 39.062v-33.203h35.156v35.156h-33.203a1.95 1.95 0 0 1-1.953-1.953zm74.218 0a1.95 1.95 0 0 1-1.953 1.953h-33.203v-35.156h35.156v33.203zm7.813-39.062c0 .518-.206 1.015-.572 1.381s-.863.572-1.381.572h-41.016v-19.531h41.016a1.95 1.95 0 0 1 1.381.572c.366.366.572.863.572 1.381v15.625z" />
							<defs>
								<path
									id="B"
									d="M172 57a4 4 0 1 0 0-8 4 4 0 1 0 0 8zm0 4a8 8 0 1 0 0-16 8 8 0 1 0 0 16z" />
							</defs>
						</svg>
					</div>
				</div>
				<a href="51lakhpati.php"><img
						class="scratch-card-image"
						src="./assets/img/scratch-card.jpg"
						alt="51 Lakhpati Gift Card" /></a>
			</div>

			<p class="scratch-card-text">🎁 Scratch for a surprise!</p>

			<svg width="0" height="0">
				<filter id="remove-black" color-interpolation-filters="sRGB">
					<feColorMatrix
						type="matrix"
						values="1 0 0 0 0
              0 1 0 0 0
              0 0 1 0 0
              -1 -1 -1 0 1"
						result="black-pixels" />
					<feComposite in="SourceGraphic" in2="black-pixels" operator="out" />
				</filter>
				<filter id="noise">
					<feTurbulence baseFrequency="0.5"></feTurbulence>
				</filter>
			</svg>
			<canvas id="confettiCanvas"></canvas>
		</div>

	</div>


	<br /><br />
	<?php include 'footer.php'; ?>

	<script>
		const desktopSwiper = new Swiper('.hero-swiper-desktop', {
			loop: true,
			autoplay: {
				delay: 4000, // 4 seconds
				disableOnInteraction: true, // keep autoplay after interaction
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		});

		const mobileSwiper = new Swiper('.hero-swiper-mobile', {
			loop: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		});

		// Pause autoplay on hover
		const swiperEl = document.querySelector('.swiper');

		swiperEl.addEventListener('mouseenter', () => {
			swiper.autoplay.stop();
		});

		swiperEl.addEventListener('mouseleave', () => {
			swiper.autoplay.start();
		});
	</script>


	<!-- Scratch Card Script -->
	<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

	<script>
		const isSafari = /^((?!chrome|android).)*safari/i.test(
			navigator.userAgent
		);

		const scratchCardCover = document.querySelector(".scratch-card-cover");
		const scratchCardCanvasRender = document.querySelector(
			".scratch-card-canvas-render"
		);
		const scratchCardCoverContainer = document.querySelector(
			".scratch-card-cover-container"
		);
		const scratchCardText = document.querySelector(".scratch-card-text");
		const scratchCardImage = document.querySelector(".scratch-card-image");

		const canvas = document.querySelector("canvas");
		const context = canvas.getContext("2d");
		let isPointerDown = false;
		let positionX;
		let positionY;
		let clearDetectionTimeout = null;

		const devicePixelRatio = window.devicePixelRatio || 1;

		const canvasWidth = canvas.offsetWidth * devicePixelRatio;
		const canvasHeight = canvas.offsetHeight * devicePixelRatio;

		canvas.width = canvasWidth;
		canvas.height = canvasHeight;

		context.scale(devicePixelRatio, devicePixelRatio);

		if (isSafari) {
			canvas.classList.add("hidden");
		}

		canvas.addEventListener("pointerdown", (e) => {
			scratchCardCover.classList.remove("shine");
			({
				x: positionX,
				y: positionY
			} = getPosition(e));
			clearTimeout(clearDetectionTimeout);

			canvas.addEventListener("pointermove", plot);

			window.addEventListener(
				"pointerup",
				(e) => {
					canvas.removeEventListener("pointermove", plot);
					clearDetectionTimeout = setTimeout(() => {
						checkBlackFillPercentage();
					}, 500);
				}, {
					once: true
				}
			);
		});

		const checkBlackFillPercentage = () => {
			const imageData = context.getImageData(0, 0, canvasWidth, canvasHeight);
			const pixelData = imageData.data;

			let blackPixelCount = 0;

			for (let i = 0; i < pixelData.length; i += 4) {
				const red = pixelData[i];
				const green = pixelData[i + 1];
				const blue = pixelData[i + 2];
				const alpha = pixelData[i + 3];

				if (red === 0 && green === 0 && blue === 0 && alpha === 255) {
					blackPixelCount++;
				}
			}

			const blackFillPercentage =
				(blackPixelCount * 100) / (canvasWidth * canvasHeight);

			if (blackFillPercentage >= 45) {
				scratchCardCoverContainer.classList.add("clear");
				const confettiCanvas = document.getElementById("confettiCanvas");
				const myConfetti = confetti.create(confettiCanvas, {
					resize: true,
					useWorker: true
				});
				myConfetti({
					particleCount: 100,
					spread: 90,
					origin: {
						y: 0.7
					}
				});
				// confetti({
				// 	particleCount: 100,
				// 	spread: 90,
				// 	origin: {
				// 		y: (scratchCardText.getBoundingClientRect().bottom + 60) /
				// 			window.innerHeight,
				// 	},
				// });
				scratchCardText.textContent =
					"🎉 You may get a chance to be Lakhpati!";
				scratchCardImage.classList.add("animate");
				scratchCardCoverContainer.addEventListener(
					"transitionend",
					() => {
						scratchCardCoverContainer.classList.add("hidden");
					}, {
						once: true
					}
				);
			}
		};

		const getPosition = ({
			clientX,
			clientY
		}) => {
			const {
				left,
				top
			} = canvas.getBoundingClientRect();
			return {
				x: clientX - left,
				y: clientY - top,
			};
		};

		const plotLine = (context, x1, y1, x2, y2) => {
			var diffX = Math.abs(x2 - x1);
			var diffY = Math.abs(y2 - y1);
			var dist = Math.sqrt(diffX * diffX + diffY * diffY);
			var step = dist / 50;
			var i = 0;
			var t;
			var x;
			var y;

			while (i < dist) {
				t = Math.min(1, i / dist);

				x = x1 + (x2 - x1) * t;
				y = y1 + (y2 - y1) * t;

				context.beginPath();
				context.arc(x, y, 16, 0, Math.PI * 2);
				context.fill();

				i += step;
			}
		};

		const setImageFromCanvas = () => {
			canvas.toBlob((blob) => {
				const url = URL.createObjectURL(blob);
				previousUrl = scratchCardCanvasRender.src;
				scratchCardCanvasRender.src = url;
				if (!previousUrl) {
					scratchCardCanvasRender.classList.remove("hidden");
				} else {
					URL.revokeObjectURL(previousUrl);
				}
				previousUrl = url;
			});
		};

		let setImageTimeout = null;

		const plot = (e) => {
			const {
				x,
				y
			} = getPosition(e);
			plotLine(context, positionX, positionY, x, y);
			positionX = x;
			positionY = y;
			if (isSafari) {
				clearTimeout(setImageTimeout);

				setImageTimeout = setTimeout(() => {
					setImageFromCanvas();
				}, 5);
			}
		};
	</script>


	<!-- Scratch Card Script Ends Here -->
	<!-- <script>
		const modal = document.getElementById("scratchCardModal");
		const closeBtn = document.getElementById("closeScratchCard");

		// Show modal function
		function showModal() {
			if (!sessionStorage.getItem("scratchCardShown")) {
				modal.classList.add("show");
				sessionStorage.setItem("scratchCardShown", "true");
				document.body.style.overflow = "hidden"; // prevent background scroll
			}
		}

		// Close modal
		closeBtn.addEventListener("click", () => {
			modal.classList.remove("show");
			document.body.style.overflow = "auto"; // restore scroll
		});

		// Show after 5 seconds
		setTimeout(showModal, 5000);

		// Show after scrolling 10%
		window.addEventListener("scroll", () => {
			const scrollTop = window.scrollY;
			const docHeight =
				document.documentElement.scrollHeight - window.innerHeight;
			const scrollPercent = (scrollTop / docHeight) * 100;

			if (scrollPercent >= 10) {
				showModal();
			}
		});
	</script> -->


</body>

</html>