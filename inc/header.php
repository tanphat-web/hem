<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>HẺM STORE</title>
	<link rel="icon" href="img/favico.jpg">
	<meta name="title" content="" />
	<meta name="description" content="" />
	<meta property="og:locale" content="vi" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Trang chủ" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:image" content="" />

	<link rel="stylesheet" href="dest/style.min.css">
	<link rel="stylesheet" href="dest/fonts.css">
	<link rel="stylesheet" href="dest/stylelibs.min.css">
</head>

<body>
	<!-- <div class="loading-screen">
		<div class="loading">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div> -->
	<div class="wrapper">
		<!-- camping topbar -->
		<div class="noti-minigame">
			<p>
				<b>FREESHIP</b>
				toàn quốc cho hóa đơn từ
				<b>499k</b>
			</p>
		</div>
		<!-- end topbar -->
		<!-- start header -->
		<header>
			<!-- header top -->
			<nav class="header-top">
				<div class="container-fluid">
					<div class="header-top__menu">
						<ul>
							<li class="tel">
								<a href="tel:0339761703">
									<img src="img/phone-call.svg" alt="" class="svg">
									<span>0339761703</span>
								</a>
							</li>
							<li>
								<a href="user.php">
									<img src="img/account.svg" alt="" class="svg">
									<span>Tài khoản</span>
								</a>
							</li>
							<li>
								<a href="" class="cart" data-togle="cart-section">
									<img src="img/shopping-cart.svg" alt="" class="svg">
									<?php 
										$sql_stt = mysqli_query($con,"SELECT * FROM tbl_cart ORDER BY cart_id");
										$i = 0;
										while($row_stt = mysqli_fetch_array($sql_stt)){
											$i++;
										}
									?>
									<span>Giỏ hàng <b style="color:red;">(<?php echo $i;?>)</b></span>
									<style>
									header .header-top ul li a.cart::after {
										content: "";
									}
									</style>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- end header top -->
			<!-- menu desktop -->
			<nav class="header-desktop ">
				<div class="container-fluid">
					<div class="header-desktop__menu">
						<div class="logo">
							<a href="index.php">
								<img src="img/logo.png" alt="">
							</a>
						</div>
						<ul class="menu">
							<?php 
									$sql_menu = mysqli_query($con,"SELECT * FROM tbl_category");
									while($row_menu = mysqli_fetch_array($sql_menu)){
								?>
							<li>
								<a href="<?php echo $row_menu['category_link'];?>.php">
									<span><?php echo $row_menu['category_name'];?></span>
								</a>
							</li>
							<?php
									}
								?>
							<li>
								<a href="discount.php">
									<span>giảm giá</span>
								</a>
							</li>
							<li>
								<a href="news.php">
									<span>TIN TỨC</span>
								</a>
							</li>
							<li>
								<a href="contact.html">
									<span>hệ thống cửa hàng</span>
								</a>
							</li>
						</ul>
						<div class="search">
							<input type="text" placeholder="Tìm kiếm">
							<a href="">
								<img src="img/search.svg" alt="" class="svg search">
							</a>
						</div>
					</div>
				</div>
			</nav>
			<!--end menu desktop -->
			<!-- menu tablet -->
			<div class="header-tablet">
				<div class="container-fluid">
					<nav class="header-tablet__menu">
						<ul>
							<li class="hamburger">
								<span></span>
								<span></span>
								<span></span>
							</li>
							<li class="logo">
								<a href="index.php">
									<img src="img/logo.png" alt="">
								</a>
							</li>
						</ul>
						<ul class="icon-social">
							<li class="search">
								<img src="img/loupe.svg" alt="" class="svg search">
							</li>
						</ul>
						<ul class="icon-social__mobile">
							<li class="search">
								<a href="">
									<img src="img/loupe.svg" alt="" class="svg">
								</a>
							</li>
							<li class="cart">
								<a href="cart.html">
									<img src="img/shopping-cart.svg" alt="" class="svg">
								</a>
							</li>
							<li class="sign-in">
								<a href="user.html">
									<img src="img/account.svg" alt="" class="svg">
								</a>
							</li>
							<li class="phone">
								<a href="tel:0339761703">
									<img src="img/phone-call.svg" alt="" class="svg">
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="menu-mobile menu-tablet">
					<div class="menu-mobile__wrap">
						<ul class="menu-mobile__list">
							<?php 
							$sql_menu_mb = mysqli_query($con,"SELECT * FROM tbl_category");
							while($row_menu_mb = mysqli_fetch_array($sql_menu_mb)) {
						?>
							<li>
								<a href="<?php echo $row_menu_mb['category_link'];?>.php"
									class="items"><?php echo $row_menu_mb['category_name'];?></a>
								<a href="#" class="btn-sub">
									<img src="img/right-arrow-angle.svg" alt="svg" class="svg">
								</a>
							</li>
							<?php 
							}
							?>
							<li>
								<a href="discount.html" class="items">giảm giá</a>
							</li>
							<li>
								<a href="news.php" class="items">TIN TỨC</a>
							</li>
							<li>
								<a href="contact.php" class="items">Hệ thống cửa hàng</a>
							</li>
							<li class="tel">
								<a href="tel:0339761703" class="items">
									<img src="img/phone-call.svg" alt="" class="svg">
									<span>0339761703</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--end  menu tablet -->

		</header>
		<!-- end header -->