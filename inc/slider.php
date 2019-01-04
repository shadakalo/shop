	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<?php
						$brandone = $pd->getProductByBrandOne();
						if ($brandone) {
						while ($result = $brandone->fetch_assoc()) {
					?>
						 <a href="details.php?pid=<?php echo $result['productId'] ?>"> <img style="width: 100%;" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>KAWASAKI</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?pid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
					<?php } } ?>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<?php
						$brandone = $pd->getProductByBrandTwo();
						if ($brandone) {
						while ($result = $brandone->fetch_assoc()) {
					?>
						 <a href="details.php?pid=<?php echo $result['productId'] ?>"> <img style="width: 100%;" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>BMW</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?pid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
					<?php } } ?>
				   </div>
			   </div>
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<?php
						$brandone = $pd->getProductByBrandThree();
						if ($brandone) {
						while ($result = $brandone->fetch_assoc()) {
					?>
						 <a href="details.php?pid=<?php echo $result['productId'] ?>"> <img style="width: 100%;" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>HONDA</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?pid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
					<?php } } ?>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<?php
						$brandone = $pd->getProductByBrandFour();
						if ($brandone) {
						while ($result = $brandone->fetch_assoc()) {
					?>
						 <a href="details.php?pid=<?php echo $result['productId'] ?>"> <img style="width: 100%;" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>YAMAHA	</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?pid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
					<?php } } ?>
				   </div>
			   </div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="img/1.jpg" alt="" style="max-height: 310px" /></li>
						<li><img src="img/2.jpg" alt="" style="max-height: 300px"/></li>
						<li><img src="img/3.jpg" alt="" style="max-height: 300px"/></li>
						<li><img src="img/4.jpg" alt="" style="max-height: 300px"/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	