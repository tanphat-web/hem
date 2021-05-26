<?php
	session_start();
 include('../db/connect.php');
?>
<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		if($email=='' || $password ==''){
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE admin_email='$email' AND admin_password='$password' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_login = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['login'] = $row_login['admin_name'];
				$_SESSION['admin_id'] = $row_login['admin_id'];
				header('Location: dashboard.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		Hem Store Admin
	</title>
	<link rel="shortcut icon" href="/images/logo-mb.jpg" type="image/png">
	<!-- GOOGLE FONT -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		rel="stylesheet">
	<!-- login css  -->
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<div class="main">

		<form action="" method="POST" class="form" id="form-1">
			<h3 class="heading">Đăng nhập</h3>
			<div class="spacer"></div>
			<div class="form-group">
				<label for="email" class="form-label">Email</label>
				<input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
				<span class="form-message"></span>
			</div>
			<div class="form-group">
				<label for="password" class="form-label">Mật khẩu</label>
				<input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
				<span class="form-message"></span>
			</div>
			<input class="form-submit" name="login" type="submit" value="Đăng nhập">
		</form>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!-- APP JS -->
	<script src="./js/app.js"></script>

</body>

</html>