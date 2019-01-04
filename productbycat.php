 
<?php include"inc/header.php" ?>
<?php
	if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
		echo "<script>window.location = '404.php';</script>";
	}else{
		$catId = $_GET['catId'];
	}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
    	<?php
    		$productbycat = $pd->getProductByCategory($catId);
    		if ($productbycat) {
    			$i=0;
    			while ($result = $productbycat->fetch_assoc()) {
    				$i++;
    	?>
	      
				<div class="grid_1_of_4 images_1_of_4"

					<?php if (($i%4) == 1) {
					echo 'style="margin-left: 0px;"';
					} ?>
				>
					 <a href="details.php?pid=<?php echo $result['productId']; ?>" ><img style="height: 250px; width: 100%;" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten(strip_tags(htmlspecialchars_decode($result['body'])),50);?></p>
					 <p><span class="price"><?php echo "BDT ". $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
			
		<?php
			   }
    		}else{
    			echo "<script>window.location = '404.php';</script>";
    		}
		?>
	
		</div>
    </div>
 </div>
  
<?php include"inc/footer.php" ?>