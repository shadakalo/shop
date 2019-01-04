<?php  include'inc/header.php' ;  ?>
<?php  include'inc/sidebar.php' ;  ?>
<?php  include'inc/nav.php' ;  ?>
<?php  include '../classes/Product.php'; ?>
<?php  include '../classes/Category.php'; ?>
<?php  include '../classes/Brand.php'; ?>
<?php
    $pd = new Product();

    if (!isset($_GET['productId']) || $_GET['productId'] == null) {
       echo "<script>window.location = 'productlist.php';</script>";
    }else{
        $productId = $_GET['productId'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     

        $updateProduct = $pd->productUpdate($productId,$_POST,$_FILES);

    }
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Edit Product</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                     <?php

                                            $getproduct = $pd->getProductById($productId);
                                            if ($getproduct) {
                                                 while ($result1 = $getproduct->fetch_assoc()) {
                                    ?>


                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <label>Product Name : </label>
                                                 <input type="text" class="form-control" name="productName" value="<?php echo $result1['productName']; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Category Name : </label>
                                                <select class="form-control" name="catId">
                                                    <option value="-1">Select Category</option>
                                                <?php

                                                    $category  = new Category();
                                                    $catlist = $category->getAllcat();
                                                    while ($result = $catlist->fetch_assoc()) {
                                                ?>     
                                                         <option
                                                            <?php
                                                                if ($result1['catId'] == $result['catId']) {
                                                                    echo "selected='selected'";
                                                                }
                                                            ?>
                                                          value="<?php  echo $result['catId']; ?>"><?php  echo $result['catName']; ?>
                                                              
                                                          </option>
                                                <?php
                                                    }
                                                 
                                                ?>
                                                 </select>
                                            </div>
                                             <div class="col-md-4">
                                                <label>Brand Name : </label>
                                                <select class="form-control" name="brandId">
                                                      <option value="-1">Select Brand</option>
                                                <?php

                                                    $brand  = new Brand();
                                                    $brandlist = $brand->getAllbrand();
                                                    while ($result = $brandlist->fetch_assoc()) {
                                                ?>     
                                                         <option 
                                                         <?php
                                                                if ($result1['brandId'] == $result['brandId']) {
                                                                    echo "selected='selected'";
                                                                }
                                                        ?>
                                                         value="<?php  echo $result['brandId']; ?>"><?php  echo $result['brandName']; ?></option>
                                                <?php
                                                    }
                                                 
                                                ?>
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Product Description : </label>
                                                <textarea class="form-control tinymce" name="body"  style='height: 100%;'><?php echo $result1['body']; ?></textarea>
                                            </div>
                                            <div class="col-md-offset-1 col-md-3">
                                                <br>
                                                <img src="<?php echo $result1['image']; ?>" style='width: 70%;max-height: 512px;margin-top: 5px;'>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4 ">
                                                <label>Price : </label>
                                                 <input type="text" class="form-control" name="price" value="<?php echo $result1['price']; ?>">
                                            </div>
                                             <div class="col-md-4">
                                                <label>Product Type : </label>
                                                <select class="form-control" name="type">
                                                    <option value="-1">Select Type</option>
                                                    <option
                                                     <?php
                                                        if ($result1['type'] == 1) {
                                                           echo "selected='selected'";
                                                        }

                                                    ?> value="1">Featured</option>
                                                    <option 
                                                    <?php
                                                        if ($result1['type'] == 0) {
                                                           echo "selected='selected'";
                                                        }

                                                    ?>
                                                    value="0">General</option>
                                                 </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Product Image : </label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="submit" name="submit" value="Update" class="form-control btn btn-info btn-fill">
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                                 }
                                             } 
                                        ?>


                                <div class="footer">
                                    <div class="legend">
                                    <?php
                                        if (isset($updateProduct)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$updateProduct;
                                        }
                                    ?>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                            <i class="fa fa-check"></i> Edit Product
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php'; ?>