 <?php 
	if(isset($_POST['themsanpham'])){
			$tensanpham = $_POST['tensanpham'];
			$hinhanh = $_FILES['hinhanh']['name'];
			$hinhanh_hover = $_FILES['hinhanh_hover']['name'];
			$soluong = $_POST['soluong'];
			$gia = $_POST['gia'];
			$giagoc = $_POST['giagoc'];
			$danhmuc = $_POST['danhmuc'];
			$chitiet = $_POST['chitiet'];
			$mota = $_POST['mota'];
			$path = '../uploads/';
			$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
			$hinhanh_hover_tmp = $_FILES['hinhanh_hover']['tmp_name'];
			$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_product(product_name,product_image,product_image_hover,
			product_price,product_discount,product_quantity,product_details,product_desc,category_id)
			VALUES('$tensanpham','$hinhanh','$hinhanh_hover','$gia','$giagoc','$soluong','$chitiet','$mota','$danhmuc')");
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			move_uploaded_file($hinhanh_hover_tmp,$path.$hinhanh_hover);
	}
 ?>
 <!-- MAIN CONTENT -->
 <div class="main">
 	<div class="main-header">
 		<div class="mobile-toggle" id="mobile-toggle">
 			<i class='bx bx-menu-alt-right'></i>
 		</div>
 		<div class="main-title">
 			Thêm sản phẩm
 		</div>
 	</div>
 	<div class="main-content">
 		<form action="" method="post" enctype="multipart/form-data">
 			<div class="form-group">
 				<label for="">Tên sản phẩm:</label>
 				<input type="text" placeholder="VD: Quần jean nam" name="tensanpham">
 			</div>
 			<div class="form-group">
 				<label for="">Hình ảnh:</label>
 				<input type="file" name="hinhanh" id="">
 			</div>
 			<div class="form-group">
 				<label for="">Hình ảnh hover:</label>
 				<input type="file" name="hinhanh_hover" id="">
 			</div>
 			<div class="form-group">
 				<label for="">Giá:</label>
 				<input type="text" name="gia" placeholder="VD: 150.000đ" id="">
 			</div>
 			<div class="form-group">
 				<label for="">Giá gốc:</label>
 				<input type="text" name="giagoc" placeholder="VD: 150.000đ" id="">
 			</div>
 			<div class="form-group">
 				<label for="">Số lượng:</label>
 				<input type="text" name="soluong" placeholder="VD: 9" id="">
 			</div>
 			<div class="form-group">
 				<label for="">Mô tả:</label>
 				<textarea name="mota" id="" cols="30" rows="10"></textarea>
 			</div>
 			<div class="form-group">
 				<label for="">Chi tiết:</label>
 				<textarea name="chitiet" id="" cols="30" rows="10"></textarea>
 			</div>
 			<div class="form-group">
 				<select name="danhmuc" id="">
 					<option value="" selected="selected">------Chọn danh mục------</option>
 					<?php 
									$sql_category = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id");
									while($row_category = mysqli_fetch_array($sql_category)){
							?>
 					<option value="<?php echo $row_category['category_id'];?>"><?php echo $row_category['category_name'];?>
 					</option>
 					<?php 
									}
									?>
 				</select>
 			</div>
 			<div class="form-group">
 				<input type="submit" name="themsanpham" value="Thêm sản phẩm">
 			</div>
 		</form>
 	</div>
 </div>
 <!-- END MAIN CONTENT -->

 <div class="overlay"></div>

 <!-- SCRIPT -->
 <!-- APEX CHART -->
 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <!-- APP JS -->
 <script src="./js/app.js"></script>

 </body>

 </html>