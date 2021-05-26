<?php 
// cập nhật bài viết
	if(isset($_POST['capnhat'])){
		$id = $_POST['bvid'];
		$tenbv = $_POST['ten'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$noidung = $_POST['noidung'];
		$tmp_img =$_FILES['hinhanh']['tmp_name'] ;
		$path = '../uploads/';
		if($hinhanh == ''){
			$sql_update_news = mysqli_query($con,"UPDATE tbl_news SET new_title='$tenbv',
			new_status = '$noidung' WHERE new_id = '$id'");
		}else {
			$sql_update_news = mysqli_query($con,"UPDATE tbl_news SET new_image ='$hinhanh',new_title='$tenbv',
			new_status = '$noidung' WHERE new_id = '$id'");
			move_uploaded_file($tmp_img,$path.$hinhanh);
		}
		header('location: dashboard.php?blog');
	}
?>
<?php 
	if(isset($_GET['capnhatbaiviet'])){
		$id = $_GET['id'];
		$sql_update_post = mysqli_query($con,"SELECT * FROM tbl_news
		 WHERE new_id='$id' ORDER BY new_id");
		$row_update_post  = mysqli_fetch_array($sql_update_post);
	}
?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			Cập nhật bài viết
		</div>
	</div>
	<div class="main-content">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Tiêu đề bài viết:</label>
				<input type="text" name="ten" value="<?php echo $row_update_post['new_title'];?>">
			</div>
			<div class="form-group">
				<label for="">Hình ảnh:</label>
				<input type="file" name="hinhanh" id="" value="">
				<img src="../img/news/<?php echo $row_update_post['new_image'];?>"
					onerror="this.onerror=null;this.src='../uploads/<?php echo $row_update_post['new_image'];?>'" alt="">
			</div>
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea name="noidung" id=""><?php echo $row_update_post['new_status'];?></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="bvid" value="<?php echo $row_update_post['new_id'];?>">
			</div>
			<div class="form-group">
				<input type="submit" name="capnhat" value="Cập nhật bài viết">
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