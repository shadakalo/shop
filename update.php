<?php
	include 'inc/header.php';
?>
<?php
	if (!isset($_SESSION['cuslogin'])) {
		echo "<script>window.location = 'index.php';</script>";
	}
?>
<?php
  if (!isset($_GET['id']) || $_GET['id'] == null) {
     echo "<script>window.location = '404.php';</script>";
  }else{
    $id = $_GET['id']; 
  }
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    $updateprofile = $csm->customerProfileUpdate($_POST,$id);
  }
?>
 <div class="main">
    <div class="content"> 	
  			<div class="order">
  				<center>
      <form action="" method="post">
  				<table class="tbltwo">
  					<tr>
  						<td colspan="3"><h2>Edit Profile Details</h2>
                <?php
                  if (isset($updateprofile)) {
                    echo $updateprofile;
                  }
                ?>
              </td>
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
  						<td><input class="input" type="text" name="name" value="<?php echo $result['name'] ?>"></td>
  					</tr>
  					<tr>
  						<td>Email</td>
  						<td>:</td>
  						<td><input class="input" type="text" name="email" value="<?php echo $result['email'] ?>"></td>
  					</tr>
  					<tr>
  						<td>Phone</td>
  						<td>:</td>
  						<td><input class="input" type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
  					</tr>
  					<tr>
  						<td>Address</td>
  						<td>:</td>
  						<td><input class="input" type="text" name="address" value="<?php echo $result['address'] ?>"></td>
  					</tr>
  					<tr>
  						<td>City</td>
  						<td>:</td>
  						<td><input class="input" type="text" name="city" value="<?php echo $result['city'] ?>"></td>
  					</tr>
  					<tr>
  						<td>Country</td>
  						<td>:</td>
  						<td><input class="input" type="text" name="country" value="<?php echo $result['country'] ?>"></td>
  					</tr>
  					<tr>
  						<td>Zip-Code</td>
  						<td>:</td>
  						<td><input class="input" type="text" name="zip" value="<?php echo $result['zip'] ?>"></td>
  					</tr>
             <tr>
              <td></td>
              <td></td>
              <td><input class="input2" type="submit" name="submit" value="Update"></td>
            </tr>
      <?php
           }
        }
      ?>
  				</table>
        </form>
  				</center>
  			</div>
  	  			<div class="clear"></div>
  		
    </div>
 </div>
 
<?php include"inc/footer.php" ?>