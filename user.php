<?php include('./db/connect.php');?>
<?php include('./inc/header.php');?>
<main>
	<!-- user  -->
	<div class="user">
		<div class="container">
			<div class="user-wrap">
				<div class="user-nav">
					<p class="sign-in active" data-toggle="sign-in">
						Đăng nhập
					</p>
					<p class="sign-up" data-toggle="sign-up">
						Đăng ký
					</p>
				</div>
				<div class="user-group">
					<div class="sign-in user-items active" id="sign-in" data-user="sign-in">
						<form action="">
							<input type="text" id="username" placeholder="Nhập email hoặc tên đăng nhập">
							<input type="password" name="" id="password" placeholder="Mật khẩu">
							<button type="submit">ĐĂNG NHẬP</button>
						</form>
						<div class="sign-in__foot">
							<a href="get-pass-word.php" class="get-pass">Quên mật khẩu?</a>
							<p>Hoặc đăng nhập với</p>
							<ul>
								<li class="fb">
									<img src="img/facebook.svg" alt="" class="svg">
									<span>Đăng nhập với facebook</span>
								</li>
								<li class="gm">
									<img src="img/gg.svg" alt="" class="svg">
									<span>Đăng nhập với Google</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="sign-up user-items " id="sign-up">
						<form action="">
							<input type="text" id="name" placeholder="Nhập Họ tên">
							<input type="tel" name="" id="tel" placeholder="Nhập số điện thoại">
							<input type="email" name="" placeholder="Nhập email">
							<input type="password" name="" placeholder="Mật khẩu của bạn">
							<button type="submit">ĐĂNG KÝ</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- user -->
</main>
<?php include('./inc/footer.php');?>