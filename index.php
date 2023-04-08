<?php
include 'inc/header.php';
include 'inc/slider.php';


?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3 color="red">Phim Nổi Bật</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_feathered = $product->getproduct_feathered();
			if ($product_feathered) {
				while ($result = $product_feathered->fetch_assoc()) {

			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" width="150px" alt="" /></a>
						<h2><?php echo $result['productName'] ?></h2>
						<!-- <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
						<p><span class="price"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Đặt Vé</a></span></div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Danh sách phim</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_new = $product->getproduct_new();
			if ($product_new) {
				while ($result_new = $product_new->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid="><img src="admin/uploads/<?php echo $result_new['image'] ?>" width="150px" alt="" /></a>
						<h2><?php echo $result_new['productName'] ?></h2>
						<!-- <p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p> -->
						<p><span class="price"><?php echo $fm->format_currency($result_new['price']) . " " . "VNĐ" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Đặt Vé</a></span></div>
					</div>
			<?php
				}
			}
			?>
		</div>

		<div class="section group">
			<div class="pagination">
				<a href="#">«</a>
				<?php
				$product_all = $product->getallproduct();
				$product_count = mysqli_num_rows($product_all);
				$product_button = ceil($product_count / 4);
				$i = 0;

				for ($i = 1; $i < $product_button; $i++) {
					echo '<a  href="index.php?trang=' . $i . '">' . $i . '</a>';
				}
				?>
				<?php echo '<a  href="index.php?trang=' . $i . '">' . $i . '</a>'; ?>
				<a href="#">»</a>

			</div>
		</div>

	</div>
	<style>
		.pagination a {
			align-items: center;
			color: black;
			float: left;
			padding: 12px 18px;
			text-decoration: none;

		}

		.pagination a.active {
			background-color: dodgerblue;
			color: black;
			border-radius: 50%;
		}

		.pagination a:hover:not(.active) {
			background-color: #ddd;
			border-radius: 50%;
		}

		.center {
			align-items: center;

		}

		.list_2_of_1 .button a {
			padding: 7px 15px;
			font-size: 0.8em;
			font-family: Arial, "Helvetica Neue", "Helvetica", Tahoma, Verdana, sans-serif;
			border: 1px solid rgba(0, 0, 0, 0.1);
			background: #33539E url(../images/large-button-overlay.png);
			color: #fff;
			text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border-radius: 5px;
		}

		.images_1_of_4 .button a {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			font-size: 14px;
			line-height: 15px;
			text-transform: none;
			color: wheat;
			text-decoration: none !important;
			background: url(../images/button-bg.png) repeat-x 0 0 #8A5082;
			display: inline-block;
			border-left: 1px solid #D4D4D4 !important;
			border-right: 1px solid #ADADAD !important;
			border-top: 1px solid #E0E0E0 !important;
			border-bottom: 1px solid #9C9C9C !important;
			cursor: pointer !important;
			margin: 0 2px;
			border-radius: 2px;
			-moz-border-radius: 2px;
			-webkit-border-radius: 2px;
			-webkit-transition: all 0.5s ease;
			-moz-transition: all 0.5s ease;
			-o-transition: all 0.5s ease;
			transition: all 0.5s ease;
			border-radius: 8px;
		}

		.heading h3 {
			font-family: 'Monda', sans-serif;
			font-size: 22px;
			color: red;
			text-transform: uppercase;
		}
	</style>
	<?php
	include 'inc/footer.php';
	?>