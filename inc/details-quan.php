<!-- start breadcrumb -->
<?php 
				if(isset($_GET['id']) ){
					$id = $_GET['id'];
					// lấy chi tiết sản phẩm từ database 
					$sql_product_details = mysqli_query($con,"SELECT * FROM tbl_product,tbl_category 
					WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.product_id = '$id'
					ORDER BY tbl_product.product_id");
					$row_product_details = mysqli_fetch_array($sql_product_details);
				}else {
					$id = '';
				}
			?>

<section class="breadcrumb-section center">
	<div class="container">
		<ul>
			<li><a href="index.php">
					<img src="img/home.svg" alt="" class="svg">
					<span>Trang Chủ</span>
				</a>
			</li>
			<li><a href="quan.php">
					<span>
						<?php echo $row_product_details['category_name'];?>
					</span>
				</a>
			</li>
			<li> <?php echo $row_product_details['product_name'];?>
			</li>
		</ul>
	</div>
</section>
<!-- end breadcrumb -->
<!-- product details section -->
<section class="product-details">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="img-carousel">
					<div class="img-carousel__item">
						<img src="img/product/<?php echo $row_product_details['product_image'];?>"
							onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_details['product_image'];?>'" alt=""
							style="width: 100%;     height: 100%;	object-fit: cover;">
					</div>
					<div class="img-carousel__item">
						<img src="img/product/<?php echo $row_product_details['product_image_hover'];?>"
							onerror="this.onerror=null;this.src='uploads/<?php echo $row_product_details['product_image_hover'];?>'"
							alt="" style="width: 100%;     height: 100%;	object-fit: cover;">
					</div>
				</div>
				<div class="img-text">
					<ul>
						<li style="line-height:1.5;">
							<?php echo $row_product_details['product_details'];?>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="details">
					<h3>
						<?php echo $row_product_details['product_name'];?>
					</h3>
					<div class="pview-code">
						<span>Mã sản phẩm :
							<span class="name"><?php echo $row_product_details['product_code'];?></span>
						</span>
						<span class="pro-soldold">Còn hàng</span>
					</div>
					<p class="price">
						<?php 
								 echo number_format($row_product_details['product_price']).'đ';
							?>
					</p>
					<form action="cart.php?giohang&id=<?php echo $row_product_details['product_id'];?>" method="POST"
						style="margin-bottom:10px;">
						<div class="size" style="padding:5px 0;">
							<h4>Kích thước</h4>
							<div class="size-items">
								<p>
									<input style="opacity:0;" type="radio" name="radio" id="s28" value="28">
									<label for="s28">28</label>
								</p>
								<p class="">
									<input style="opacity:0;" type="radio" name="radio" value="29" id="s29">
									<label for="s29">29</label>
								</p>
								<p class="">
									<input style="opacity:0;" type="radio" name="radio" value="30" id="s30">
									<label for="s30">30</label>
								</p>
								<p class="">
									<input style="opacity:0;" type="radio" name="radio" value="31" id="s31">
									<label for="s31">31</label>
								</p>
								<p class="">
									<input style="opacity:0;" type="radio" name="radio" value="32" id="s32">
									<label for="s32">32</label>
								</p>
								<p class="">
									<input style="opacity:0;" type="radio" name="radio" value="33" id="s33">
									<label for="s33">33</label>
								</p>
								<p class="">
									<input style="opacity:0;" type="radio" name="radio" value="34" id="s34">
									<label for="s34">34</label>
								</p>
							</div>
							<div class="promotion">
								<p class="promotion-title">
									KHUYẾN MÃI, ƯU ĐÃI
								</p>
								<ul>
									<li>
										<span>
											- Đăng ký thành viên để được tích lũy và tham dự chương trình <a href="#">membership</a>
										</span>

									</li>
									<li>
										<span>- Freeship toàn quốc cho hoá đơn từ 499k</span>
									</li>
								</ul>
							</div>
							<div class="cart">
								<div class="buy-now">
									<input type="submit" name="muangay" value="Mua Ngay">
								</div>
							</div>
						</div>
					</form>

					<div class="accordion">
						<div class="accordion-items">
							<div class="title">
								<h3>THÔNG SỐ SẢN PHẨM</h3>
								<span class="see">
								</span>
							</div>
							<div class="content">
								<p>Đang cập nhật nội dung.</p>
							</div>
						</div>
						<div class="accordion-items">
							<div class="title">
								<h3>CHÍNH SÁCH ĐỔI TRẢ</h3>
								<span class="see">
								</span>
							</div>
							<div class="content">
								<ul>
									<li>
										<p>
											- Sản phẩm được hỗ trợ đổi trả 30 ngày
										</p>
									</li>
									<li>
										<p> - Sản phẩm đổi phải còn nguyên chưa qua sử dụng, giặt tẩy</p>
									</li>
									<li>
										<p>- Vì lí do sức khoẻ, Hẻm store không áp dụng đổi trả với các sản phẩm quần lót</p>
									</li>
									<li>
										<p>- Hướng dẫn và chi tiết đổi trả vui lòng xem thêm tại: http://bit.ly/3pJtVwI</p>
									</li>
								</ul>
							</div>
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
	</div>
</section>
<style>
.size-items p {
	position: relative;
	overflow: hidden;
	width: 40px !important;
	height: 40px !important;
}

.img-carousel {
	width: 100%;
}

.img-carousel__item {
	width: 100%;
}

.img-carousel__item img {
	width: 100%;
}
</style>
<!--end  product details section -->