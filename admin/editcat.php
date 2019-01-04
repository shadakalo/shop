<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Category.php'; ?>
<?php
    if (!isset($_GET['catId']) || $_GET['catId'] == null) {
       echo "<script>window.location = 'catlist.php';</script>";
    }else{
        $catId = $_GET['catId'];
    }
    $addcat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $catName = $_POST['catName'];
       
       $updatecat = $addcat->catUpdate($catId,$catName);
    }
?>

<?php include'inc/nav.php' ;  ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                 
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Update Category</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart">
                                    
                                    <div class="col-md-offset-3 col-md-5">
                                        <h5> &nbsp&nbsp&nbsp Category Name :</h5>
                                        <?php

                                            $getcat = $addcat->getCatById($catId);
                                            if ($getcat) {
                                                 while ($result = $getcat->fetch_assoc()) {
                                        ?>
                                        <form action="#" method="post">
                                             <div class="col-md-12 col-sm-12 ">
                                                    <input class="form-control" type="text" placeholder="Category name" name="catName" value="<?php echo $result['catName']; ?>"> 
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
                                        if (isset($updatecat)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$updatecat;
                                        }

                                    ?>
                                        
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Update Category
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php'; ?>