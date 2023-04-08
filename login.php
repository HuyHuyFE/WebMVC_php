<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
$login_check = Session::get('customer_login');
if ($login_check) {
	header('Location:index.php');
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$insertCustomers = $cs->insert_customers($_POST);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

	$login_Customers = $cs->login_customers($_POST);
}
?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Bạn Đã Có Tài Khoản?</h3>
			<p>Hãy Đăng Nhập Dưới Đây</p>
			<?php
			if (isset($login_Customers)) {
				echo $login_Customers;
			}
			?>
			<form action="" method="post">
				<input type="text" name="email" class="field" placeholder="Nhập Email">
				<input type="password" name="password" class="field" placeholder="Nhập Mật Khẩu">
				<p class="note">Nếu bạn quên mật khẩu hãy click <a href="#">tại đây</a></p>
				<div class="buttons">
					<div><input type="submit" name="login" class="grey" value="Đăng Nhập"></div>
				</div>
			</form>
		</div>
		<?php

		?>
		<div class="register_account">
			<h3>Đăng Ký Tài Khoản</h3>
			<?php
			if (isset($insertCustomers)) {
				echo $insertCustomers;
			}
			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Nhập Tên">
								</div>

								<div>
									<input type="text" name="city" placeholder="Nhập Thành Phố">
								</div>

								<div>
									<input type="text" name="zipcode" placeholder="Zipcodeeee">
								</div>
								<div>
									<input type="text" name="email" placeholder="Nhập Email">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Địa Chỉ">
								</div>
								<div>
									<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
										<option value="null">Chọn Thành Phố</option>

										<option value="hcm">TPHCM</option>
										<option value="na">Nghệ An</option>
										<option value="hn">Đắk Lắk</option>
										<option value="dn">Đà Nẳng</option>
									</select>
								</div>

								<div>
									<input type="text" name="phone" placeholder="Số Điện Thoại.">
								</div>

								<div class="pass">
									<input type="password" name="password" placeholder="Mật Khẩu.">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><input type="submit" name="submit" class="grey" value="Đăng Ký"></div>
				</div>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<style>
	.pass {
		width: 360px;
		height: 36px;
	}

	.pass input {
		width: 350px;
		height: 36px;
	}

	.buttons .grey {
		background-color: red;
		border-radius: 8px;
		text-align: center;
		color: wheat;
	}

	.search .grey {
		background-color: red;
		border-radius: 8px;
		text-align: center;
		color: wheat;
	}
</style>
<?php
include 'inc/footer.php';

?>