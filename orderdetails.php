<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>


<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
	header('Location:login.php');
}


?>
<?php
if (isset($_GET['confirmid'])) {
	$id = $_GET['confirmid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$shifted_confirm = $ct->shifted_confirm($id, $time, $price);
}
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Chi Tiết Đơn Hàng</h2>

				<table class="tblone">
					<tr>
						<th width="10%">ID</th>
						<th width="20%">Tên Phim</th>
						<th width="10%">Hình Ảnh</th>
						<th width="15%">Giá</th>
						<th width="15%">Số Lượng</th>
						<th width="10%">Ngày</th>
						<th width="10%">Status</th>
						<th width="10%">Tình Trạng</th>
					</tr>
					<?php
					$customer_id = Session::get('customer_id');
					$get_cart_ordered = $ct->get_cart_ordered($customer_id);
					if ($get_cart_ordered) {
						$i = 0;
						$qty = 0;
						$total = 0;
						while ($result = $get_cart_ordered->fetch_assoc()) {
							$i++;
							$total = $result['price'] * $result['quantity'];
					?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
								<td><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></td>
								<td>


									<?php echo $result['quantity'] ?>


								</td>
								<td><?php echo $fm->formatDate($result['date_order']) ?></td>
								<td>
									<?php
									if ($result['status'] == '0') {
										echo 'Chờ Xác Nhận';
									} elseif ($result['status'] == 1) {
									?>
										<span>Đã Xác Nhận</span>

									<?php
									} elseif ($result['status'] == 2) {
										echo 'OK';
									}

									?>
								</td>
								<?php
								if ($result['status'] == '0') {
								?>
									<td><?php echo 'N/A'; ?></td>
								<?php

								} elseif ($result['status'] == '1') {

								?>
									<td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Nhận Vé</a></td>
								<?php
								} else {
								?>
									<td><?php echo 'Đã Nhận Vé'; ?></td>
								<?php
								}
								?>
							</tr>
					<?php

						}
					}
					?>

				</table>
				<div class="section group">
					<h2 class="success_order">Thanh Toán Thành Công</h2>
					<?php
					$customer_id = Session::get('customer_id');
					$get_amount = $ct->getAmountPrice($customer_id);
					if ($get_amount) {
						$amount = 0;
						while ($result = $get_amount->fetch_assoc()) {
							$price = $result['price'];
							$amount += $price;
						}
					}
					?>
					<p class="success_note">Tổng Tiền Đã Thanh Toán : <?php
																		$vat = $amount * 0.1;
																		$total = $vat + $amount;
																		echo $fm->format_currency($total) . ' VNĐ';
																		?> </p>

				</div>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shopp.png" alt=""><img src="images/shopp.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include 'inc/footer.php';

?>