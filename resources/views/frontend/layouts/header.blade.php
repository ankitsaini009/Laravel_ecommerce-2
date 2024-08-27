
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from caketheme.com/html/mojuri/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 09:32:02 GMT -->
<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MojuriJewelry Store HTML Template</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{url('media/favicon.png')}}">
		 
		<!-- Dependency Styles -->
		<link rel="stylesheet" href="{{url('libs/bootstrap/css/bootstrap.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/feather-font/css/iconfont.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/icomoon-font/css/icomoon.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/font-awesome/css/font-awesome.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/wpbingofont/css/wpbingofont.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/elegant-icons/css/elegant.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/slick/css/slick.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/slick/css/slick-theme.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('libs/mmenu/css/mmenu.min.css')}}" type="text/css">

		<!-- Site Stylesheet -->
		<link rel="stylesheet" href="{{url('assets/css/app.css')}}" type="text/css">
		<link rel="stylesheet" href="{{url('assets/css/responsive.css')}}" type="text/css">
		
		<!-- Google Web Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;display=swap" rel="stylesheet">
	</head>
	
	<body class="home">
		<div id="page" class="hfeed page-wrapper">
			<header id="site-header" class="site-header header-v1 color-white">
				<div class="header-mobile">
					<div class="section-padding">
						<div class="section-container">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
									<div class="navbar-header">
										<button type="button" id="show-megamenu" class="navbar-toggle"></button>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
									<div class="site-logo">
										<a href="{{route ('frontend.index')}}">
											<img width="400" height="79" src="media/logo-white.png" alt="Mojuri Jewelry Store HTML Template" />
										</a>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
									<div class="mojuri-topcart dropdown">
										<div class="dropdown mini-cart top-cart">
											<div class="remove-cart-shadow"></div>
											<a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">2</span></div>
											</a>
											<div class="dropdown-menu cart-popup">
												<div class="cart-empty-wrap">
													<ul class="cart-list">
														<li class="empty">
															<span>No products in the cart.</span>
															<a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
														</li>
													</ul>
												</div>
												<div class="cart-list-wrap">
													<ul class="cart-list ">

														<li class="mini-cart-item">
															<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>													
															<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/1.jpg" alt=""></a>
															<a href="shop-details.html" class="product-name">Medium Flat Hoops</a>
															<div class="quantity">Qty: 1</div>
															<div class="price">$100.00</div>						
														</li>
													</ul>
													<div class="total-cart">
														<div class="title-total">Total: </div>
														<div class="total-price"><span>$250.00</span></div>
													</div>
													<div class="free-ship">
														<div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
														<div class="total-percent"><div class="percent" style="width:20%"></div></div>
													</div>
													<div class="buttons">
														<a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
														<a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="header-mobile-fixed">
						<!-- Shop -->
						<div class="shop-page">
							<a href="shop-grid-left.html"><i class="wpb-icon-shop"></i></a>
						</div>

						<!-- Login -->
						<div class="my-account">
							<div class="login-header">
								<a href="page-my-account.html"><i class="wpb-icon-user"></i></a>
							</div>
						</div>

						<!-- Search -->
						<div class="search-box">
							<div class="search-toggle"><i class="wpb-icon-magnifying-glass"></i></div>
						</div>

						<!-- Wishlist -->
						<div class="wishlist-box">
							<a href="shop-wishlist.html"><i class="wpb-icon-heart"></i></a>
						</div>
					</div>
				</div>

				<div class="header-desktop">
					<div class="header-wrapper">
						<div class="section-padding">
							<div class="section-container large p-l-r">
								<div class="row">
									<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-left">
										<div class="site-logo">
											<a href="{{route ('frontend.index')}}">
												<img width="400" height="140" src="{{url('media/logo-white.png')}}" alt="Mojuri Jewelry Store HTML Template" />
											</a>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center header-center">
										<div class="site-navigation">
											<nav id="main-navigation">
												<ul id="menu-main-menu" class="menu">
													<li class="level-0 menu-item menu-item-has-children current-menu-item">
														<a href="{{ route ('frontend.index')}}"><span class="menu-item-text">Home</span></a>
													</li>
													<li class="level-0 menu-item menu-item-has-children">
														<a href="#"><span class="menu-item-text">Categryes</span></a>
														<ul class="sub-menu">
														@php
							$catlist = \App\helper\helper::getcat();
																@endphp
														@foreach($catlist as $get)
	
															<li>
															<a href="{{route('frontend.single',$get->id)}}"><span class="menu-item-text">{{$get->name}} </span></a>
															</li>
															@endforeach	
														</ul>
													</li>
											 
													<li class="level-0 menu-item menu-item-has-children">
														<a href="#"><span class="menu-item-text">Pages</span></a>
														<ul class="sub-menu">
															<li>
																<a href="{{'login'}}"><span class="menu-item-text">Login / Register</span></a>
															</li>
															 
															<li>
																<a href="page-my-account.html"><span class="menu-item-text">My Account</span></a>
															</li>
															<li>
																<a href="{{'about'}}"><span class="menu-item-text">About Us</span></a>
															</li>
															<li>
																<a href="{{'contact'}}"><span class="menu-item-text">Contact</span></a>
															</li>
															<li>
																<a href="{{'faq'}}"><span class="menu-item-text">FAQ</span></a>
															</li>
														</ul>
													</li>
													<li class="level-0 menu-item">
														<a href="{{'contact'}}"><span class="menu-item-text">Contact</span></a>
													</li>
												</ul>
											</nav>
										</div>
									</div>

									<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-right">
										<div class="header-page-link">
											<!-- Search -->
											<div class="search-box">
												<div class="search-toggle"><i class="icon-search"></i></div>
											</div>

											<!-- Login -->
											<div class="login-header icon">
												<a class="login" href="{{'login'}}"><i class="icon-user"></i></a>
											 
											</div>

											<!-- Wishlist -->
											<div class="wishlist-box">
												<a href="{{'wishlist'}}"><i class="icon-heart"></i></a>
												<span class="count-wishlist">1</span>
											</div>
											
											<!-- Cart -->
											<div class="mojuri-topcart dropdown light">
												<div class="dropdown mini-cart top-cart">
													<div class="remove-cart-shadow"></div>
													<a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">2</span></div>
													</a>
													<div class="dropdown-menu cart-popup">
														<div class="cart-empty-wrap">
															<ul class="cart-list">
																<li class="empty">
																	<span>No products in the cart.</span>
																	<a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
																</li>
															</ul>
														</div>
														<div class="cart-list-wrap">
															<ul class="cart-list ">
																<li class="mini-cart-item">
																	<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
																	<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/3.jpg" alt=""></a>
																	<a href="shop-details.html" class="product-name">Twin Hoops</a>		
																	<div class="quantity">Qty: 1</div>
																	<div class="price">$150.00</div>
																</li>
																
															</ul>
															<div class="total-cart">
																<div class="title-total">Total: </div>
																<div class="total-price"><span>$250.00</span></div>
															</div>
															<div class="free-ship">
																<div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
																<div class="total-percent"><div class="percent" style="width:20%"></div></div>
															</div>
															<div class="buttons">
																<a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
																<a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>