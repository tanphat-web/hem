<?php 
 if(isset($_GET['xoaid'])){
	 $id = $_GET['xoaid'];
	 echo $id;
 }
 ?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			Tất cả khách hàng
		</div>
	</div>
	<div class="main-content">
		<div class="row">
			<div class="col-12">
				<!-- ORDERS TABLE -->
				<div class="box">
					<div class="box-header">
						liệt kê khách hàng
					</div>
					<?php
				$sql_select_customer = mysqli_query($con,"SELECT * FROM tbl_customer
				GROUP BY phone "); 
				?>
					<div class="box-body overflow-scroll">
						<table>
							<thead>
								<tr>
									<th>Thứ tự</th>
									<th>Tên khách hàng</th>
									<th>Số điện thoại</th>
									<th>Email</th>
									<th>Quản lý</th>
								</tr>
							</thead>
							<?php
										$i = 0;
										while($row_select_customer = mysqli_fetch_array($sql_select_customer)){ 
											$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<?php echo $row_select_customer['name'];?>
								</td>
								<td>
									<?php echo $row_select_customer['phone'];?>
								</td>
								<td>
									<?php echo $row_select_customer['email'];?>
								</td>
								<td style="text-align:center;">
									<a href="?lichsumuahang&id=<?php echo $row_select_customer['phone']; ?>" style="color:red;">Xem lịch
										sử mua hàng</a>
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