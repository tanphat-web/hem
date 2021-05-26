<?php 
// cập nhật bài viết
	if(isset($_POST['them'])){
		$tieude = $_POST['ten'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$noidung = $_POST['noidung'];
		$tmp_img =$_FILES['hinhanh']['tmp_name'] ;
		$path = '../uploads/';
		$sql_add_news = mysqli_query($con,"INSERT INTO tbl_news(new_image,new_title,new_status)
		VALUES('$hinhanh','$tieude','$noidung')");
		move_uploaded_file($tmp_img,$path.$hinhanh);
		}
?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			thêm bài viết
		</div>
	</div>
	<div class="main-content">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Tiêu đề bài viết:</label>
				<input type="text" name="ten" value="">
			</div>
			<div class="form-group">
				<label for="">Hình ảnh:</label>
				<input type="file" name="hinhanh" id="" value="">
			</div>
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea name="noidung" id=""></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="them" value="Thêm bài viết">
			</div>
		</form>
	</div>
</div>
<!-- END MAIN CONTENT -->
<style>
.form-group textarea {
	height: 200px;
	line-height: 1.5;
	font-size: 14px;
}

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