<?php 
session_start();
include('../db/connect.php');

if(!isset($_SESSION['login'])){
	header('Location: index.php');
}
if(isset($_GET['login'])){
	$logout = $_GET['login'];
	}else{
		$logout = '';
	}
	if(isset($_GET['dangxuat'])){
		session_destroy();
		header('Location: index.php');
	}
?>
<?php 
	include('./inc/header.php');
?>

<?php 
		if(isset($_GET['sanpham'])){
			include('./inc/product.php');
		}elseif(isset($_GET['danhmucsanpham'])){
			include('./inc/category_product.php');
		}elseif(isset($_GET['themsanpham'])){
			include('./inc/add-product.php');
		}elseif(isset($_GET['capnhatsanpham'])){
			include('./inc/update-product.php');
		}elseif(isset($_GET['blog'])){
			include('./inc/blog.php');
		}elseif(isset($_GET['capnhatbaiviet'])){
			include('./inc/update-post.php');
		}elseif(isset($_GET['thembaiviet'])){
			include('./inc/add-post.php');
		}elseif(isset($_GET['donhang'])){
			include('./inc/order.php');
		}elseif(isset($_GET['chitietdonhang'])){
			include('./inc/order-details.php');
		}elseif(isset($_GET['khachhang'])){
			include('./inc/customer.php');
		}elseif(isset($_GET['slide'])){
			include('./inc/slide.php');
		}elseif(isset($_GET['lichsumuahang'])){
			include('./inc/history.php');
		}elseif(isset($_GET['themimg'])){
			include('./inc/add-slide.php');
		}elseif(isset($_GET['capnhatimg'])){
			include('./inc/update-slide.php');
		}else {
			include('./inc/main-homepage.php');
		}
?>
<style>
select {
	/* padding: 5px 10px; */
	padding: 10px 4px;
	font-size: 16px;
	width: 100%;
}
</style>