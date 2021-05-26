<?php 
	include('./db/connect.php');
	include('./inc/header.php');
?>
<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql_select_news = mysqli_query($con,"SELECT * FROM tbl_news WHERE new_id = '$id'");
		$row_select_news = mysqli_fetch_array($sql_select_news);

	}
?>
<main class="blog-pages" id="new-details">
	<!-- start breadcrumb -->
	<section class="breadcrumb-section center">
		<div class="container">
			<ul>
				<li><a href="index.html">
						<img src="img/home.svg" alt="" class="svg">
						<span>Trang Chủ</span>
					</a></li>
				<li>
					<a href="news.php">Tin tức</a>
				</li>
				<li>
					<?php echo $row_select_news['new_title'];?>
				</li>
			</ul>
		</div>
	</section>
	<!-- end breadcrumb -->
	<!-- start details-pages -->
	<section class="detail-page">
		<div class="container">
			<div class="detail-page__wrap">
				<h2 class="heading">
					<?php echo $row_select_news['new_title'];?>
				</h2>
				<div class="date-posting">
					<img src="img/calendar.svg" alt="" class="svg">
					<span>Đăng ngày <?php echo date("d/m/Y",strtotime($row_select_news['new_date']));?></span>
				</div>
				<div class="info" style="padding-bottom:15px;">
					<img src="img/news/new-dt.jpg" alt="">
					<div class="text">
						<?php echo $row_select_news['new_status'];?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end  details-pages -->
	<!-- news section -->
	<section class="news-section">
		<div class="container">
			<h2 class="heading">
				BÀI VIẾT LIÊN QUAN
			</h2>
			<div class="row news-list">
				<?php 
				$sql_news = mysqli_query($con,"SELECT * FROM tbl_news WHERE NOT new_id = '$id'  ORDER BY new_id LIMIT 3 ");
				while($row_news = mysqli_fetch_array($sql_news)){
			?>
				<div class="col-lg-4 col-md-6">
					<div class="news-list__items">
						<a href="new-details.html" class="news-list__items">
							<div class="img">
								<img src="img/news/<?php echo $row_news['new_image'];?>"
									onerror="this.onerror=null;this.src='uploads/<?php echo $row_news['new_image'];?>'" alt="">
							</div>
						</a>
						<div class="news-text">
							<a href="new-details.html" class="news-title">
								<h3>
									<?php echo $row_news['new_title'];?>
								</h3>
							</a>
							<p class="desc">
								<?php echo $row_news['new_status'];?>
							</p>
							<a href="new-details.php?id=<?php echo $row_news['new_id']?>" class="btn btn-news">Xem thêm</a>
						</div>
					</div>
				</div>
				<?php 
				}
				?>
			</div>
		</div>
	</section>
	<!-- end news section -->
</main>
<style>
.text {
	padding: 20px 0;
	line-height: 1.55;
}

.text h3 {
	font-size: 16px;
	margin-bottom: 10px;
}

.text span {
	line-height: 1.55;
	display: block;
}
</style>
<?php 
	include('./inc/footer.php');
?>