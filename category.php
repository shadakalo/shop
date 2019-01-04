<?php
	include 'inc/header.php';

?>
 <div class="main">
    <div class="content"  >
    	<div class="section group">
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



	 					<div class="header_bottom">
								<div class="">
									   	 <div class="header_bottom_right_images" style="width: 69%">
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
							
									
		</div>
    </div>
 </div>

<?php include"inc/footer.php" ?>