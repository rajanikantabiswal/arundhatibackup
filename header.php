	<?php require_once 'config.php'; ?>

	<style>
		.animate-charcter {

			/* text-transform: uppercase;*/

			/*background-image: linear-gradient(*/

			/*  -225deg,*/

			/*  #231557 0%,*/

			/*  #44107a 29%,*/

			/*  #ff1361 67%,*/

			/*  #fff800 100%*/

			/* ); */

			background-color: #fff;





			background-size: auto auto;

			background-clip: border-box;

			background-size: 200% auto;

			color: #fff;

			background-clip: text;

			text-fill-color: transparent;

			-webkit-background-clip: text;

			-webkit-text-fill-color: transparent;

			animation: textclip 2s linear infinite;

			display: inline-block;

			font-size: 20px;

		}
	</style>

	<div class="vs-menu-wrapper">

		<div class="vs-menu-area text-center">

			<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>

			<div class="mobile-logo px-3">

				<a href="https://www.arundhatijewellers.com"><img src="<?php echo BASE_URL; ?>/assets/img/hero/logo-red.png" alt="Arundhati Jewellers" style="max-width:100% !important;"></a>

			</div>

			<div class="vs-mobile-menu">
				<ul>

					<li>

						<a href="https://www.arundhatijewellers.com/">Home</a>

					</li>

					<li class="menu-item-has-children mega-menu-wrap">

						<a href="https://www.arundhatijewellers.com/shop/product-category/gold/">Gold</a>

						<ul class="mega-menu">

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/earrings-gold/">Ear Ring</a>

								<ul>
									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/chandbali-earrings-gold/">Chandbali</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/studs-earrings-gold/">Studs</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/hoops-bali-earrings-gold/">Hoops & Bali</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/jhumki-earrings-gold/">Jhumki</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/hanging-earrings-gold/">Hanging</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/kaan-earrings-gold/">Kaan</a></li>

								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/">Ring</a>

								<ul>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/casual-wear-rings-gold/">Casual Wear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/daily-wear-rings-gold/">Daily wear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/office-wear-rings-gold/">Office Wear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/party-wear-rings-gold/">Party Wear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/men-rings-gold/">For Men</a></li>



								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/">Bangles</a>

								<ul>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/kangan-bangles-gold/">Kangan</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/chur-bangles-gold/">Chur</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/sankha-bangles-gold/">Sankha</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/hollow-bangles-gold/">Hollow</a></li>

								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/">Necklace</a>

								<ul>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/choker-necklace-gold/">Choker</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/long-necklace-gold/">Long</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/semi-long-necklace-gold/">Semi Long</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/short-necklace-gold/">Short</a></li>

								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/">Mangalsutra</a>
								<ul>
									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/dailywear-mangalsutra-gold/">Dailywear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/long-mangalsutra-gold/">Long</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/semi-long-mangalsutra-gold/">Semi Long</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/short-mangalsutra-gold/">Short</a></li>

								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/">Chain</a>

								<ul>
									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/fancy-chain-gold/">Fancy</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/men-chain-gold/">For Men</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/pendent-chain-gold/">Pendant</a></li>

								</ul>

							</li>

						</ul>

					</li>

					<li class="menu-item-has-children mega-menu-wrap">

						<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/">Diamond</a>

						<ul class="mega-menu">

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/">Bangles</a>

								<ul>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/office-wear-bangles-diamond/">Office Wear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/party-wear-bangles-diamond/">Party Wear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/party-wear-bangles-diamond/">Party Wear</a></li>


								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bracelet-diamond/">Bracelets</a>

								<ul>

									<!-- <li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bracelet-diamond/">Office Wear</a></li> -->

								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/earrings-diamond/">Ear Rings</a>

								<ul>
									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/earrings-diamond/hanging-earrings-diamond/">Hanging</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/earrings-diamond/studs-earrings-diamond/">Studs</a></li>

								</ul>

							</li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/mangalsutra-diamond/">Mangalsutra</a>

								<ul>
									<!-- <li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/mangalsutra-diamond/">Mangalsutra</a></li> -->


								</ul>

							</li>

							<li>
								<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/necklace-diamond/">Necklace</a>

								<ul>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/necklace-diamond/party-wear-necklace-diamond/">Party Wear</a></li>


								</ul>

							</li>

							<li>
								<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/">Rings</a>

								<ul>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/men-rings-diamond">For Men</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/office-wear-rings-diamond">Office Wear</a></li>

									<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/party-wear-rings-diamond">Party Wear</a></li>



								</ul>

							</li>

						</ul>

					</li>

					<li class="menu-item-has-children">

						<a href="https://www.arundhatijewellers.com/shop/product-category/silver/">Silver</a>

						<ul class="sub-menu">

							<li>

								<a href="https://www.arundhatijewellers.com/shop/product-category/silver/coins-silver/">Coins</a>

							</li>

							<li>

								<a href="https://www.arundhatijewellers.com/shop/product-category/silver/kids-silver/">For Kids</a>

							</li>

							<li>

								<a href="https://www.arundhatijewellers.com/shop/product-category/silver/men-silver/">For Men</a>

							</li>

							<li>

								<a href="https://www.arundhatijewellers.com/shop/product-category/silver/gifts-silver/">Gifts</a>

							</li>

							<li>

								<a href="https://www.arundhatijewellers.com/shop/product-category/silver/payal-silver/">Payals</a>

							</li>

							<li>

								<a href="https://www.arundhatijewellers.com/shop/product-category/silver/toe-rings-silver/">Toe Rings</a>

							</li>

							<li>

								<a href="https://www.arundhatijewellers.com/shop/product-category/silver/utensils-silver/">Utensils</a>

							</li>

						</ul>

					</li>

					<li class="menu-item-has-children">

						<a href="#">Our Collection</a>

						<ul class="sub-menu">

							<li><a href="https://arundhatijewellers.com/shop/product-category/collections/arka-collections/">Arka</a></li>
							<li><a href="https://arundhatijewellers.com/shop/product-category/collections/ameyaa-collections/">Ameyaa</a></li>
							<li><a href="https://arundhatijewellers.com/shop/product-category/collections/shagun-collections/">Shagun</a></li>
							<li><a href="https://arundhatijewellers.com/shop/product-category/collections/zivah-collections/">Zivah</a></li>
							<li><a href="https://arundhatijewellers.com/shop/product-category/collections/tihar-collections/">Tihar</a></li>
						</ul>

					</li>

					<li class="menu-item-has-children">

						<a href="https://arundhatijewellers.com/shop/product-category/gifts/">Gifts</a>

						<ul class="sub-menu">

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gifts/valentines-day-gifts/">Valentine's Gift</a></li>

							<li><a href="https://arundhatijewellers.com/shop/product-category/gifts/raksha-bandhan-gifts/">Raksha Bandhan</a></li>

							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gifts/corporate-gifts/">Corporate Gifts</a></li>
							<li><a href="https://www.arundhatijewellers.com/shop/product-category/gifts/fathers-day-gifts/">Father's Day Gifts</a></li>

						</ul>

					</li>

					<li>

						<a href="savingscheme-enroll.php">Saving Scheme</a>

					</li>

					<li class="menu-item-has-children"><a href="career/career-list.php">Career</a>

						<ul class="sub-menu">

							<li><a href="career/career-list.php">Current Vacancy</a></li>

							<li><a href="https://arundhatijewellers.com/shop/career/">Upload Resume</a></li>

						</ul>

					</li>

					<li class="menu-item-has-children">
						<a href="store-locator.php" style="color:#000;">Find Our Stores</a>
					</li>

					<li class="menu-item-has-children">
						<a href="gold-rate-today.php" style="color:#000;">Gold Rate</a>
					</li>

				</ul>
			</div>

		</div>

	</div>

	<div class="sidemenu-wrapper d-none d-lg-block">

		<div class="sidemenu-content">

			<button class="closeButton sideMenuCls">

				<i class="far fa-times"></i>

			</button>

			<div class="widget">

				<div class="footer-logo">

					<img src="<?php echo BASE_URL; ?>/assets/img/hero/logo-red.webp" alt="Arundhati Jewellers" style="max-width:100% !important;">

				</div>

				<div class="info-media1">

					<div class="media-icon">

						<i class="fal fa-map-marker-alt"></i>

					</div>

					<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">

						Tooltip on top

					</button>

				</div>

				<div class="info-media1">

					<div class="media-icon">

						<i class="far fa-phone-alt"></i>

					</div>

					<span class="media-label">

						<a href="tel:18003450018" class="text-inherit">1800-345-0018</a>

					</span>

				</div>

				<div class="info-media1">

					<div class="media-icon">

						<i class="fal fa-envelope"></i>

					</div>

					<span class="media-label">

						<a class="text-inherit" href="mailto:info@arundhatijewellers.com">info@arundhatijewellers.com </a>

					</span>

				</div>

			</div>

		</div>

	</div>

	<div class="popup-search-box d-none d-lg-block">

		<button class="searchClose">

			<i class="fal fa-times"></i>

		</button>

		<form action="#">

			<input type="text" class="border-theme" placeholder="What are you looking for">

			<button type="submit">

				<i class="fal fa-search"></i>

			</button>

		</form>

	</div>

	<header class="vs-header header-layout1">

		<div class="header-top">

			<div class="container">

				<div class="row justify-content-center justify-content-md-between align-items-center">

					<div class="col-auto text-center py-2 py-md-0">

						<div class="header-links style-white">

							<ul>

								<li class="d-none d-xxl-inline-block">

									<a href="store-locator.php">
										<i class="fas fa-map-marker-alt"></i>Find Store
									</a>

								</li>

								<li>

									<i class="fas fa-phone-alt"></i>

									<a href="tel:18003450018">1800-345-0018</a>

								</li>

								<li>

									<i class="far fa-envelope"></i>

									<a href="mailto:info@arundhatijewellers.com">info@arundhatijewellers.com </a>

								</li>

							</ul>

						</div>

					</div>

					<div class="col-auto text-center py-2 py-md-0 ">

						<marquee onmouseover="this.stop();" onmouseout="this.start();" class="d-flex align-items-center">

							<h3 class="animate-charcter mb-0 d-flex align-items-center"><b>Today's Gold Rate - 916: ₹<span class="gold-rate-22k">--</span>/g</b></h3>

							<!--<h3 class="animate-charcter"><b>Today's Gold Rate - 916: ₹9180/g</b></h3>-->

						</marquee>

					</div>

					<div class="col-auto d-none d-md-block">

						<div class="social-style1">

							<a href="https://www.facebook.com/ArundhatiJewellersPvtLtd" target="_blank;">

								<i class="fab fa-facebook-f"></i>

							</a>

							<a href="https://x.com/ArundhatiJewel" target="_blank;">

								<svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
									<path fill="#ffffff" d="M357.2 48L427.8 48 273.6 224.2 455 464 313 464 201.7 318.6 74.5 464 3.8 464 168.7 275.5-5.2 48 140.4 48 240.9 180.9 357.2 48zM332.4 421.8l39.1 0-252.4-333.8-42 0 255.3 333.8z" />
								</svg>

							</a>

							<a href="https://www.instagram.com/arundhatijewellersofficial/" target="_blank;">

								<i class="fab fa-instagram"></i>

							</a>

							<a href="https://www.linkedin.com/in/arundhatijewellers/" target="_blank;">

								<i class="fab fa-linkedin-in"></i>

							</a>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="sticky-wrap">

			<div class="sticky-active">

				<div class="px-2">

					<div class="row justify-content-between align-items-center gx-60">

						<div class="col">

							<div class="header-logo">

								<a href="https://www.arundhatijewellers.com/">

									<img src="<?php echo BASE_URL; ?>/assets/img/hero/logo-red.png" alt="Arundhati Jewellers" style="max-width:100% !important;">

								</a>

							</div>

						</div>

						<div class="col-auto">

							<nav class="main-menu menu-style1 d-none d-lg-block">

								<ul>



									<li class="menu-item-has-children mega-menu-wrap">

										<a href="https://www.arundhatijewellers.com/shop/product-category/gold/">Gold</a>

										<ul class="mega-menu">

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/earrings-gold/">Ear Ring</a>

												<ul>
													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/chandbali-earrings-gold/">Chandbali</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/studs-earrings-gold/">Studs</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/hoops-bali-earrings-gold/">Hoops & Bali</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/jhumki-earrings-gold/">Jhumki</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/hanging-earrings-gold/">Hanging</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/earrings-gold/kaan-earrings-gold/">Kaan</a></li>

												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/">Ring</a>

												<ul>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/casual-wear-rings-gold/">Casual Wear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/daily-wear-rings-gold/">Daily wear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/office-wear-rings-gold/">Office Wear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/party-wear-rings-gold/">Party Wear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/rings-gold/men-rings-gold/">For Men</a></li>



												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/">Bangles</a>

												<ul>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/kangan-bangles-gold/">Kangan</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/chur-bangles-gold/">Chur</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/sankha-bangles-gold/">Sankha</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/bangles-gold/hollow-bangles-gold/">Hollow</a></li>

												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/">Necklace</a>

												<ul>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/choker-necklace-gold/">Choker</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/long-necklace-gold/">Long</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/semi-long-necklace-gold/">Semi Long</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/necklace-gold/short-necklace-gold/">Short</a></li>

												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/">Mangalsutra</a>
												<ul>
													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/dailywear-mangalsutra-gold/">Dailywear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/long-mangalsutra-gold/">Long</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/semi-long-mangalsutra-gold/">Semi Long</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/mangalsutra-gold/short-mangalsutra-gold/">Short</a></li>

												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/">Chain</a>

												<ul>
													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/fancy-chain-gold/">Fancy</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/men-chain-gold/">For Men</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/gold/chain-gold/pendent-chain-gold/">Pendant</a></li>

												</ul>

											</li>

										</ul>

									</li>

									<li class="menu-item-has-children mega-menu-wrap">

										<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/">Diamond</a>

										<ul class="mega-menu">

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/">Bangles</a>

												<ul>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/office-wear-bangles-diamond/">Office Wear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/party-wear-bangles-diamond/">Party Wear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bangles-diamond/party-wear-bangles-diamond/">Party Wear</a></li>


												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bracelet-diamond/">Bracelets</a>

												<ul>

													<!-- <li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/bracelet-diamond/">Office Wear</a></li> -->

												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/earrings-diamond/">Ear Rings</a>

												<ul>
													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/earrings-diamond/hanging-earrings-diamond/">Hanging</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/earrings-diamond/studs-earrings-diamond/">Studs</a></li>

												</ul>

											</li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/mangalsutra-diamond/">Mangalsutra</a>

												<ul>
													<!-- <li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/mangalsutra-diamond/">Mangalsutra</a></li> -->


												</ul>

											</li>

											<li>
												<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/necklace-diamond/">Necklace</a>

												<ul>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/necklace-diamond/party-wear-necklace-diamond/">Party Wear</a></li>


												</ul>

											</li>

											<li>
												<a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/">Rings</a>

												<ul>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/men-rings-diamond">For Men</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/office-wear-rings-diamond">Office Wear</a></li>

													<li><a href="https://www.arundhatijewellers.com/shop/product-category/diamond/rings-diamond/party-wear-rings-diamond">Party Wear</a></li>



												</ul>

											</li>

										</ul>

									</li>

									<li class="menu-item-has-children">

										<a href="https://www.arundhatijewellers.com/shop/product-category/silver/">Silver</a>

										<ul class="sub-menu">

											<li>

												<a href="https://www.arundhatijewellers.com/shop/product-category/silver/coins-silver/">Coins</a>

											</li>

											<li>

												<a href="https://www.arundhatijewellers.com/shop/product-category/silver/kids-silver/">For Kids</a>

											</li>

											<li>

												<a href="https://www.arundhatijewellers.com/shop/product-category/silver/men-silver/">For Men</a>

											</li>

											<li>

												<a href="https://www.arundhatijewellers.com/shop/product-category/silver/gifts-silver/">Gifts</a>

											</li>


											<li>

												<a href="https://www.arundhatijewellers.com/shop/product-category/silver/payal-silver/">Payals</a>

											</li>

											<li>

												<a href="https://www.arundhatijewellers.com/shop/product-category/silver/toe-rings-silver/">Toe Rings</a>

											</li>

											<li>

												<a href="https://www.arundhatijewellers.com/shop/product-category/silver/utensils-silver/">Utensils</a>

											</li>


										</ul>

									</li>

									<li class="menu-item-has-children">

										<a href="#">Our Collection</a>

										<ul class="sub-menu">

											<li><a href="https://arundhatijewellers.com/shop/product-category/collections/arka-collections/">Arka</a></li>
											<li><a href="https://arundhatijewellers.com/shop/product-category/collections/ameyaa-collections/">Ameyaa</a></li>
											<li><a href="https://arundhatijewellers.com/shop/product-category/collections/shagun-collections/">Shagun</a></li>
											<li><a href="https://arundhatijewellers.com/shop/product-category/collections/zivah-collections/">Zivah</a></li>
											<li><a href="https://arundhatijewellers.com/shop/product-category/collections/tihar-collections/">Tihar</a></li>
										</ul>

									</li>

									<li class="menu-item-has-children">

										<a href="https://arundhatijewellers.com/shop/product-category/gifts/">Gifts</a>

										<ul class="sub-menu">

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gifts/valentines-day-gifts/">Valentine's Gift</a></li>

											<li><a href="https://arundhatijewellers.com/shop/product-category/gifts/raksha-bandhan-gifts/">Raksha Bandhan</a></li>

											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gifts/corporate-gifts/">Corporate Gifts</a></li>
											<li><a href="https://www.arundhatijewellers.com/shop/product-category/gifts/fathers-day-gifts/">Father's Day Gifts</a></li>

										</ul>

									</li>

									<li>

										<a href="savingscheme-enroll.php">Saving Scheme</a>

									</li>

									<li class="menu-item-has-children"><a href="career/career-list.php">Career</a>

										<ul class="sub-menu">

											<li><a href="career/career-list.php">Current Vacancy</a></li>

											<li><a href="https://arundhatijewellers.com/shop/career/">Upload Resume</a></li>

										</ul>

									</li>

									<li>

										<a href="store-locator.php">Store Locator</a>

									</li>

								</ul>

							</nav>

						</div>

						<div class="col-auto">

							<div class="header-icons">

								<a href="gold-rate-today.php" class="vs-btn style2 d-none d-xl-inline-block">Gold Rate</a>

								<button class="vs-menu-toggle d-inline-block d-lg-none" type="button">

									<i class="fal fa-bars"></i>

								</button>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</header>



	<script>
		document.addEventListener("DOMContentLoaded", function() {

			fetch("https://www.arundhatijewellers.com/shop/wp-json/jewellery/v1/gold-rates")

				.then(response => response.json())

				.then(data => {

					if (data.success) {

						const rates = data.rates;

						const gold_rate_22k = document.querySelectorAll(".gold-rate-22k");

						gold_rate_22k.forEach(element => {

							element.textContent = rates['22k'];

						});

					} else {

						console.error("Error fetching gold rates.");

					}

				})

				.catch(error => {

					console.error("Fetch error:", error);

				});

		});
	</script>