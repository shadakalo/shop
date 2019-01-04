<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Brand.php'; ?>
<?php
    $brand = new Brand();
    if (isset($_GET['delId'])) {
            $brandId = $_GET['delId'];
            $delbrand = $brand->brandDelete($brandId);
    }
?>
<?php
    $brandlist = $brand->getAllbrand();
?>
<?php include'inc/nav.php' ;  ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Brand List</h4>
                               
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 20px;" >
                                 <table id="dtable" class="table table-striped" cellspacing="0" width="100%" ">
                                        <thead >
                                            <tr >
                                                <th>ID</th>
                                                <th>Brand Name</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Brand Name</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            if ($brandlist) {
                                                $i = 0;
                                                while ($result = $brandlist->fetch_assoc()) { 
                                                    $i++
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['brandName'] ?></td>
                                                <td>
                                                    <a href="editbrand.php?brandId=<?php  echo $result['brandId'];?>" class="linkedit">Edit</a> ||
                                                    <a onclick="return confirm('Are you sure ??'); " href="brandlist.php?delId=<?php  echo $result['brandId'];?>" class="linkdelete"> Delete</a>
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
                                            if (!$brandlist) {
                                                echo "<i class='fa fa-circle' style='color:#7858C0;'></i><span class='error'> No Brand To show</span> ";
                                                }
                                        ?>
                                        <?php
                                        if (isset($delbrand)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$delbrand;
                                        }

                                    ?>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Brand list
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>

 
<?php include 'inc/footer.php'; ?>