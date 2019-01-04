<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      		<?php
	      			$getProduct = $pd->getFeaturedProduct();
	      			while ($result = $getProduct->fetch_assoc()) {
	      		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $result['productId']; ?>"><img style="height: 250px;" src="<?php echo 'admin/'.$result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $fm->textShorten(strip_tags(htmlspecialchars_decode($result['body'])),50);?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
					$getallproduct = $pd->getEachProduct();
					while ($result = $getallproduct->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $result['productId']; ?>"><img style="height: 250px;" src="<?php echo 'admin/'.$result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } ?>
			</div>
    </div>
 </div>

<?php include"inc/footer.php" ?>