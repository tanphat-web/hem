<?php 
// cập nhật sản phẩm 
	if(isset($_POST['capnhat'])){
		$id = $_POST['spid'];
		$tensp = $_POST['ten'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_hover = $_FILES['hinhanh_hover']['name'];
		$soluong  = $_POST['soluong'];
		$gia = $_POST['gia'];
		$giagoc = $_POST['giagoc'];
		$mota = $_POST['mota'];
		$chitiet = $_POST['chitiet'];
		$danhmuc = $_POST['cate_id'];
		$tmp_img =$_FILES['hinhanh']['tmp_name'] ;
		$tmp_img_hover =$_FILES['hinhanh_hover']['tmp_name'] ;
		$path = '../uploads/';
		if($hinhanh == '' || $hinhanh_hover == ''){
			$sql_update_image = mysqli_query($con,"UPDATE tbl_product SET product_name='$tensp',product_price='$gia',
			product_discount = '$giagoc',product_quantity='$soluong',product_details='$chitiet',
			product_desc = '$mota' WHERE product_id = '$id'");
		}else {
			$sql_update_image = mysqli_query($con,"UPDATE tbl_product SET product_image='$hinhanh',
			product_image_hover = '$hinhanh_hover', product_name='$tensp',product_price='$gia',
			product_discount = '$giagoc',product_quantity='$soluong',product_details='$chitiet',
			product_desc = '$mota' WHERE product_id = '$id'");
			move_uploaded_file($tmp_img,$path.$hinhanh);
			move_uploaded_file($tmp_img_hover,$path.$hinhanh_hover);
		}
	}
?>
<?php 
	if(isset($_GET['capnhatsanpham'])){
		$id = $_GET['id'];
		$sql_product_update = mysqli_query($con,"SELECT * FROM tbl_product,tbl_category
		 WHERE tbl_product.product_id ='$id' ORDER BY product_id");
		$row_product_update = mysqli_fetch_array($sql_product_update);
	}
?>

<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			Cập nhật sản phẩm
		</div>
	</div>
	<div class="main-content">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Tên sản phẩm:</label>
				<input type="text" name="ten" value="<?php echo $row_product_update['product_name'];?>">
			</div>
			<div class="form-group">
				<label for="">Hình ảnh:</label>
				<input type="file" name="hinhanh" id="" value="">
				<img src="../img/product/<?php echo $row_product_update['product_image'];?>"
					onerror="this.onerror=null;this.src='../uploads/<?php echo $row_product_update['product_image'];?>'" alt="">
			</div>
			<div class="form-group">
				<label for="">Hình ảnh hover:</label>
				<input type="file" name="hinhanh_hover" id="" value="">
			</div>
			<div class="form-group">
				<label for="">Giá:</label>
				<input type="text" name="gia" id="" value="<?php echo $row_product_update['product_price'];?>">
			</div>
			<div class="form-group">
				<input type="hidden" name="id" id="">

			</div>
			<div class="form-group">
				<label for="">Giá gốc:</label>
				<input type="text" name="giagoc" id="" value="<?php echo $row_product_update['product_discount'];?>">
			</div>
			<div class="form-group">
				<label for="">Số lượng:</label>
				<input type="text" name="soluong" id="" value="<?php echo $row_product_update['product_quantity'];?>">
			</div>
			<div class="form-group">
				<label for="">Mô tả</label>
				<textarea name="mota" id="" cols="30" rows="10"><?php echo $row_product_update['product_desc'];?></textarea>
			</div>
			<div class="form-group">
				<label for="">Chi tiết</label>
				<textarea name="chitiet" id="" cols="30"
					rows="10"><?php echo $row_product_update['product_details'];?></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="cate_id" value="<?php echo $row_product_update['category_id'];?>">
				<input type="hidden" name="spid" value="<?php echo $row_product_update['product_id'];?>">
			</div>
			<div class="form-group">
				<input type="submit" name="capnhat" value="Cập nhật sản phẩm">
			</div>
		</form>
	</div>
</div>
<!-- END MAIN CONTENT -->
<style>
.form-group img {
	object-fit: inherit !important;
}
</style>
<div class="overlay"></div>

<!-- SCRIPT -->
<!-- APEX CHART -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- APP JS -->
<script src="./js/app.js"></script>

</body>

</html>