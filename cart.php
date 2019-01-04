<?php include 'inc/header.php'; ?>
<?php
	if (isset($_GET['delId'])) {
		$delId   = $_GET['delId'];
		$delcart = $cart->cartDelete($delId);
	}
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cartId   = $_POST['cartId'];
		$quantity = $_POST['quantity'];
		if ($quantity <= 0) {
			$delcart = $cart->cartDelete($cartId);
		}else{
			$updateCart = $cart->cartUpdate($cartId,$quantity);
		}
	}
?>
<?php
	if (!isset($_GET['id'])) {
		echo "<meta http-equiv='refresh' content='0;URL=?id=shop'/>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php
			    		if (isset($updateCart)) {
			    			echo $updateCart;
			    		}
			    		if (isset($delcart)) {
			    			echo $delcart;
			    		}

			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							
							<?php
								$cartitem = $cart->getCartItem();
								if ($cartitem) {
									$i = 0;
									$sum = 0;
									while ($result = $cartitem->fetch_assoc()) {
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt="" /></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								<td>
									<form action="" method="post">
										<input type="text" name="cartId" hidden="" value="<?php echo $result['cartId']; ?>">
										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. <?php
											 $total = $result['price'] * $result['quantity'];
											 echo $total;
									    ?>
							    </td>
								<td><a onclick="return confirm('Are you sure ??')" href="?delId=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>
						<?php			
									$sum = $sum + $total;
									}
								}else{
									echo "<script>window.location = 'index.php';</script>";
								}
						?>
						</table>
						<?php  
							if ($cartitem) {
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% (<?php echo $sum*(0.1)  ?> TK) </td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK.
								 <?php  
								 	echo ($sum*(0.1))+$sum;
									$_SESSION['sum'] = ($sum*(0.1))+$sum;
								 ?> 
								</td>
							</tr>
					   </table>
					  	<?php } ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 

<?php include"inc/footer.php" ?>