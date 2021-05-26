<?php 
 if(isset($_GET['xoaid'])){
	 $id = $_GET['xoaid'];
	 $sql_delete_items = mysqli_query($con,"DELETE FROM tbl_slide WHERE slide_id = '$id'");
	 header('location: dashboard.php?slide');
 }
 ?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			Slider
		</div>
	</div>
	<div class="main-content">
		<div class="row">
			<div class="col-12">
				<!-- ORDERS TABLE -->
				<div class="box">
					<div class="box-header">
						Danh sách hình ảnh
					</div>
					<div class="box-body overflow-scroll">
						<table>
							<thead>
								<tr>
									<th>Thứ tự</th>
									<th>Hình ảnh</th>
									<th>Quản lý</th>
								</tr>
							</thead>
							<?php 
										$sql_select_slide = mysqli_query($con,"SELECT * FROM tbl_slide ORDER BY slide_id DESC");
										$i=0;
										while($row_select_slide = mysqli_fetch_array($sql_select_slide)){
											$i++;
									?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<div class="img">
										<img style="width: 300px !important; "
											src="../img/carousel/<?php echo $row_select_slide['slide_image'];?>"
											onerror="this.onerror=null;this.src='../uploads/<?php echo $row_select_slide['slide_image'];?>'"
											alt="">
									</div>
								</td>
								</td>
								<td style="text-align:center;">
									<a href="?slide&xoaid=<?php echo $row_select_slide['slide_id'];?>" style="color:rgb(231, 45, 20);">
										Xóa
									</a>
									<span>||</span>
									<a href="?capnhatimg&id=<?php echo $row_select_slide['slide_id']; ?>"
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

<!-- SCRIPT -->
<!-- APEX CHART -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- APP JS -->
<script src="./js/app.js"></script>

</body>

</html>