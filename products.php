<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Danh Sách Phim</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_feathered = $product->getallproduct();
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
	</div>
</div>
<style>
	.grid_1_of_4 {
		display: block;
		float: left;
		margin: 5px;
		box-shadow: 0px 0px 3px rgb(150, 150, 150);
	}
</style>
<?php
include 'inc/footer.php';

?>