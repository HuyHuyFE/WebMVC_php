<?php
include '../classes/adminlogin.php';
?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);

	$login_check = $class->login_admin($adminUser, $adminPass);
}
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<form action="login.php" method="post">
				<h1>Trang Admin</h1>
				<span><?php

						if (isset($login_check)) {
							echo $login_check;
						}
						?></span>

				<div>
					<input type="text" placeholder="Tên Đăng Nhập" required="" name="adminUser" />
				</div>
				<div>
					<input type="password" placeholder="Mật Khẩu" required="" name="adminPass" />
				</div>
				<div>
					<input type="submit" value="Đăng Nhập" />
				</div>
			</form><!-- form -->

		</section><!-- content -->
	</div><!-- container -->
</body>

</html>