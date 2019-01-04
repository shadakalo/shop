<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Brand.php'; ?>
<?php
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $brandName = $_POST['brandName'];
       
       $insertbrand = $brand->brandInsert($brandName);
    }
?>
<?php include'inc/nav.php' ;  ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                 
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Add Brand</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart">
                                    
                                    <div class="col-md-offset-3 col-md-5">
                                        <h5> &nbsp&nbsp&nbsp Brand Name :</h5>

                                        <form action="addbrand.php" method="post">
                                             <div class="col-md-12 col-sm-12 ">
                                                    <input class="form-control" type="text" placeholder="Brand name" name="brandName" > 
                                            </div>
                                            <div class="pull-left" style="margin-top: 5px; margin-left: 15px;">
                                                 <input type="submit" class="form-control btn btn-info btn-fill mybutton pull-left" name="submit" value="add Brand">
                                            </div>               
                                        </form>

                                    </div>

                                </div>

                                <div class="footer">
                                    <div class="legend">
                                        
                                    <?php
                                        if (isset($insertbrand)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$insertbrand;
                                        }

                                    ?>
                                        
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Add Brand
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php'; ?>