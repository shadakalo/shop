<?php
  session_start();
	//set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
  //30days (60sec * 60min * 24hours * 30days)
?>
<?php
	include_once 'lib/Database.php';
	include_once 'helpers/Format.php';
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
?>
<?php
	$fm 	= new Format();
	$pd 	= new Product();
	$cart 	= new Cart();
	$brand 	= new Brand();
	$cat    = new Category();
	$csm	= new Customer();
	$order  = new Order();
	$cont 	= new Contact();
?>
<?php
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		$delcart = $cart->delCustomerCart();
		session_destroy();
		echo "<script>window.location = 'index.php';</script>";
	}

?>
<!DOCTYPE HTML>
<head>
<link rel="icon" href="./favicon.ico?v1" type="image/x-icon" />
<link rel="shortcut icon" href="./favicon.ico?v1" type="image/x-icon" /> 
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<style type="text/css">
	.success{
		color: green;
		font-weight: bolder;
	}
	.error{
		color: red;
		font-weight: bolder;
	}
	.error2{
		color: red;
		font-weight: bolder;
		font-size: 12px;
	}
	::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
	    color: #9F9F9F;
	    opacity: 1; /* Firefox */
	    font-weight: normal;
	}

	:-ms-input-placeholder { /* Internet Explorer 10-11 */
	    color: #9F9F9F;
	    font-weight: normal;
	}

	::-ms-input-placeholder { /* Microsoft Edge */
	    color: #9F9F9F;
	    font-weight: normal;
	}

	input[type="text"] {
   		color: #414045 !important;
   		font-weight: bold;	
   	}
   .tbltwo {
	  border: 1px solid #fff;
	  width: 60%;
	  box-shadow: 0px 0px 5px 0px;
	}
	.tbltwo th {
	  background: #666 none repeat scroll 0 0;
	  color: #fff;
	  font-size: 20px;
	  padding: 5px 8px;
	}
	.tbltwo td{padding:10px; color: #414045;font-weight: bolder;font-size: 12px;}

	table.tbltwo tr:nth-child(2n+1){background:#fff;height:30px;}
	table.tbltwo tr:nth-child(2n){background:#fdf0f1;height:30px;}

	.order h2{
		font-size: 30px;
	}
	.input{
		width: 80%;
		padding: 2px;
	}
	.input2{
		width: 80px;
		padding: 5px;
		background-color: #FDA700;
		border: 1px solid #FDA700;
		border-radius: 10px;
		color: #fff;
		cursor: pointer;
	}
	.input3{
		width: 80%;
		padding: 5px;
	}
	.payment{
      	width: 60%;
      	border: 1px solid #EDEDED;
      	padding: 20px;
      	max-height: 400px;
	}
	.payment h2{
		border-bottom: 2px solid #EDEDED;
	}
	.payment a{
		background-color: red;
		color: #fff;
		padding: 10px 15px;
		display: inline-block;
		margin: 5px;
		margin-top: 20px;
		width: 120px;
	}
	.payment2{
		background-color: #414045;
		color: #fff;
		padding: 8px 14px;
		display: inline-block;
		margin-top: 20px;
		width: 120px;
		border-radius :10px;
	}
	.divisionone{
		width: 50%;float: right;padding: 0px 10px;box-sizing: border-box;
	}
	.divisiontwo{
		width: 50%;float: left;padding: 0px 10px;box-sizing: border-box;
	}
</style>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" name="productName" placeholder="Search for product"><input type="submit" value="search" name="search">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart : </span>
								<span class="no_product">
								<?php
									$checkcart = $cart->checkCart();
									if ($checkcart) {
									 	echo $_SESSION['sum']."TK " ;
									 }else{
									 	echo "(empty)";
									 } 
								 ?>	
								</span>
							</a>
						</div>
			      </div>
		   <div class="login">
		   	<?php
		   		if (!isset($_SESSION['cuslogin'])) {
		   	?>
		   		<a href="login.php">Login</a>
		   	<?php
		   		}else{
		   	?>
		   		<a href="?action=logout">Logout</a>
		   	<?php
		   		}
		   	?>
		   	

		   </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="category.php">Categories</a></li>
	  <?php
	  	if ($checkcart) {
	  ?>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="payment.php">Payment</a></li>
	  <?php
		 }
	  ?>
	  <?php

	  	if (isset($_SESSION['cuslogin'])) {

		$checkorder = $order->getOrderItem($_SESSION['customerId']);
		if ($checkorder) {
	  ?>
	  	<li><a href="order.php">Order</a></li>
	  <?php 	
		 }
		} 
	 ?>	
	  
	  <li><a href="contact.php">Contact</a> </li>
	  <?php if (isset($_SESSION['cuslogin'])) {
	  ?>
	  <li><a href="profile.php">Profile</a></li>
	  <?php
	  } 
	  ?>
	  <div class="clear"></div>
	</ul>
</div>