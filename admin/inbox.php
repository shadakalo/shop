<?php include'inc/header.php' ;  ?>
<?php include'inc/sidebar.php' ; ?>
<?php  include '../classes/Product.php'; ?>
<?php  include '../classes/Customer.php'; ?>
<?php  include '../classes/Contact.php'; ?>
<?php include_once '../helpers/Format.php';  ?>
<?php
    $pd     = new Product();
    $fm     = new Format();
    $csm    = new Customer();
    $con    = new Contact();
    
    $message = $con->message();
?>
<?php
    if (isset($_GET['id']) && $_GET['id'] != null) {
        $con->msgDelete($_GET['id']);
        echo "<script>alert('Message Deleted Successfully !!!');</script>";
        echo "<script>window.location = 'inbox.php';</script>";
    }
?>    


<?php include'inc/nav.php' ;  ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Inbox</h4>
                               
                            </div>
                            <div class="content table-responsive table-full-width" style="margin: 20px;" >
                            <?php
                                        if ($message) {
                            ?>
                                 <table class="mytable2">
                                        <thead >
                                            <tr >
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                              
                                                
                                            </tr>
                                        </thead>
                                       
                                       
                                        <tbody>
                                            <?php $i=0;
                                                while ($result = $message->fetch_assoc()) {
                                                    $i++;
                                            ?>
                                            <tr>
                                                <td width="5%"><?php echo $i; ?></td>
                                                <td width="15%"><?php echo $result['name']; ?></td>
                                                <td width="15%"><?php echo $result['email']; ?></td>
                                                <td width="10%"><?php echo $result['mobile']; ?></td>
                                                <td width="50%"><?php echo $result['body']; ?></td>
                                                <td width="5%"><a class="linkdelete" href="?id=<?php echo $result['id']?>" onclick="return confirm('are your sure ??');" >Delete</a> </td>
                                            </tr>
                                            <?php   
                                                }
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                    <?php
                                          }else{
                                            echo "<h3>No message to show</h3>";
                                          }
                                         ?>
                                     <div class="footer">
                                    <div class="legend">
                                     
                    
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Inbox
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>

 
<?php include 'inc/footer.php'; ?>