<?php 
// cập nhật bài viết
	if(isset($_POST['capnhat'])){
		$hinhanh = $_FILES['hinhanh']['name'];
		$tmp_img =$_FILES['hinhanh']['tmp_name'] ;
		$path = '../uploads/';
		if($hinhanh == ''){
			echo 'them hinh anh!';
		}else {
			$sql_update_news = mysqli_query($con,"UPDATE tbl_slide SET slide_image='$hinhanh' WHERE slide_id = '$id'");
		}
		header('location: dashboard.php?blog');
	}
?>
<?php 
	if(isset($_GET['capnhatimg'])){
		$id = $_GET['id'];
		$sql_slide = mysqli_query($con,"SELECT * FROM tbl_slide
		 WHERE slide_id='$id' ORDER BY slide_id");
		$row_slide  = mysqli_fetch_array($sql_slide);
	}
?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			Cập nhật slide
		</div>
	</div>
	<div class="main-content">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Hình ảnh:</label>
				<input type="file" name="hinhanh" id="" value="">
				<img src="../img/carousel/<?php echo $row_slide['slide_image'];?>"
					onerror="this.onerror=null;this.src='../uploads/<?php echo $row_slide['slide_image'];?>'" alt="">
			</div>
			<div class="form-group">
				<input type="hidden" name="bvid" value="<?php echo $row_update_post['new_id'];?>">
			</div>
			<div class="form-group">
				<input type="submit" name="capnhat" value="Cập nhật ảnh">
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