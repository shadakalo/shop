<?php  include'inc/header.php' ;  ?>
<?php  include'inc/sidebar.php' ;  ?>
<?php  include'inc/nav.php' ;  ?>
<?php  include '../classes/Product.php'; ?>
<?php  include '../classes/Category.php'; ?>
<?php  include '../classes/Brand.php'; ?>
<?php
    $pd = new Product();
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $addproduct = $pd->productInsert($_POST,$_FILES);
    
    }
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Add Product</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <label>Product Name : </label>
                                                 <input type="text" class="form-control" name="productName" placeholder="Product Name">
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
                                                         <option value="<?php  echo $result['catId']; ?>"><?php  echo $result['catName']; ?></option>
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
                                                         <option value="<?php  echo $result['brandId']; ?>"><?php  echo $result['brandName']; ?></option>
                                                <?php
                                                    }
                                                 
                                                ?>
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-10">
                                                <label>Product Description : </label>
                                                <textarea class="form-control tinymce" name="body"></textarea>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4 ">
                                                <label>Price : </label>
                                                 <input type="text" class="form-control" name="price" placeholder="Price">
                                            </div>
                                             <div class="col-md-4">
                                                <label>Product Type : </label>
                                                <select class="form-control" name="type">
                                                    <option value="-1">Select Type</option>
                                                    <option value="1">Featured</option>
                                                    <option value="0">General</option>
                                                 </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Product Image : </label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="submit" name="submit" value="Add Product" class="form-control btn btn-info btn-fill">
                                            </div>
                                        </div>
                                    </form>



                                <div class="footer">
                                    <div class="legend">
                                    <?php
                                        if (isset($addproduct)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$addproduct;
                                        }

                                    ?>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                              <i class="fa fa-check"></i> Add Product
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php'; ?>