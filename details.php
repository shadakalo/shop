<?php
	if (!isset($_GET['pid']) && $_GET['pid'] == null) {
		echo "<script>window.location = '404.php';</script>";
	}else{
		$productId = $_GET['pid'];
	}
?>
<?php include"inc/header.php" ?>
<?php
	if ($_SERVER['REQUEST_METHOD'] =='POST' ) {
		
		$quantity = $_POST['quantity'];
		$addcart  = $cart->cartInsert($quantity,$productId); 
	}

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    			$productDetails = $pd->getSingleProduct($productId);
    			if ($productDetails) {
    				while ($result = $productDetails->fetch_assoc()) {
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="<?php echo 'admin/'.$result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>				
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<?php  if (isset($addcart)) {
					echo $addcart;
				} ?>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p style="text-align: justify;margin: 5px;"><?php echo strip_tags(htmlspecialchars_decode($result['body']));?></p>
	    </div>
				
	</div>

		<?php } } ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php
							$Category = $cat->getAllcat();
							if ($Category) {
								while ($result = $Category->fetch_assoc()) {
						?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId'] ?>"><?php echo $result['catName']; ?></a></li>
				      <?php } } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>

<?php include"inc/footer.php" ?>