<?php 
 if(isset($_GET['xoaid'])){
	 $id = $_GET['xoaid'];
	 $sql_delete_items = mysqli_query($con,"DELETE FROM tbl_news WHERE new_id = '$id'");
	 header('location: dashboard.php?blog');
 }
 ?>
<div class="main">
	<div class="main-content">
		<div class="row">
			<div class="col-12">
				<!-- ORDERS TABLE -->
				<div class="box">
					<div class="box-header">
						Danh sách bài viết
					</div>
					<div class="box-body overflow-scroll">
						<table>
							<thead>
								<tr>
									<th>Thứ tự</th>
									<th>Hình ảnh</th>
									<th>Tiêu đề</th>
									<th>Nội dung</th>
									<th>Quản lý</th>
								</tr>
							</thead>
							<?php 
										$sql_select_news = mysqli_query($con,"SELECT * FROM tbl_news ORDER BY new_id DESC");
										$i=0;
										while($row_select_news = mysqli_fetch_array($sql_select_news)){
											$i++;
									?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<div class="img">
										<img style="width:100px;height:auto;padding:0 10px; "
											src="../img/news/<?php echo $row_select_news['new_image'];?>"
											onerror="this.onerror=null;this.src='../uploads/<?php echo $row_select_news['new_image'];?>'"
											alt="">
									</div>
								</td>
								<td class="title">
									<b><?php echo $row_select_news['new_title'];?></b>
								</td>

								<td class="status">
									<p><?php echo  $row_select_news['new_status'];?></p>
								</td>
								<td style="text-align:center;">
									<a href="dashboard.php?blog&xoaid=<?php echo $row_select_news['new_id'];?>"
										style="color:rgb(231, 45, 20);">
										Xóa
									</a>
									<span>||</span>
									<a href="?capnhatbaiviet&id=<?php echo $row_select_news['new_id']; ?>"
										style="color:rgb(231, 45, 20);">Cập nhật</a>
								</td>
							</tr>
							<?php 
										}
										?>
						</table>
					</div>
				</div>
				<!-- END ORDERS TABLE -->
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->

<div class="overlay"></div>
<style>
td.status {

	width: 400px;
}

td.status p {
	text-overflow: ellipsis;
	overflow: hidden;
	display: -webkit-box;
	-webkit-line-clamp: 3;
	-webkit-box-orient: vertical;
}

td.title {
	width: 220px;
}
</style>
<!-- SCRIPT -->
<!-- APEX CHART -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- APP JS -->
<script src="./js/app.js"></script>

</body>

</html>