<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		Hem Store Admin
	</title>
	<link rel="shortcut icon" href="/images/logo-mb.jpg" type="image/png">
	<!-- GOOGLE FONT -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		rel="stylesheet">
	<!-- BOXICONS -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<!-- APP CSS -->
	<link rel="stylesheet" href="./css/grid.css">
	<link rel="stylesheet" href="./css/app.css">
</head>

<body>

	<!-- SIDEBAR -->
	<div class="sidebar">
		<div class="sidebar-logo">
			<img src="./images/logo.png" alt="Comapny logo">
			<div class="sidebar-close" id="sidebar-close">
				<i class='bx bx-left-arrow-alt'></i>
			</div>
		</div>
		<div class="sidebar-user">
			<div class="sidebar-user-info">
				<img src="./images/user-image.jpg" alt="User picture" class="profile-image">
				<div class="sidebar-user-name">
					<?php 
						echo $_SESSION['login'];
					?>
				</div>
			</div>

		</div>
		<!-- SIDEBAR MENU -->
		<ul class="sidebar-menu">
			<li>
				<a href="dashboard.php" class="active">
					<i class='bx bx-home'></i>
					<span>dashboard</span>
				</a>
			</li>
			<li class="sidebar-submenu">
				<a href="#" class="sidebar-menu-dropdown">
					<i class='bx bx-category'></i>
					<span>Sản phẩm</span>
					<div class="dropdown-icon"></div>
				</a>
				<ul class="sidebar-menu sidebar-menu-dropdown-content">
					<li>
						<a href="?sanpham">
							Tất cả sản phẩm
						</a>
					</li>
					<?php 
						$sql_cate_product = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id");
						while($row_cate_product = mysqli_fetch_array($sql_cate_product)){
					?>
					<li>
						<a href="?danhmucsanpham&id=<?php echo $row_cate_product['category_id'];?>">
							<?php echo $row_cate_product['category_name']?>
						</a>
					</li>
					<?php 
						}
						?>
					<li>
						<a href="?themsanpham">
							Thêm Sản Phẩm
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="?donhang">
					<i class='bx bx-calendar'></i>
					<span>Đơn hàng</span>
				</a>
			</li>
			<li class="sidebar-submenu">
				<a href="#" class="sidebar-menu-dropdown">
					<i class='bx bx-calendar'></i>
					<span>Slide</span>
					<div class="dropdown-icon"></div>
				</a>
				<ul class="sidebar-menu sidebar-menu-dropdown-content">
					<li>
						<a href="?slide">
							<span>danh sách slide</span>
						</a>
					</li>
					<li>
						<a href="?themimg">
							<span>Thêm ảnh</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="sidebar-submenu">
				<a href="#" class="sidebar-menu-dropdown">
					<i class='bx bx-cog'></i>
					<span>Bài viết</span>
					<div class="dropdown-icon"></div>
				</a>
				<ul class="sidebar-menu sidebar-menu-dropdown-content">
					<li>
						<a href="?blog">
							<span> danh sách Bài viết</span>
						</a>
					</li>
					<li>
						<a href="?thembaiviet">
							<span>Thêm bài viết</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="?khachhang">
					<i class='bx bx-calendar'></i>
					<span>Khách hàng</span>
				</a>
			</li>
			<li class="sidebar-submenu">
				<a href="#" class="sidebar-menu-dropdown">
					<i class='bx bx-cog'></i>
					<span>settings</span>
					<div class="dropdown-icon"></div>
				</a>
				<ul class="sidebar-menu sidebar-menu-dropdown-content">
					<li>
						<a href="#" class="darkmode-toggle" id="darkmode-toggle">
							darkmode
							<span class="darkmode-switch"></span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="?dangxuat">
					<i class='bx bxs-user-account'></i>
					Đăng xuất
				</a>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->