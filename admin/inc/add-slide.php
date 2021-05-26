<?php 
// them slide
	if(isset($_POST['them'])){
		$hinhanh = $_FILES['hinhanh']['name'];
		$tmp_img =$_FILES['hinhanh']['tmp_name'] ;
		$path = '../uploads/';
		$sql_add_news = mysqli_query($con,"INSERT INTO tbl_slide(slide_image)
		VALUES('$hinhanh')");
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
				<label for="">Hình ảnh:</label>
				<input type="file" name="hinhanh" id="" value="">
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