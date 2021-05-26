<?php 
	if(isset($_GET['danhmucsanpham'])){
		$id = $_GET['id'];
		if(isset($_POST['xoa'])){
			$idxoa = $_POST['id_xoa'];
			echo $id;
			$sql_del_product = mysqli_query($con,"DELETE FROM tbl_product WHERE product_id = '$idxoa'");
		}
	}
	$sql_select_product = mysqli_query($con,"SELECT * FROM tbl_product
	 WHERE category_id ='$id' ORDER BY product_id DESC");
?>
<div class="main">
	<div class="main-header">
		<div class="mobile-toggle" id="mobile-toggle">
			<i class='bx bx-menu-alt-right'></i>
		</div>
		<div class="main-title">
			Tất cả sản phẩm
		</div>
	</div>
	<div class="main-content">
		<div class="row">
			<div class="col-12">
				<!-- ORDERS TABLE -->
				<div class="box">
					<div class="box-header">
						Danh sách sản phẩm
					</div>
					<div class="box-body overflow-scroll">
						<table>
							<thead>
								<tr>
									<th>Thứ tự</th>
									<th>Tên sản phẩm</th>
									<th>Hình ảnh</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>Giá gốc</th>
									<th>Quản lý</th>
								</tr>
							</thead>
							<?php 

										$i=0;
										while($row_select_product = mysqli_fetch_array($sql_select_product)){
											$i++;
									?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<?php echo $row_select_product['product_name'];?>
								</td>
								<td>
									<div class="img">
										<img style="width:60px;height:auto; "
											src="../img/product/<?php echo $row_select_product['product_image'];?>"
											onerror="this.onerror=null;this.src='../uploads/<?php echo $row_select_product['product_image'];?>'"
											alt="">
									</div>
								</td>
								<td><?php echo  $row_select_product['product_quantity'];?></td>
								<td>
									<?php echo number_format($row_select_product['product_price']).'đ'?>
								</td>
								<td>
									<span> <?php 
												if($row_select_product['product_discount'] > 0 ){
													echo number_format($row_select_product['product_discount']).'đ';
												}else {
													echo number_format($row_select_product['product_price']).'đ';
												}
											?>
									</span>
								</td>
								<td style="text-align:center; ">
									<form action="" method="POST" style="display:inline;">
										<input type="hidden" name="id_xoa" value=<?php echo $row_select_product['product_id']; ?>>
										<input type="submit" value="Xóa" name="xoa">
									</form>
									<span>||</span>
									<a href="?capnhatsanpham&id=<?php echo $row_select_product['product_id']; ?>"
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
<style>
input[type="submit"] {
	border: none;
	outline: none;
	background: transparent;
	color: rgb(231, 45, 20);
	cursor: pointer;
	font-size: 16px;
}

form {
	max-width: 400px;
	background: transparent;
	padding-right: 5px;
	border: none;
	border-radius: none;
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