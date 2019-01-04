<?php
	include 'inc/header.php';
?>
<?php
	if (!isset($_SESSION['cuslogin'])) {
		echo "<script>window.location = 'login.php';</script>";
	}
?>
 <div class="main">
    <div class="content" >
      <diV class="section group">
        <center>
          <div style="width: 50%;border: 1px solid #EDEDED;padding: 20px;">
            <h2 style="border-bottom:1px solid #EDEDED;margin-bottom: 10px; ">Order Successfull</h2>
            <p style="text-align: justify;"><span style="color: red;">Congratulations </span> , your order has been successfully placed . We will contact you for delivery details very shortly . In order to check your order please <a href="order.php">visit here.</a></p>
        </div>
        </center>
      
      </diV>
    </div>
 </div>
<?php include"inc/footer.php" ?>