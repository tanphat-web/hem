<?php
	include('./db/connect.php');
	include('./inc/header.php');
?>
<!-- end header -->
<style>
.product-section .product-items .action {
	display: flex;
	align-items: center;
	background: #000;
	padding: 3px 0;
	opacity: 0;
	pointer-events: none;
	transition: .4s;
}

.product-section .product-items .action a {
	display: flex;
	align-items: center;
	justify-content: center;
	color: #fff;
	max-width: 50%;
	flex-basis: 50%;
	padding: 4px 0;
	font-size: 13px;
	width: 100%;
	flex-basis: 100%;
	max-width: 100%;
	border: none !important;
}
</style>
<main class="product">
	<!-- start breadcrumb -->
	<section class="breadcrumb-section">
		<div class="container-fluid">
			<ul>
				<li><a href="index.php">
						<img src="img/home.svg" alt="" class="svg">
						<span>Trang Chủ</span>
					</a></li>
				<li>Áo</li>
			</ul>
		</div>
	</section>
	<!-- end breadcrumb -->
	<!-- colection -->
	<?php 
				$sql_product_shirt = mysqli_query($con, "SELECT * FROM tbl_product,tbl_category
				WHERE tbl_product.category_id = 1 AND tbl_product.category_id = tbl_category.category_id
				ORDER BY tbl_product.product_id DESC LIMIT 13 ");
				$title = mysqli_fetch_array($sql_product_shirt);
	?>
	<section class="colection-section">
		<div class="container-fluid">
			<h2 class="heading">
				<?php echo $title['category_name'];?>
			</h2>
			<div class="filter">
				<div class="filter-category">
					<div class="filter-category__menu">
					</div>
				</div>
				<div class="filter-select">
					<p>
						Sắp xếp theo:
					</p>
					<div class="select-box">
						<div class="default">
							<span>Sản phẩm mới</span>
							<img src="img/down-chevron.svg" alt="" class="svg">
						</div>
						<ul>
							<li>
								<span>Sản phẩm mới</span>
							</li>
							<li>
								<span>
									Giá giảm dần
								</span>
							</li>
							<li>
								<span>
									Giá tăng dần
								</span>
							</li>
							<li>
								<span>
									Sale
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end colection -->
	<!-- product section -->
	<section class="product product-section">
		<div class="container-fluid">
			<div class="row">
				<?php 
				while($row_product_shirt = mysqli_fetch_array($sql_product_shirt)){
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-6">
					<div class="product-items">
						<div class="product-items__img">
							<a href="product-details.php?&chitiet=<?php echo $row_product_shirt['category_link'];?>
							&id=<?php echo $row_product_shirt['product_id'];?>">
								<div class="product-img">
									<img src="img/product/<?php echo $row_product_shirt['product_image'];?>"
										onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_shirt['product_image'];?>'"
										alt="">
									<img src="img/product/<?php echo $row_product_shirt['product_image_hover'];?>"
										onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_shirt['product_image_hover'];?>'"
										alt="" class="img-hover">
								</div>
								<p class="product-name">
									<?php echo $row_product_shirt['product_name'];?>
								</p>
							</a>
							<div class="price">
								<h3>
									<?php echo number_format($row_product_shirt['product_price']).'đ';?>
								</h3>
								<span>
									<?php 
										if($row_product_shirt['product_discount'] <= 0 ){
											echo '';
										}else {
											echo number_format($row_product_shirt['product_discount']).'đ';
									}
									?>
								</span>
							</div>
						</div>
						<div class="action">
							<a href="product-details.php?&chitiet=<?php echo $row_product_shirt['category_link'];?>
							&id=<?php echo $row_product_shirt['product_id'];?>" class="details">
								<img src="img/eye.svg" alt="" class="svg">
								<span>Xem Chi tiết</span>
							</a>
						</div>
					</div>
				</div>
				<?php 
				}
				?>
				<div class="col-12">
					<div class="pagination">
						<ul>
							<li>
								<a href="" class="current">1</a>
							</li>
							<li>
								<a href="">2</a>
							</li>
							<li>
								<a href="">3</a>
							</li>
							<li>
								<a href="">4</a>
							</li>
							<li>
								<a href="">>></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end  product section -->
</main>
<?php include('./inc/footer.php');?>