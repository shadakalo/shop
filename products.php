<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
 <div class="main">
    <div class="content">
 <?php
	
	$brandlist = $brand->getAllbrand();
	if ($brandlist) {
		while ($brandresult = $brandlist->fetch_assoc()) {
?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from <?php echo $brandresult['brandName']; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$productlist = $pd->getProductByBrandId($brandresult['brandId']);
	      		if ($productlist) {
	      			$i=0;
	      			while ($result = $productlist->fetch_assoc()) {
	      				$i++;
	      	?>
				<div class="grid_1_of_4 images_1_of_4"
				  <?php if (($i%4) == 1) {
					echo 'style="margin-left: 0px;"';
					} ?>
				
					 <a href="details.php?pid=<?php echo $result['productId']; ?>" ><img style="height: 250px; width: 100%;" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten(strip_tags(htmlspecialchars_decode($result['body'])),50);?></p>
					 <p><span class="price"><?php echo "BDT ". $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				}else{
					echo "<span style='padding:10px;' > No products to show </span>";
				}
				?>
			</div>
<?php
		}
	}
?>
			
    </div>
 </div>
 
<?php include"inc/footer.php" ?>