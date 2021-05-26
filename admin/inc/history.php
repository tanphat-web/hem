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
			<a href="dashboard.php?khachhang" style="color:blue;">Quay lại trang khách hàng</a>
		</div>
	</div>
	<div class="main-content">
		<div class="row">
			<div class="col-12">
				<!-- ORDERS TABLE -->
				<div class="box">
					<div class="box-header">
						lịch sử mua hàng
					</div>
					<div class="box-body overflow-scroll">
						<table>
							<thead>
								<tr>
									<th>Thứ tự</th>
									<th>Mã giao dịch</th>
									<th>Tên sản phẩm</th>
									<th>Hình ảnh</th>
									<th>Size</th>
									<th>Số lượng</th>
									<th>Ngày đặt</th>
								</tr>
							</thead>
							<?php 
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									$sql_history = mysqli_query($con,"SELECT * FROM tbl_checkout,tbl_product
									 WHERE tbl_checkout.phone = '$id' AND tbl_checkout.product_id = tbl_product.product_id ORDER BY tbl_checkout.phone");
									 $i=0;
									 $price = 0;
									$total = 0;
									 while($row_history = mysqli_fetch_array($sql_history)){
										$i++;
									?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<?php echo $row_history['code'];?>
								</td>
								<td>
									<?php echo $row_history['product_name'];?>
								</td>
								<td>
									<img style="width:100px;" src="../img/product/<?php echo $row_history['product_image'];?>"
										onerror="this.onerror=null;this.src='../uploads/<?php echo $row_history['product_image'];?>'"
										alt="">
								</td>
								<td><?php echo $row_history['size'];?></td>
								<td><?php echo $row_history['quantity'];?></td>
								<td><?php  echo $row_history['date'];?></td>
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