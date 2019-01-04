<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Brand.php'; ?>
<?php
    if (!isset($_GET['brandId']) || $_GET['brandId'] == null) {
       echo "<script>window.location = 'brandlist.php';</script>";
    }else{
        $brandId = $_GET['brandId'];
    }
    $brand= new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $brandName = $_POST['brandName'];
       
       $updatebrand = $brand->brandUpdate($brandId,$brandName);
    }
?>

<?php include'inc/nav.php' ;  ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                 
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Update Brand</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart">
                                    
                                    <div class="col-md-offset-3 col-md-5">
                                        <h5> &nbsp&nbsp&nbsp Brand Name :</h5>
                                        <?php

                                            $getbrand = $brand->getBrandById($brandId);
                                            if ($getbrand) {
                                                 while ($result = $getbrand->fetch_assoc()) {
                                        ?>
                                        <form action="#" method="post">
                                             <div class="col-md-12 col-sm-12 ">
                                                    <input class="form-control" type="text" placeholder="Brand name" name="brandName" value="<?php echo $result['brandName']; ?>"> 
                                            </div>
                                            <div class="pull-left" style="margin-top: 5px; margin-left: 15px;">
                                                 <input type="submit" class="form-control btn btn-info btn-fill mybutton pull-left" name="submit" value="Update">
                                            </div>               
                                        </form>
                                        <?php
                                                 }
                                             } 
                                        ?>
                                    </div>

                                </div>

                                <div class="footer">
                                    <div class="legend">
                                         
                                   <?php
                                        if (isset($updatebrand)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$updatebrand;
                                        }

                                    ?>
                                        
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Update Brand
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php'; ?>