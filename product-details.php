<?php include('./db/connect.php');?>
<?php include('./inc/header.php');?>
<main>
	<?php 
		$detail_page = $_GET['chitiet'];
		if($detail_page == 'phu-kien') {
			include('./inc/details-non.php');
		}elseif($detail_page == 'quan'){
			include('./inc/details-quan.php');
		}elseif($detail_page == 'ao'){
			include('./inc/details-ao.php');
		}
	?>
</main>
<style>
.size-items p.active {
	background: #000;
}

.size-items p.active label {
	color: #fff;
}

.size-items p label {
	position: absolute;
	top: 0;
	left: 0;
	text-align: center;
	line-height: 40px;
	width: 100%;
	color: #000;
}

input[type="submit"] {
	border: 1px solid #000;
	padding: 12px 17px;
	cursor: pointer;
	transition: .4s;
	color: #fff;
	background: #000 !important;
}
</style>
<?php 
	include('./inc/footer.php');
?>
<!-- end search mobile -->
<!-- javascript -->
<script type="text/javascript" src="dest/jsmain.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>

</html>