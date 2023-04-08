<?php
include 'inc/header.php';
include 'inc/slider.php';
?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>DC Entertaiment</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_dceu = $product->getAllDCEU();
			if ($product_dceu) {
				while ($result = $product_dceu->fetch_assoc()) {

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
				<h3>20th CenturyFox</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<div class="section group">
				<?php
				$product_fox = $product->getAllFox();
				if ($product_fox) {
					while ($result = $product_fox->fetch_assoc()) {

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
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Warner Bros</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_bros = $product->getAllWannerBros();
			if ($product_bros) {
				while ($result = $product_bros->fetch_assoc()) {

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
	</div>

</div>

<?php
include 'inc/footer.php';

?>