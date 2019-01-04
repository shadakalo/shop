<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Category.php'; ?>
<?php
    $addcat = new Category();
    if (isset($_GET['delId'])) {
            $catId = $_GET['delId'];
            $delcat = $addcat->catDelete($catId);
    }
?>
<?php
    $catlist = $addcat->getAllcat();
?>

<?php include'inc/nav.php' ;  ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Category List</h4>
                               
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 20px;" >
                                 <table id="dtable" class="table table-striped" cellspacing="0" width="100%" ">
                                        <thead >
                                            <tr >
                                                <th>ID</th>
                                                <th>Cetegory Name</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cetegory Name</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            if ($catlist) {
                                                $i = 0;
                                                while ($result = $catlist->fetch_assoc()) { 
                                                    $i++
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['catName'] ?></td>
                                                <td>
                                                    <a href="editcat.php?catId=<?php  echo $result['catId'];?>" class="linkedit">Edit</a> ||
                                                    <a onclick="return confirm('Are you sure ??'); " href="catlist.php?delId=<?php  echo $result['catId'];?>" class="linkdelete"> Delete</a>
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
                                            if (!$catlist) {
                                                echo "<i class='fa fa-circle' style='color:#7858C0;'></i><span class='error'> No Category To show</span> ";
                                                }
                                        ?>
                                        <?php
                                        if (isset($delcat)) {
                                        echo "<i class='fa fa-circle' style='color:#7858C0;'></i> ".$delcat;
                                        }

                                    ?>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Category list
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>

 
<?php include 'inc/footer.php'; ?>