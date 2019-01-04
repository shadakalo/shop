<?php
	include 'inc/header.php';
?>
<?php
	if (!isset($_SESSION['cuslogin'])) {
		echo "<script>window.location = 'login.php';</script>";
	}
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Orderlist</h2>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="10%">Quantity</th>
								<th width="20%">Total Price(10% VAT)</th>
								<th width="20%">Order Date</th>
							</tr>
							
							<?php
								$ordereditem = $order->getOrderItem($_SESSION['customerId']);
								if ($ordereditem) {
									$i = 0;
									$sum = 0;
									while ($result = $ordereditem->fetch_assoc()) {
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt="" /></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								<td>
									<?php echo $result['quantity']; ?>
								</td>
								<td>Tk. <?php
											 $total = $result['price'] * $result['quantity'];
											 echo $total;
									    ?>
							    </td>
							    <td><?php echo $result['orderTime']; ?></td>
								
							</tr>
						<?php			
									$sum = $sum + $total;
									}
								}
						?>
						</table>
						<?php  
							if ($ordereditem) {
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total  </th>
								<th>:&nbsp&nbsp</th>
								<td>BDT <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT (10%)  </th>
								<th>:&nbsp&nbsp</th>
								<td> BDT <?php echo $sum*(0.1) ?></td>
							</tr>
							<tr>
								<th>Grand Total </th>
								<th>:&nbsp&nbsp</th>
								<td>BDT
								 <?php  
								 	echo ($sum*(0.1))+$sum;
									$_SESSION['sum'] = ($sum*(0.1))+$sum;
								 ?> 
								</td>
							</tr>
					   </table>
					  	<?php } ?>
					</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
<?php include"inc/footer.php" ?>