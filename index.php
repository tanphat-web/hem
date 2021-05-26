<?php include('./db/connect.php');?>
<?php include('./inc/header.php');?>

<!-- carousel -->
<main id="homepages">
	<!-- start carousel section -->
	<?php include('./inc/slider.php');?>
	<!-- end carousel section -->
	<!-- start banner section -->
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
	<section class="banner-section">
		<div class="container">
			<div class="row banner-list">
				<?php 
					$sql_banner = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id");
					while($row_banner = mysqli_fetch_array($sql_banner)){
			?>
				<div class="col-lg-4 col-md-4">
					<div class="banner-items">
						<a href="<?php echo $row_banner['category_link'];?>">
							<div class="img">
								<img src="img/banner/<?php echo $row_banner['category_image']?>"
									onerror="this.onerror=null;this.src='uploads/<?php echo $row_banner['category_image'];?>'"
									alt="anh-bia">
								<div class="img-hover ">
									<span></span>
									<span></span>
								</div>
							</div>
						</a>
						<div class="text">
							<a href="ao.php"><?php echo $row_banner['category_name'];?></a>
							<div class="btn btn-hover">
								<a href="<?php echo $row_banner['category_link'];?>.php" class="details">
									xem chi tiết
								</a>
								<span></span>
							</div>
						</div>
					</div>
				</div>
				<?php 
					}
					?>
			</div>
			<div class="banner-mobile">
				<div class="banner-mobile__carousel">
					<div class="banner-items">
						<a href="ao.php">
							<div class="img">
								<img src="img/sb_1610520105_507.jpg" alt="">
								<div class="img-hover ">
									<span></span>
									<span></span>
								</div>
							</div>
						</a>
						<div class="text">
							<a href="ao.php">Áo</a>
							<div class="btn btn-hover">
								<a href="shirt.html" class="details">
									xem chi tiết
								</a>
								<span></span>
							</div>
						</div>
					</div>
					<div class="banner-items">
						<a href="quan.php">
							<div class="img">
								<img src="img/sb_1610520152_436.jpg" alt="">
								<div class="img-hover ">
									<span></span>
									<span></span>
								</div>
							</div>
						</a>
						<div class="text">
							<a href="quan.php">Quần</a>
							<div class="btn btn-hover">
								<a href="quan.php" class="details">
									xem chi tiết
								</a>
								<span></span>
							</div>
						</div>
					</div>
					<div class="banner-items">
						<a href="sm-shirt.html">
							<div class="img">
								<img src="img/sb_1610520343_428.jpg" alt="">
								<div class="img-hover ">
									<span></span>
									<span></span>
								</div>
							</div>
						</a>
						<div class="text">
							<a href="phu-kien.php">Phụ kiện</a>
							<div class="btn btn-hover">
								<a href="phu-kien.php" class="details">
									xem chi tiết
								</a>
								<span></span>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- end banner section -->
	<!-- start product section -->
	<section class="product-section product-new">
		<div class="container-fluid">
			<h2 class="heading">
				SẢN PHẨM MỚI
			</h2>
			<div class="row product-list" style="display:flex;">
				<?php 
				$sql_product_new = mysqli_query($con, "SELECT * FROM tbl_product,tbl_category 
				WHERE tbl_product.category_id = tbl_category.category_id
				ORDER BY product_id DESC LIMIT 8");
				while($row_product_new = mysqli_fetch_array($sql_product_new)){
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-6">
					<div class="product-items">
						<div class="product-items__img">
							<a href="product-details.php?&chitiet=<?php echo $row_product_new['category_link'];?>
								&id=<?php echo $row_product_new['product_id'];?>">
								<div class="product-img">
									<img src="img/product/<?php echo $row_product_new['product_image'];?>"
										onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_new['product_image'];?>'"
										alt="">
									<img src="img/product/<?php echo $row_product_new['product_image_hover'];?>"
										onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_new['product_image_hover'];?>'"
										alt="" class="img-hover">
								</div>
								<p class="product-name">
									<?php echo $row_product_new['product_name'];?>
								</p>
							</a>
							<div class="price">
								<h3>
									<?php echo number_format($row_product_new['product_price']).'đ';?>
								</h3>
								<span>
									<?php 
										if($row_product_new['product_discount'] <= 0){
											echo '';
										}else {
											echo number_format($row_product_new['product_discount']).'đ';
										}
									?>
								</span>
							</div>
						</div>
						<div class="action">
							<a href="product-details.php?&chitiet=<?php echo $row_product_new['category_link'];?>
								&id=<?php echo $row_product_new['product_id'];?>" class="details">
								<img src="img/eye.svg" alt="" class="svg">
								<span>Xem Chi tiết</span>
							</a>
						</div>
					</div>
				</div>
				<?php 
				}
				?>
			</div>
		</div>
	</section>
	<section class="banner-products product-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<a href="">
						<img src="img/carousel/carousel1.jpg" alt="">
					</a>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="product-banner__content">
						<h3 class="title">
							Best-seller trong tháng:
						</h3>
						<p class="intro">
							Những sản phẩm thời trang được yêu thích nhất tại Hẻm Store. Nhanh chóng cháy hàng chỉ sau vài ngày
							xuất hiện trên kệ. Đến mua sắm liền tay để tậu cho mình những trang phục hiện đại và thời thượng nhất.
						</p>
						<div class="product-carousel ">
							<?php 
							$sql_product_bestseller = mysqli_query($con,"SELECT * FROM tbl_product,tbl_category WHERE product_active = '1' 
							AND tbl_product.category_id = tbl_category.category_id ORDER BY product_id");
							while($row_product_bestseller = mysqli_fetch_array($sql_product_bestseller)){
						?>
							<div class="product-carousel__items product-items">
								<div class="product-items__img">
									<a href="product-details.php?&chitiet=<?php echo $row_product_bestseller['category_link'];?>
								&id=<?php echo $row_product_bestseller['product_id'];?>">
										<div class="product-img">
											<img src="img/product/<?php echo $row_product_bestseller['product_image'];?>"
												onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_bestseller['product_image'];?>'"
												alt="">
											<img src="img/product/<?php echo $row_product_bestseller['product_image_hover'];?>"
												onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_bestseller['product_image_hover'];?>'"
												alt="" class="img-hover">
										</div>
										<p class="product-name">
											<?php echo $row_product_bestseller['product_name'];?>
										</p>
									</a>
									<div class="price">
										<h3>
											<?php echo number_format($row_product_bestseller['product_price']).'đ';?>
										</h3>
										<span>
											<?php 
										if($row_product_bestseller['product_discount'] <= 0){
											echo '';
										}else {
											echo number_format($row_product_bestseller['product_discount']).'đ';
										}
									?>
										</span>
									</div>
									<div class="discount">
										<h3>
											Giảm 20%
										</h3>
									</div>
								</div>
							</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- end product section -->
	<!-- shirt section -->
	<?php 
		$sql_cate_product = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id");
		while($row_cate_product = mysqli_fetch_array($sql_cate_product)){
			$id = $row_cate_product['category_id'];
	?>
	<section class="shirt-section product-section">
		<div class="container-fluid">
			<div class="tab">
				<div class="tab-title">
					<h2 class="heading">
						<a
							href="<?php echo $row_cate_product['category_link'].'.php';?>"><?php echo $row_cate_product['category_name'];?></a>
					</h2>
				</div>
				<div class="tab-content">

					<div class="tab-list active">
						<div class="row product-list">
							<?php 
							$sql_product = mysqli_query($con,"SELECT * FROM tbl_product,tbl_category 
							WHERE tbl_product.category_id = tbl_category.category_id
							 ORDER BY product_id ");
							while($row_product =mysqli_fetch_array($sql_product)){
								if($row_product['category_id'] == $id){
						?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-6">
								<div class="product-items">
									<div class="product-items__img">
										<a href="product-details.php?&chitiet=<?php echo $row_product['category_link'];?>
								&id=<?php echo $row_product['product_id'];?>">
											<div class="product-img">
												<img src="img/product/<?php echo $row_product['product_image'];?>"
													onerror="this.onerror=null;this.src='uploads/<?php echo $row_product['product_image'];?>'"
													alt="">
												<img src="img/product/<?php echo $row_product['product_image_hover'];?>"
													onerror="this.onerror=null;this.src='uploads/<?php echo $row_product['product_image_hover'];?>'"
													alt="" class="img-hover">
											</div>
											<p class="product-name">
												<?php echo $row_product['product_name'];?>
											</p>
										</a>
										<div class="price">
											<h3>
												<?php echo number_format($row_product['product_price']).'đ';?>
											</h3>
											<span>
												<?php 
										if($row_product['product_discount'] <= 0){
											echo '';
										}else {
											echo number_format($row_product['product_discount']).'đ';
										}
									?>
											</span>
										</div>
									</div>
									<div class="action">
										<a href="product-details.php?&chitiet=<?php echo $row_product['category_link'];?>
								&id=<?php echo $row_product['product_id'];?>" class="details">
											<img src="img/eye.svg" alt="" class="svg">
											<span>Xem Chi tiết</span>
										</a>
									</div>
								</div>
							</div>
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
		}
		?>
	<!-- end shirt section -->
	<!-- news section -->
	<section class="news-section">
		<div class="container-fluid">
			<h2 class="heading">
				<a href="news.php">
					TIN TỨC
				</a>
			</h2>
			<div class="row news-list">
				<?php 
				$sql_news = mysqli_query($con,"SELECT * FROM tbl_news ORDER BY new_id LIMIT 4");
				while($row_news = mysqli_fetch_array($sql_news)){
			?>
				<div class="col-lg-3 col-sm-6 col-md-6 col-12">
					<div class="news-list__items">
						<a href="new-details.php?id=<?php echo $row_news['new_id']?>" class="news-list__items">
							<div class="img">
								<img src="img/news/<?php echo $row_news['new_image'];?>"
									onerror="this.onerror=null;this.src='uploads/<?php echo $row_news['new_image'];?>'" alt="">
							</div>
						</a>
						<div class="news-text">
							<a href="new-details.html" class="news-title">
								<h3>
									<?php echo $row_news['new_title'];?>
								</h3>
							</a>
							<p class="desc">
								<?php echo $row_news['new_status'];?>
							</p>
							<a href="new-details.php?id=<?php echo $row_news['new_id']?>" class="btn btn-news">Xem thêm</a>
						</div>
					</div>
				</div>
				<?php 
				}
				?>
			</div>
		</div>
	</section>
	<style>
	.product-list .col-lg-3.col-md-4.col-sm-6.col-6:nth-child(n+9) {
		display: none;
	}
	</style>
	<!-- end news section -->
	<!-- start shop system section -->

	<!-- end shop system section -->
</main>
<?php include('./inc/footer.php');?>