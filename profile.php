<?php
	include 'inc/header.php';
?>
<?php
	if (!isset($_SESSION['cuslogin'])) {
		echo "<script>window.location = 'index.php';</script>";
	}
?>
 <div class="main">
    <div class="content">
    	
  			<div class="order">
  				<center>
  				<table class="tbltwo">
  					<tr>
  						<td colspan="3"><h2>Your Profile Details</h2></td>
  					</tr>
    <?php
      $customerId     = $_SESSION['customerId']; 
      $profileDetails = $csm->customerProfile($customerId);
      if ($profileDetails) {
         while ($result = $profileDetails->fetch_assoc()) {
    ?>
  					<tr>
  						<td>UserID</td>
  						<td>:</td>
  						<td><?php echo $result['customerId'] ?></td>
  					</tr>
  					<tr>
  						<td>Name</td>
  						<td>:</td>
  						<td><?php echo $result['name'] ?></td>
  					</tr>
  					<tr>
  						<td>Email</td>
  						<td>:</td>
  						<td><?php echo $result['email'] ?></td>
  					</tr>
  					<tr>
  						<td>Phone</td>
  						<td>:</td>
  						<td><?php echo $result['phone'] ?></td>
  					</tr>
  					<tr>
  						<td>Address</td>
  						<td>:</td>
  						<td><?php echo $result['address'] ?></td>
  					</tr>
  					<tr>
  						<td>City</td>
  						<td>:</td>
  						<td><?php echo $result['city'] ?></td>
  					</tr>
  					<tr>
  						<td>Country</td>
  						<td>:</td>
  						<td><?php echo $result['country'] ?></td>
  					</tr>
  					<tr>
  						<td>Zip-Code</td>
  						<td>:</td>
  						<td><?php echo $result['zip'] ?></td>
  					</tr>
            <tr>
              
              <td></td>
              <td></td>
              <td><a style=" color: #FDA700" href="update.php?id=<?php echo $result['customerId']; ?>">Update Profile</a> || <a style=" color: #FDA700" href="changepass.php?id=<?php echo $result['customerId']; ?>">Change Password</a></td>
             
              
            </tr>
      <?php
           }
        }
      ?>
  				</table>
  				</center>
  			</div>
  	  			<div class="clear"></div>
  		
    </div>
 </div>
 
<?php include"inc/footer.php" ?>