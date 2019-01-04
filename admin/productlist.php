<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php';  ?>
<?php
    $pd = new Product();
    $fm = new Format();
    if (isset($_GET['delId'])) {
            $productId = $_GET['delId'];
            $delproduct = $pd->productDelete($productId);
    }
    $productlist = $pd->getAllProduct();
?>
     


<?php include'inc/nav.php' ;  ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Product List</h4>
                               
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 20px;" >
                                 <table id="dtable" class="table table-striped" cellspacing="0" width="100%" ">
                                        <thead >
                                            <tr >
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Category </th>
                                                <th>Brand </th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	
                                       <?php

                                       		if ($productlist) {
                                       			$i=0;
                                       			while ($result = $productlist->fetch_assoc()) {
                                       				$i++;
                                       	?>
                                       			<tr>
                                       			<td><?php echo $i; ?></td>
                                        		<td><?php echo $result['productName']; ?></td>
                                        		<td><?php echo $result['catName']; ?></td>
                                        		<td><?php echo $result['brandName']; ?></td>
                                        		<td><?php echo $fm->textShorten($result['body'],50); ?></td>
                                        		<td><?php echo $result['price']; ?></td>
                                        		<td><img src="<?php echo $result['image']; ?>" style="width: 40px; height: 30px;"></td>
                                        		<td><?php echo $result['type']; ?></td>
                                        		<td>
                                        			<a href="editproduct.php?productId=<?php  echo $result['productId'];?>" class="linkedit">Edit</a> ||
                                                    <a onclick="return confirm('Are you sure ??'); " href="productlist.php?delId=<?php  echo $result['productId'];?>" class="linkdelete"> Delete</a>
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
                                       	 <?php
                                            if (!$productlist) {
                                                echo "<i class='fa fa-circle' style='color:#7858C0;'></i><span class='error'> No Product To show</span> ";
                                                }
                                        ?>
                                        <?php
                                        if (isset($delproduct)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$delproduct;
                                        }

                                    ?>
                    
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Product list
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>

 
<?php include 'inc/footer.php'; ?>