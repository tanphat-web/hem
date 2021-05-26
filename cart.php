<?php include('./db/connect.php');?>
<?php 
	// Thêm giỏ hàng 
		if(isset($_REQUEST['muangay'])){
		$id = $_REQUEST['id'];
		if(isset($_REQUEST['radio'])){
			$size = $_REQUEST['radio'];
		}else {
			$size = '';
		}
		$sql_select_product = mysqli_query($con,"SELECT * FROM tbl_product WHERE product_id = '$id' LIMIT 1");
		$row_select_product = mysqli_fetch_array($sql_select_product);
		$name = $row_select_product['product_name'];
		$image = $row_select_product['product_image'];
		$sql_select_cart = mysqli_query($con,"SELECT * FROM tbl_cart WHERE product_id = '$id'");
		$count = mysqli_num_rows($sql_select_cart);
		// kiểm tra nếu trùng sản phẩm thì tăng giá tiền + số lượng lên
			if( $count > 0 && $size == $size){
				$row_select_cart = mysqli_fetch_array($sql_select_cart);
				$quantity = $row_select_cart['quantity'] + 1;
				$sql_giohang = "UPDATE tbl_cart SET quantity='$quantity' WHERE product_id = '$id' ";
		}else {
			// không tồn tại thì thêm vào 
		$quantity = 1;
		$price = $row_select_product['product_price'];
		$sql_giohang = "INSERT INTO tbl_cart(product_id,product_image,product_name,product_price,quantity,size)
		VALUES('$id','$image','$name','$price','$quantity','$size')";
		}
		$row_insert = mysqli_query($con,$sql_giohang);
		header('location: cart.php');
		}
?>
<?php 
	// xóa giỏ hàng
	if(isset($_GET['xoa'])){
		$id = $_GET['id'];
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_cart WHERE cart_id = '$id'");
	}
?>
<?php 
// cap nhat gio hang 
	if(isset($_POST['capnhatgiohang'])){
		for ($i=0;$i < count($_POST['id']);$i++){
			$sanpham_id = $_POST['id'][$i];
			$soluong = $_POST['soluong'][$i];
			if ($soluong <= 0) {
			$sql_update = mysqli_query($con,"DELETE FROM  tbl_cart WHERE product_id ='$sanpham_id'");
			}else {
				$sql_update = mysqli_query($con,"UPDATE tbl_cart SET quantity = '$soluong' WHERE product_id ='$sanpham_id'");
			}
		}
		header('location: cart.php');
	}
?>
<?php 
			$sql_cart_total = mysqli_query($con,'SELECT * FROM tbl_cart ORDER BY cart_id DESC');
			$i=0;
			while($total = mysqli_fetch_array($sql_cart_total)){
				$i++;
			}
	?>
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

	<main class="main-cart">
		<!-- breadcrumb -->
		<section class="breadcrumb-section center">
			<div class="container">
				<ul>
					<li><a href="index.php">
							<img src="img/home.svg" alt="" class="svg">
							<span>Trang Chủ</span>
						</a></li>
					<li>
						Giỏ hàng
					</li>
				</ul>
			</div>
		</section>
		<!--end breadcrumb -->
		<!-- cart section -->
		<section class="cart">
			<div class="container">
				<form action="" method="post">
					<div class="row">
						<div class="col-lg-7 offse-lg-1">
							<div class="cart-heading">
								<h2>
									GIỎ HÀNG CỦA BẠN
								</h2>
								<span>
									Bạn có <?php echo $i;?> sản phẩm trong giỏ hàng.
								</span>
							</div>
							<?php 
							$sql_cart= mysqli_query($con,"SELECT * FROM tbl_cart ORDER BY cart_id DESC");
							$price =0;
								while($row_cart = mysqli_fetch_array($sql_cart)){
									$price = $row_cart['product_price'] * $row_cart['quantity'];
								?>
							<div class="cart-item">
								<div class="cart-item__img">
									<img src="img/product/<?php echo $row_cart['product_image'];?>"
										onerror="this.onerror=null;this.src='./uploads/<?php echo $row_cart['product_image'];?>'" alt="">
								</div>
								<div class="text" style="    max-width: calc(100% - 110px);    flex-basis: calc(100% - 110px);">
									<div class="cart-item__name" style="flex-grow:1;">
										<span><?php echo $row_cart['product_name'];?>
											<b><?php 
											if($row_cart['size'] == ''){
												echo '';
											}else {
												echo '- Size:'.$row_cart['size'];
											}
											?></b>
										</span>
										<div class="btn-group" style="display:flex;
									align-items:center;">
											<button style="margin-right:5px;">
												<a href="?xoa&id=<?php echo $row_cart['cart_id'] ;?>">Xóa</a>
											</button>
											<button>
												<input type="submit" name="capnhatgiohang" value="Cập nhật">
											</button>
										</div>
									</div>
									<input type="text" name="soluong[]" value="<?php echo $row_cart['quantity'];?>" id="">
									<input type="hidden" name="id[]" value="<?php echo $row_cart['product_id'];?>" id="">
									<div class="price">
										<?php echo number_format($price).'đ';?>
									</div>
								</div>
							</div>
							<?php 
					}
					?>
						</div>
						<div class="col-lg-4 ">
							<div class="order-summary">
								<div class="summary">
									<h3>
										TÓM TẮT ĐƠN HÀNG
									</h3>
									<span>
										Chưa bao gồm phí vận chuyển:
									</span>
									<h4 class="price">
										<span>
											Tổng tiền:
										</span>
										<?php 
												$sql_total= mysqli_query($con,"SELECT * FROM tbl_cart ORDER BY cart_id DESC");
												$total = 0 ;
												$subtotal = 0;
												while($row_total = mysqli_fetch_array($sql_total)){
													$subtotal = $row_total['product_price'] * $row_total['quantity'];
													$total += $subtotal;
												}
											?>
										<span>
											<?php echo number_format($total).'đ';?>
										</span>
									</h4>
									<div class="pay">
										<span>Bạn có thể nhập mã giảm giá ở trang thanh toán</span>
										<a href="cart-checkout.php" class="order active">Tiến hành đặt hàng</a>
										<a href="index.php" class="buy-more">mua thêm sản phẩm</a>
									</div>
								</div>
								<div class="policy">
									<ul>
										<li>
											<img src="img/img_policy_1.png" alt="" class="icon">
											<p>
												miễn phí giao hàng toàn quốc
												<span>
													(Đơn hàng từ 499.000đ)
												</span>
											</p>
										</li>
										<li>
											<img src="img/img_policy_3.png" alt="" class="icon">
											<p>
												ĐỔI TRẢ DỄ DÀNG
												<span>
													(Đổi trả lên tới 30 ngày)
												</span>
											</p>
										</li>
										<li>
											<img src="img/img_policy_4.png" alt="" class="icon">
											<p>
												TỔNG ĐÀI BÁN HÀNG 0898 209 209
												<span>
													(Miễn phí từ 9h00 - 22:00 mỗi ngày)
												</span>
											</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>
		</section>
		<style>
		input[type="submit"] {
			outline: none;
			background: transparent;
			border: none;
			cursor: pointer;

		}

		input[type="text"] {
			margin-right: 6px;
			width: 60px;
			text-align: center;
		}

		header .header-top ul li a.cart::after {
			content: "";
			color: #ff0404;
		}
		</style>
		<!-- end cart section -->
	</main>
	<?php include('./inc/footer.php');?>