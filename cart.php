<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<style type="text/css">
	.box_left {
		width: 50%;
		border: 1px solid #666;
		float: left;
		padding: 4px;

	}

	.box_right {
		width: 47%;
		border: 1px solid #666;
		float: right;
		padding: 4px;
	}

	a.a_order {
		background: red;
		padding: 7px 20px;
		color: #fff;
		font-size: 21px;
	}
</style>
<?php
if (isset($_GET['cartid'])) {
	$cartid = $_GET['cartid'];
	$delcart = $ct->del_product_cart($cartid);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
	$update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
	if ($quantity <= 0) {
		$delcart = $ct->del_product_cart($cartId);
	}
}
?>
<?php
if (!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Giỏ Hàng Của Bạn</h2>
				<?php
				if (isset($update_quantity_cart)) {
					echo $update_quantity_cart;
				}
				?>
				<?php
				if (isset($delcart)) {
					echo $delcart;
				}
				?>
				<table class="tblone">
					<tr>

						<th width="20%">Tên Phim</th>
						<th width="10%">Hình Ảnh</th>
						<th width="15%">Giá</th>
						<th width="25%">Số Lượng</th>
						<th width="20%">Tổng Tiền</th>
						<th width="10%">Chỉnh Sửa</th>
					</tr>
					<?php
					$get_product_cart = $ct->get_product_cart();
					if ($get_product_cart) {
						$subtotal = 0;
						$qty = 0;
						while ($result = $get_product_cart->fetch_assoc()) {
					?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
								<td><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" />
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>" />
										<input type="submit" name="submit" value="Cập Nhật" />
									</form>
								</td>
								<td><?php
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total) . " " . "VNĐ";
									?></td>
								<td><a onclick="return confirm('Bạn có muốn xóa!!!');" href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
							</tr>
					<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
						}
					}
					?>
				</table>
				<?php
				$check_cart = $ct->check_cart();
				if ($check_cart) {
				?>
					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Giá Tiền: </th>
							<td><?php
								echo $fm->format_currency($subtotal) . " " . "VNĐ";
								Session::set('sum', $subtotal);
								Session::set('qty', $qty);
								?></td>
						</tr>
						<tr>
							<th>VAT : </th>
							<td>10%</td>
						</tr>
						<tr>
							<th>Tổng Cộng :</th>
							<td><?php

								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat;
								echo $fm->format_currency($gtotal) . " " . "VNĐ";
								?></td>
						</tr>
					</table>
				<?php
				} else {
					echo 'Giỏ hàng của bạn đang trống!! Hãy nhanh tay đặt vé nào!!!';
				}
				?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php" class="a_order"> Trở Về</a>
				</div>
				<div class="shopright">
					<center><a href="payment.php" class="a_order">Mua Ngay</a></center><br>

				</div>

			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include 'inc/footer.php';

?>