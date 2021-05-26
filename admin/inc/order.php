<?php 
 if(isset($_GET['xoaid'])){
	 $id = $_GET['xoaid'];
	 $sql_delete = mysqli_query($con,"DELETE FROM tbl_checkout WHERE checkout_id = '$id'");
	 header('location: dashboard.php?donhang');
 }
 ?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			Tất cả đơn hàng
		</div>
	</div>
	<div class="main-content">
		<div class="row">
			<div class="col-12">
				<!-- ORDERS TABLE -->
				<div class="box">
					<div class="box-header">
						liệt kê đơn hàng
					</div>
					<?php
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_customer,tbl_checkout 
				WHERE tbl_checkout.customer_id=tbl_customer.customer_id GROUP BY code DESC"); 
				?>
					<div class="box-body overflow-scroll">
						<table>
							<thead>
								<tr>
									<th>Thứ tự</th>
									<th>Mã hàng</th>
									<th>Tình trạng</th>
									<th>Ngày đặt</th>
									<th>Ghi chú</th>
									<th>Quản lý</th>
								</tr>
							</thead>
							<?php
										$i = 0;
										while($row_select_checkout = mysqli_fetch_array($sql_select)){ 
											$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<?php echo $row_select_checkout['code'];?>
								</td>
								<td style="color:Red;">
									<?php 
										if($row_select_checkout['checkout_condition'] == 0){
											echo 'Đã xử lý - Giao hàng';
										}else {
											echo 'đang chờ  xử lý';
										}
									?>
								</td>
								<td><?php  echo date("d/m/Y",strtotime($row_select_checkout['date']));?></td>
								<td>
									<?php echo $row_select_checkout['status'];?>

								</td>
								<td style="text-align:center;">
									<a href="dashboard.php?donhang&xoaid=<?php echo $row_select_checkout['checkout_id'];?>"
										style="color:rgb(231, 45, 20);">
										Xóa
									</a>
									<span>||</span>
									<a href="?chitietdonhang&id=<?php echo $row_select_checkout['code']; ?>"
										style="color:rgb(231, 45, 20);">Chi tiết</a>
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