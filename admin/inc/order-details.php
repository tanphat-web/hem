<?php 
	if(isset($_POST['capnhatdonhang'])){
		$xuly = $_POST['xuly'];
		$mahang = $_POST['mahang_xuly'];
		$sql_update_donhang = mysqli_query($con,"UPDATE tbl_checkout SET checkout_condition='$xuly' WHERE code='$mahang'");
	}
?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			<a href="dashboard.php?donhang" style="color:blue;">Quay lại trang đơn hàng</a>
		</div>
	</div>
	<div class="main-content">
		<div class="row">
			<div class="col-12">
				<!-- ORDERS TABLE -->
				<div class="box">
					<div class="box-header">
						Chi tiết đơn hàng
					</div>
					<div class="box-body overflow-scroll">
						<form action="" method="POST">
							<table>
								<thead>
									<tr>
										<th>Thứ tự</th>
										<th>Mã hàng</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Giá</th>
										<th>Tổng tiền</th>
										<th>Ngày đặt</th>
									</tr>
								</thead>
								<?php 
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									$sql_details_order = mysqli_query($con,"SELECT * FROM tbl_checkout,tbl_product
									WHERE tbl_checkout.code ='$id' AND tbl_checkout.product_id = tbl_product.product_id
									 ");
									 $i=0;
									 $price = 0;
									$total = 0;
									 while($row_details_order = mysqli_fetch_array($sql_details_order)){
										$i++;
										$price = $row_details_order['product_price'] * $row_details_order['quantity'];
										$total += $price;
									?>
								<tr>
									<td><?php echo $i;?></td>
									<td>
										<?php echo $row_details_order['code'];?>
									</td>
									<td>
										<?php echo $row_details_order['product_name'];?>
									</td>
									<td><?php echo $row_details_order['quantity'];?></td>
									<td>
										<?php echo number_format($row_details_order['product_price']).'đ';?>
									</td>
									<td style="text-align:center;">
										<?php 
											echo number_format($price).'đ';
										?>
									</td>
									<td style="text-align:center;">
										<?php echo date("d/m/Y",strtotime($row_details_order['date']));?>
										<input type="hidden" name="mahang_xuly" value="<?php echo $row_details_order['code'] ?>">
									</td>
								</tr>

								<?php 
									 }
									 ?>
								<tr>
									<td colspan="7">
										Tổng tiền: <?php echo number_format($total).'đ'; ?>
									</td>
								</tr>
								<tr>

								</tr>
							</table>
							<select name="xuly" id="">
								<option value="1">
									Đã xử lý - Giao hàng
								</option>
								<option value="0">
									Chưa xử lý
								</option>
							</select></br>
							<input type="submit" name="capnhatdonhang" value="Cập nhật đơn hàng">
						</form>
					</div>
				</div>
				<!-- END ORDERS TABLE -->
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
<style>
form {
	width: 100%;
	background: none;
	border: none;
	padding: 0;
	max-width: 100%;
}

input[type="submit"] {
	outline: none;
	background-color: #1dbfaf;
	margin-top: 12px;
	padding: 12px 16px;
	font-weight: 600;
	color: #fff;
	border: none;
	width: 100%;
	font-size: 14px;
	border-radius: 8px;
	cursor: pointer;
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