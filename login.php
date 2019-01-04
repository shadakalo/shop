<?php include"inc/header.php" ?>
<?php
	if (isset($_SESSION['cuslogin'])) {
		echo "<script>window.location = 'order.php';</script>";
	}
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'] =='submit') {
		$createacc = $csm->customerInsert($_POST);
	}
	if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'] =='login') {
		$email = $_POST['email'];
		$pass  = $_POST['pass'];
		$Customerlogin = $csm->customerLogin($email,$pass);
	}	

?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
			
        		<form action="" method="POST" >
        			<?php
        		if (isset($Customerlogin)) {
        			echo $Customerlogin;
        		}
        	?>
                	<input name="email" type="text" placeholder="Email" >
                    <input name="pass" type="password"  placeholder="Password">
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button name="submit" value="login" class="grey">Sign In</button></div></div>
                    </div>
                    </form>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php
    			if(isset($createacc)){
    				echo $createacc;
    			}
    		?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City">
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code" >
							</div>
							<div>
								<input type="text" name="email" placeholder="Email">
							</div>
		    			</td>
			    		<td>
							<div>
								<input type="text" name="address" placeholder="Address">
							</div>
			    			<div>
								<input type="text" name="country" placeholder="Country">
							</div>		        
		
				           <div>
				          		<input type="text" name="phone" placeholder="Phone">
				          </div>
					  
							  <div>
								<input type="text" name="pass" placeholder="Password">
							</div>
		    		</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button name="submit" value="submit" class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
<?php include"inc/footer.php" ?>