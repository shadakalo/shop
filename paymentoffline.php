<?php
	include 'inc/header.php';
?>
<?php
	if (!isset($_SESSION['cuslogin'])) {
		echo "<script>window.location = 'login.php';</script>";
	}
?>
<?php
  if (isset($_GET['id']) && $_GET['id'] == 'order') {
      $order->orderInsert();
      $cart->delCustomerCart();
      echo "<script>window.location = 'success.php';</script>";
  }
?>
 <div class="main">
    <div class="content" >
      <diV class="section group">
      <div class="divisionone">
          <table class="tblone" style="box-shadow: 0px 0px 5px 0px;border: 0px;">
              <tr>
                <th width="5%">SL</th>
                <th width="20%">Product Name</th>
                
                <th width="25%">Price</th>
                <th width="15%">Quantity</th>
                <th width="20%">Total Price</th>
              
              </tr>
              
              <?php
                $cartitem = $cart->getCartItem();
                if ($cartitem) {
                  $i = 0;
                  $sum = 0;
                  while ($result = $cartitem->fetch_assoc()) {
                    $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['productName']; ?></td>
               
                <td>Tk. <?php echo $result['price']; ?></td>
                <td>
                 <?php echo $result['quantity']; ?>
                </td>
                <td>Tk. <?php
                       $total = $result['price'] * $result['quantity'];
                       echo $total;
                      ?>
                  </td>
              
              </tr>
            <?php     
                  $sum = $sum + $total;
                  }
                }else{
                  echo "<script>window.location = 'index.php';</script>";
                }
            ?>
            </table>
            <?php  
              if ($cartitem) {
            ?>

            <diV  style="float:right;text-align:left;box-shadow: 0px 0px 1px 0px;padding: 10px;width: 50%;">

                <table>
                  <tr>
                    <th>Sub Total  </th>
                    <td>&nbsp:&nbsp</td>
                    <td>BDT <?php echo $sum; ?></td>
                  </tr>
                  <tr>
                    <th>VAT  </th>
                    <td>&nbsp:&nbsp</td>
                    <td>10% (<?php echo $sum*(0.1)  ?> BDT) </td>
                  </tr>
                  <tr>
                    <th>Grand Total </th>
                    <td>&nbsp:&nbsp</td>
                    <td>BDT
                     <?php  
                      echo ($sum*(0.1))+$sum;
                      $_SESSION['sum'] = ($sum*(0.1))+$sum;
                     ?> 
                    </td>
                  </tr>

                 </table>

              <?php } ?>
            </diV>

            </div>
            <div class="divisiontwo">
              <table class="tbltwo" style="width: 100%;">
            <tr>
              <td colspan="3"><h2>Mailing Address</h2></td>
            </tr>
    <?php
      $customerId     = $_SESSION['customerId']; 
      $profileDetails = $csm->customerProfile($customerId);
      if ($profileDetails) {
         while ($result = $profileDetails->fetch_assoc()) {
    ?>
            
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
                          
              <td><a style=" color: #FDA700" href="update.php?id=<?php echo $result['customerId']; ?>">Update Profile</a> </td>
            </tr>
      <?php
           }
        }
      ?>

          </table>

        </div>
        <a href="?id=order" style="background-color: red;padding: 8px 14px;color: white; border-radius: 10px; float: right; position: relative;top: 10px;right: 10px;">Confirm Order</a>
      </diV>
    </div>
 </div>
<?php include"inc/footer.php" ?>