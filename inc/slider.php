	<!-- start carousel section -->
	<section class="carousel-section">
		<div class="main-carousel">
			<?php
			$sql_carousel = mysqli_query($con,"SELECT * FROM tbl_slide ORDER BY slide_id desc");
			while($row_carousel = mysqli_fetch_array($sql_carousel)){
		?>
			<div class="carousel-items">
				<img src="img/carousel/<?php echo $row_carousel['slide_image'];?>" alt="">
			</div>
			<?php
			}
			?>
		</div>
		<div class="control-group">
			<button class="btn btn-prev">
				<img src="img/left-arrow.svg" alt="" class="svg">
			</button>
			<button class="btn btn-next">
				<img src="img/right-arrow.svg" alt="" class="svg">
			</button>
		</div>
	</section>
	<!-- end carousel section -->