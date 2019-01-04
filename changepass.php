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
    $passwordchange = $csm->changePass($_POST,$id);
  }
?>
 <div class="main">
    <div class="content"> 	
  			<div class="order">
  				<center>
      <form action="" method="post">
  				<table class="tbltwo">
  					<tr>
  						<td colspan="3"><h2>Change Password</h2>
                <?php
                  if (isset($passwordchange)) {
                    echo $passwordchange;
                  }
                ?>
              </td>
  					</tr>
  					
  					<tr>
  						<td>Old Password</td>
  						<td>:</td>
  						<td><input class="input3" type="password" name="pass" placeholder="Old password" "></td>
  					</tr>
  					<tr>
  						<td>New Password</td>
  						<td>:</td>
  						<td><input class="input3" type="password" name="pass1" placeholder="New password" "></td>
  					</tr>
  					<tr>
  						<td>Confirm Password</td>
  						<td>:</td>
  						<td><input class="input3" type="password" name="pass2" placeholder="Retype password" "></td>
  					</tr>
             <tr>
              <td></td>
              <td></td>
              <td><input class="input2" type="submit" name="submit" value="Update"></td>
            </tr>
  				</table>
        </form>
  				</center>
  			</div>
  	  			<div class="clear"></div>
  		
    </div>
 </div>
 
<?php include"inc/footer.php" ?>