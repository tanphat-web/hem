<?php include('./db/connect.php');?>
<?php include('./inc/header.php');?>
<main class="blog-pages">
	<!-- start breadcrumb -->
	<section class="breadcrumb-section center">
		<div class="container">
			<ul>
				<li><a href="index.php">
						<img src="img/home.svg" alt="" class="svg">
						<span>Trang Chủ</span>
					</a></li>
				<li>Tin tức</li>
			</ul>
		</div>
	</section>
	<!-- end breadcrumb -->
	<!-- news section -->
	<section class="news-section">
		<div class="container">
			<div class="row news-list">
				<?php 
				$sql_all_news = mysqli_query($con,"SELECT * FROM tbl_news ORDER BY new_id LIMIT 4");
				while($row_all_news= mysqli_fetch_array($sql_all_news)){
			?>
				<div class="col-lg-4 col-md-6">
					<div class="news-list__items">
						<a href="new-details.php?id=<?php echo $row_all_news['new_id']?>" class="news-list__items">
							<div class="img">
								<img src="img/news/<?php echo $row_all_news['new_image'];?>"
									onerror="this.onerror=null;this.src='uploads/<?php echo $row_all_news['new_image'];?>'" alt="">
							</div>
						</a>
						<div class="news-text">
							<a href="new-details.html" class="news-title">
								<h3>
									<?php echo $row_all_news['new_title'];?>
								</h3>
							</a>
							<p class="desc">
								<?php echo $row_all_news['new_status'];?>
							</p>
							<a href="new-details.php?id=<?php echo $row_all_news['new_id']?>" class="btn btn-news">Xem thêm</a>
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
<?php include('./inc/footer.php');?>