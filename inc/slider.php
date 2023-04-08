<div class="header_bottom">
	<div class="header_bottom_left">
		<div class="section group">
			<?php
			$getFirstPix = $product->getFirstPixar();
			if ($getFirstPix) {
				while ($resultdell = $getFirstPix->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"> <img src="admin/uploads/<?php echo $resultdell['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>Pixar</h2>
							<p><?php echo $resultdell['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultdell['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
			<?php
			$getFirstUni = $product->getFirstUniversal();
			if ($getFirstUni) {
				while ($resultss = $getFirstUni->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"><img src="admin/uploads/<?php echo $resultss['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>Universal</h2>
							<p><?php echo $resultss['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultss['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="section group">
			<?php
			$getFirstWaltDisney = $product->getWaltDisney();
			if ($getFirstWaltDisney) {
				while ($resultap = $getFirstWaltDisney->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"> <img src="admin/uploads/<?php echo $resultap['image'] ?>" alt="" /> </a>
						</div>
						<div class="text list_2_of_1">
							<h2>Disney</h2>
							<p><?php echo $resultap['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultap['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
			<?php
			$getFirstCo = $product->getFirstColombiaPicture();
			if ($getFirstCo) {
				while ($resulthw = $getFirstCo->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"><img src="admin/uploads/<?php echo $resulthw['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>Picture</h2>
							<p><?php echo $resulthw['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resulthw['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="header_bottom_right_images">
		<div class="section group">
			<?php
			$getFirstWaltDisney = $product->getFirstDCEU();
			if ($getFirstWaltDisney) {
				while ($resultap = $getFirstWaltDisney->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"> <img src="admin/uploads/<?php echo $resultap['image'] ?>" alt="" /> </a>
						</div>
						<div class="text list_2_of_1">
							<h2>DCEU</h2>
							<p><?php echo $resultap['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultap['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
			<?php
			$getFirstCo = $product->getFirstPhuongNam();
			if ($getFirstCo) {
				while ($resulthw = $getFirstCo->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"><img src="admin/uploads/<?php echo $resulthw['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>Phương Nam</h2>
							<p><?php echo $resulthw['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resulthw['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="section group">
			<?php
			$getFirstWaltDisney = $product->getFirstWB();
			if ($getFirstWaltDisney) {
				while ($resultap = $getFirstWaltDisney->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"> <img src="admin/uploads/<?php echo $resultap['image'] ?>" alt="" /> </a>
						</div>
						<div class="text list_2_of_1">
							<h2>Wanner</h2>
							<p><?php echo $resultap['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultap['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
			<?php
			$getFirstCo = $product->getFirstFox();
			if ($getFirstCo) {
				while ($resulthw = $getFirstCo->fetch_assoc()) {
			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="preview.php"><img src="admin/uploads/<?php echo $resulthw['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>20th Fox</h2>
							<p><?php echo $resulthw['productName'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resulthw['productId']  ?>">Đặt Vé</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<!-- FlexSlider -->
	</div>
	<div class="clear"></div>
</div>
<style>
	.header_bottom_right_images {
		margin-top: -10px;
	}
</style>