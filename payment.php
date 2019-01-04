<?php
	include 'inc/header.php';
?>
<?php
	if (!isset($_SESSION['cuslogin'])) {
		echo "<script>window.location = 'login.php';</script>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="support">
    		<center>
    		<div class="payment">
  				<h2>Choose Payment Option</h2>
  				<a style="margin-left: -5px;" href="paymentoffline.php">Offline Payment</a> 
  				<a  style="margin-left: -5px;" href="paymentonline.php">Online Payment</a>
  				<div style="margin-bottom: 50px"></div>
  			</div>
  				<a class="payment2" href="cart.php">Previous</a>
    		</center>
  			
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	
				
	</div>    	
</div>
<?php include"inc/footer.php" ?>