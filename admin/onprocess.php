<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Product.php'; ?>
<?php  include '../classes/Customer.php'; ?>
<?php  include '../classes/Order.php'; ?>
<?php include_once '../helpers/Format.php';  ?>
<?php
    $pd     = new Product();
    $fm     = new Format();
    $csm    = new Customer();
    $order  = new Order();
    
    $orderlist = $order->getProcessesItem();
?>
     


<?php include'inc/nav.php' ;  ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Order on process List</h4>
                               
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 20px;" >
                                 <table id="dtable" class="table table-striped" cellspacing="0" width="100%" ">
                                        <thead >
                                            <tr >
                                                <th>ID</th>
                                                <th>Customer ID</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>quantity</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Customer ID</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>quantity</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	
                                       <?php

                                       		if ($orderlist) {
                                       			$i=0;
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
                                        		<td><img src="<?php echo $result['image']; ?>" style="width: 40px; height: 30px;"></td>
                                        		<td><?php echo $result['status']; ?></td>
                                        		<td>
                                        			<a href="porder.php?orderId=<?php  echo $result['customerId'];?>" class="linkedit">View</a> 
                                        		</td>
                                        		</tr>
                                       	<?php			
                                       			}
                                       		}
                                       ?>
                                        	
                                        	
                                        </tbody>
                                    </table>
                                     <div class="footer">
                                    <div class="legend">
                                     
                    
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Order list
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>

 
<?php include 'inc/footer.php'; ?>