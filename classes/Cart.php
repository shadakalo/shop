<?php 
	$filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Database.php';
    include_once $filepath.'/../helpers/Format.php';
?>
<?php
	class Cart
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function cartInsert($quantity,$productId){

			$quantity    = $this->fm->validation($quantity);
			$quantity    = mysqli_real_escape_string($this->db->link,$quantity);
			$productId   = mysqli_real_escape_string($this->db->link,$productId); 
			$sId 	     = session_id();

			$querySelect = "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$result 	 = $this->db->select($querySelect)->fetch_assoc();

			$productName = $result['productName'];
			$price 		 = $result['price'];
			$image 		 = $result['image'];

			$queryCheck  = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
			$getpro 	 = $this->db->select($queryCheck);
			if ($getpro) {
				$msg = "<span style='color:red;font-weight:bolder;font-size:14px;'>Product already in Cart!!!</span>";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";

	    		$inserted_row = $this->db->insert($query);
	    		if ($inserted_row) {
	    	  		echo "<script>window.location = 'cart.php';</script>";
	    	    }else{
	    	  		echo "<script>window.location = '404.php';</script>";
	    	  	}
	    	}
		}

		public function getCartItem()
		{
			$sId    = session_id();
			$query  = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function cartUpdate($cartId,$quantity)
		{
			$cartId      = mysqli_real_escape_string($this->db->link,$cartId);
			$quantity    = mysqli_real_escape_string($this->db->link,$quantity);
			$query 	     = "UPDATE tbl_cart SET quantity='$quantity' WHERE cartId = '$cartId'";
			$updated_row = $this->db->update($query);
			if ($updated_row) {
	    	  		echo "<script>window.location = 'cart.php';</script>";
	        }else{
	    	  		$msg = "<span class='success'>Quantity Not Updated !!!</span>";
				     return $msg;
	    	}
		}

		public function cartDelete($cartId)
		{
			$cartId      = mysqli_real_escape_string($this->db->link,$cartId);
			$query 		 = " DELETE FROM tbl_cart WHERE cartId = '$cartId'";
			$delete_row  = $this->db->delete($query);
			if ($delete_row) {
				echo "<script>window.location = 'cart.php';</script>";
			}else{
				$msg = "<span class='error'>Cart Not Deleted !!!</span>";
				return $msg;
			}
		}

		public function checkCart()
		{
			$sId 	= session_id();
			$query  = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function delCustomerCart()
		{
			$sId   = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
			$delete_row  = $this->db->delete($query);

		}
	}
?>