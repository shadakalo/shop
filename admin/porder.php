<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ;  ?>
<?php  include '../classes/Product.php'; ?>
<?php  include '../classes/Customer.php'; ?>
<?php  include '../classes/Order.php'; ?>
<?php include_once '../helpers/Format.php';  ?>
<?php
	if (!isset($_GET['orderId']) || $_GET['orderId'] == null) {
		echo "<script>window.location = '404.php';</script>";
	}else{
		$customerId = $_GET['orderId'];
	}
?>
<?php
    $pd     = new Product();
    $fm     = new Format();
    $csm    = new Customer();
    $order  = new Order();
    $orderlist = $order->getCustomerOrderedProcessedItem($customerId);
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$moveorder = $order->moveToDelivered($customerId);
		echo "<script>alert('Order is delivered');</script>";
		echo "<script>window.location = 'onprocess.php';</script>";

	}

?>
<?php include'inc/nav.php' ;  ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                	<div class="col-md-4">
                		<h4>
                			Customer Details
                		</h4>
                		<?php
                			$customerDetails = $csm->customerProfile($customerId);
                			if ($customerDetails) {
                				while ($result = $customerDetails->fetch_assoc()) {
                					echo "<h3>".$result['name']."</h3><br>";
                					echo $result['address']."<br>";
                					echo $result['city']." - ";
                					echo $result['zip'].",";
                					echo $result['country']."<br>";
                					echo "Phone - 0".$result['phone']."<br>";
                					echo "Email  - ".$result['email'];
                				}
                			}
                		?>
                	</div>

                	<div class="col-md-8">
                		<h4>Orderlist</h4>
                		
                		<table class="mytable">
                			<thead >
                                            <tr >
                                                <th>ID</th>
                                                <th>Customer ID</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>quantity</th>
                                                <th>Total</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        	
                                       <?php

                                       		if ($orderlist) {
                                       			$i=0;
                                       			$sum = 0;
                                       			while ($result = $orderlist->fetch_assoc()) {
                                       				$i++;
                                       	?>
                                       			<tr>
                                       			
                                        		<td><?php echo $result['orderId']; ?></td>
                                        		<td><?php echo $result['customerId']; ?></td>
                                        		<td><?php echo $result['productId']; ?></td>
                                        		<td><?php echo $result['productName']; ?></td>
                                        		<td><?php echo $result['price']; ?></td>
                                                <td><?php echo $result['quantity']; ?></td>
                                                <td><?php echo $result['price']*$result['quantity']  ?></td>
                                        		<td><img src="<?php echo $result['image']; ?>" style="width: 40px; height: 30px;"></td>
                                        		<td><?php echo $result['status']; ?></td>
                                        		
                                        		</tr>
                                       	<?php
                                       			$sum = $sum + ($result['price']*$result['quantity']);

                                       			}
                                       		
                                       ?>
                                        	
                                        	
                                        </tbody>

                		</table>
                
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-offset-4  col-md-4 ">
                		<h4>summary</h4>
                		<div style="margin-bottom: 15PX;">
                			<table>
                				<tr>
                					<td>Total</td>
                					<td>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp</td>
                					<td><?php echo $sum ?> BDT</td>
                				</tr>
                				<tr>
                					<td>VAT(10%)</td>
                					<td>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp</td>
                					<td><?php echo $sum*(0.1); ?> BDT</td>
                				</tr>
                				<tr>
                					<td>Grand Total</td>
                					<td>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp</td>
                					<td style="color: green"><?php echo $sum+($sum*(0.1)); ?> BDT</td>
                				</tr>
                			</table>
                		</div>
                		<form action="" method="post">
                			<input type="submit" name="submit" value="Delivered" class="btn btn-info btn-fill">
                		</form>
                	</div>
                </div>
                <?php } ?>
            </div>
        </div>


<?php include 'inc/footer.php'; ?>