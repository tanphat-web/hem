<?php include('./db/connect.php');?>
<?php 
	$sql_cart_checkout = mysqli_query($con,"SELECT * FROM tbl_cart ORDER BY cart_id DESC");
?>
<?php 
	// xóa giỏ hàng
	if(isset($_GET['xoa'])){
		$id = $_GET['id'];
		$sql_delete_cart = mysqli_query($con,"DELETE FROM tbl_cart WHERE cart_id = '$id'");
		header('location: cart-checkout.php');
	}
?>
<?php 
// Thanh toán giỏ hàng + Thêm thông tin người mua
	if(isset($_POST['hoantat'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$add = $_POST['add'];
		$email = $_POST['email'];
		$note = $_POST['note'];
		$pay = $_POST['pay'];
		$sql_insert_customer = mysqli_query($con,"INSERT INTO tbl_customer(name,phone,address,note,email)
		VALUES('$name','$phone','$add','$note','$email')");
		if($sql_insert_customer == true){
			$sql_select_customer = mysqli_query($con,"SELECT * FROM tbl_customer ORDER BY customer_id DESC LIMIT 1");
			$row_select_customer = mysqli_fetch_array($sql_select_customer);
			$id_ctm = $row_select_customer['customer_id'];
			$phone = $row_select_customer['phone'];
			$code = rand(0,99999);
			echo $id_ctm;
			for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
				$product_id = $_POST['thanhtoan_product_id'][$i];
				$size = $_POST['thanhtoan_size'][$i];
				$quantity = $_POST['thanhtoan_soluong'][$i];
				$sql_insert_checkout = mysqli_query($con,"INSERT INTO tbl_checkout(product_id,size,quantity,code,customer_id,deal,status,phone)
				VALUES('$product_id','$size','$quantity','$code','$id_ctm','$pay','$note','$phone')");
				$sql_delete_cart = mysqli_query($con,"DELETE FROM tbl_cart WHERE product_id = '$product_id'");
			}
	}
	header('location: index.php');
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
	<!-- <div class="loading-screen">
		<div class="loading">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div> -->
	<div class="wrapper">
		<main id="cart-checkout">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 ifmt">
						<a href="index.php" class="logo">
							<img src="img/logo.png" alt="">
						</a>
						<!-- breadcrumb -->
						<section class="breadcrumb-section center">
							<ul>
								<li><a href="cart.php">
										<span>Giỏ hàng</span>
									</a></li>
								<li>
									Thanh toán
								</li>
							</ul>
						</section>
					</div>
				</div>
				<form action="" method="post">
					<div class="row">
						<div class="col-lg-7 ">
							<section class="info info-section">
								<h3>Thông tin giao hàng</h3>
								<div class="form-group">
									<input type="text" name="name" required placeholder="Họ và tên">
									<input type="email" name="email" required class="email" placeholder="Email">
									<input type="text" name="phone" required placeholder="Số điện thoại">
									<input type="text" name="add" required placeholder="Địa chỉ">
								</div>
								<div class="form-group">
									<textarea name="note"></textarea>
								</div>
								<div class="form-group">
									<h3>Phương thức thanh toán</h3>
									<div class="pay">
										<div class="pay-group" style="display:flex;
										align-items:center;">
											<input type="radio" name="pay" id="pay1" value="Banking" class="direct">
											<label for="pay1">Thanh toán trực tuyến (VNPAY-QR, Thẻ tín dụng, Thẻ nội
												địa)</label>
										</div>
										<div class="pay-group" style="display:flex;
										align-items:center;">
											<input type="radio" id="pay2" name="pay" value="COD" class="cod">
											<label for="pay2">Thanh toán khi nhận hàng(COD)</label>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-lg-5 od1" style="margin-top:20px;">
							<div class="cart">
								<?php 
								$price = 0;
								$total = 0;
								while($row_cart_checkout = mysqli_fetch_array($sql_cart_checkout)){
									$price = $row_cart_checkout['product_price'] * $row_cart_checkout['quantity'];
									$total += $price;
							?>
								<div class="cart-item">
									<div class="cart-item__img" style="width:18%;">
										<img src="img/product/<?php echo $row_cart_checkout['product_image'];?>"
											onerror="this.onerror=null;this.src='./uploads/<?php echo $row_cart_checkout['product_image'];?>'"
											alt="">
									</div>
									<div class="text" style="width:82%;justify-content:space-between;">
										<div class="cart-item__name">
											<span style="display:block;"><?php echo $row_cart_checkout['product_name'];?></span>
											<a style="color:blue;border-bottom:1px solid blue;display:inline-block;margin-right:4px;"
												href="?xoa&id=<?php echo $row_cart_checkout['cart_id']?>">Xóa</a>
										</div>

										<div class="price" style="display:flex;align-items:center">
											<div class="quantity">
												<span style="color:Red;border:none;">x<?php echo $row_cart_checkout['quantity'];?></span>
											</div>
											<h3 style="margin-left:10px" ;>
												<?php echo number_format($price).'đ';?>
											</h3>
										</div>
									</div>
								</div>
								<?php
								}
								?>
								<div class=" discount">
									<input type="text" placeholder="Mã giảm giá">
									<button>Sử dụng</button>
								</div>
								<div class="transport">
									<p>Phí vận chuyển</p>
									<p class="price">-</p>
								</div>
								<div class="total">
									<p>Tổng cộng</p>
									<p class="price"> <?php echo number_format($total).'đ';?>
									</p>
								</div>
								<div class="form-group">
									<?php 
									$sql_select_checkout = mysqli_query($con,"SELECT * FROM tbl_cart ORDER BY cart_id DESC");
									while($row_checkout = mysqli_fetch_array($sql_select_checkout)){
								?>
									<input type="hidden" name="thanhtoan_product_id[]" id="" min="1"
										value="<?php echo $row_checkout['product_id'];?>">
									<input type="hidden" name="thanhtoan_soluong[]" id="" min="1"
										value="<?php echo $row_checkout['quantity'];?>">
									<input type="hidden" name="thanhtoan_size[]" id="" min="1"
										value="<?php echo $row_checkout['size'];?>">
									<?php
									}
								?>
								</div>
								<div class="complete">
									<input type="submit" name="hoantat" value="Hoàn tất hóa đơn">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</main>
	</div>
	<style>
	.complete {
		border-radius: 4px;
		cursor: pointer;
		padding: 11.5px 0;
		transform: translateY(-5.5px);
		background: #338dbc;
		color: #fff;
		font-size: 17px;
		text-align: center;
		margin-top: 10px;
	}

	.complete input {
		border: none;
		outline: none;
		background: transparent;
		color: #fff;
		font-size: 16px;
		width: 100%;
		cursor: pointer;
	}

	#cart-checkout .info .form-group input {
		box-shadow: 0 0 0 1px #d9d9d9;
		transition: all 0.2s ease-out;
		background-color: #fff;
		color: #333;
		border-radius: 4px;
		display: block;
		box-sizing: border-box;
		word-break: normal;
		margin-bottom: 10px;
		font-family: semi;
		padding: 0.94em 10px;
		border: 1px;
		outline-color: #cacaca;
		width: 100%;
	}

	#cart-checkout .info .form-group textarea {
		width: 100%;
		height: 100px;
		resize: none;
		outline-color: #cacaca;
		border-color: #cacaca;
		border-radius: 4px;
	}

	#cart-checkout .info .form-group h3 {
		margin: 10px 0;
	}

	#cart-checkout .info h3 {
		font-weight: 600px;
		margin-bottom: 15px;
	}

	#cart-checkout .info .form-group .pay {
		width: 100%;
		border: 1px solid #cacaca;
		border-radius: 4px;
	}

	#cart-checkout .info .form-group .pay .pay-group:nth-child(1) {
		border-bottom: 1px solid #cacaca;
	}

	#cart-checkout .info .form-group .pay .pay-group input {
		width: 18px;
		height: 18px;
		box-shadow: 0 0 0 0 #338dbc inset;
		transition: all 0.2s ease-in-out;
		position: relative;
		cursor: pointer;
		outline: 0;
		border: solid 1px #d9d9d9;
	}
	</style>
	<!-- end search mobile -->
	<!-- javascript -->
	<script type="text/javascript" src="dest/jsmain.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>