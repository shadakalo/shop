<?php 
	$filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Database.php';
    include_once $filepath.'/../helpers/Format.php';
?>
<?php
	class Order
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function orderInsert(){

			$sId = session_id();
			$queryselect = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$products    = $this->db->select($queryselect);
			if($products){
				while ($result = $products->fetch_assoc()) {
					
					$customerId 	= $_SESSION['customerId'];
					$productId  	= $result['productId'];
					$productName	= $result['productName'];
					$price			= $result['price'];
					$quantity		= $result['quantity'];
					$image			= $result['image'];

					$query = "INSERT INTO tbl_order(sId,customerId,productId,productName,price,quantity,image) VALUES('$sId','$customerId','$productId','$productName','$price','$quantity','$image')";
	    			$inserted_row = $this->db->insert($query);

				}
			}
		}

		public function getOrderItem($customerId)
		{
			$query 		 = "SELECT * FROM tbl_order WHERE customerId = '$customerId'";
			$ordered_row = $this->db->select($query);
			return $ordered_row;
		}

		public function getOrderedItem()
		{
			$query = "SELECT * FROM tbl_order WHERE status = 0 ORDER BY orderTime";
			$ordered_row = $this->db->select($query);
			return $ordered_row;
		}
		public function getCustomerOrderedItem($customerId)
		{
			$query = "SELECT * FROM tbl_order WHERE customerId ='$customerId' AND status = 0 ORDER BY orderTime";
			$ordered_row = $this->db->select($query);
			return $ordered_row;
		}

		public function moveToProcessing($customerId)
		{
			$query = "UPDATE  tbl_order SET status = 1 WHERE customerId ='$customerId' ";
			$updated_row = $this->db->update($query);
		}
		
		public function getProcessesItem()
		{
			$query = "SELECT * FROM tbl_order WHERE status = 1 ORDER BY orderTime";
			$ordered_row = $this->db->select($query);
			return $ordered_row;
		}
		
		public function getCustomerOrderedProcessedItem($customerId)
		{
			$query = "SELECT * FROM tbl_order WHERE customerId ='$customerId' AND status = 1 ORDER BY orderTime";
			$ordered_row = $this->db->select($query);
			return $ordered_row;
		}

		public function moveToDelivered($customerId)
		{
			$query = "UPDATE  tbl_order SET status = 2 WHERE customerId ='$customerId' AND status = 1";
			$updated_row = $this->db->update($query);
		}
		
		public function getDeliveredItem()
		{
			$query = "SELECT * FROM tbl_order WHERE status = 2 ORDER BY orderTime";
			$ordered_row = $this->db->select($query);
			return $ordered_row;
		}

		public function getCustomerdeliveredItem($customerId)
		{
			$query = "SELECT * FROM tbl_order WHERE customerId ='$customerId' AND status = 2 ORDER BY orderTime";
			$ordered_row = $this->db->select($query);
			return $ordered_row;
		}

		public function deleteOrder($customerId)
		{
			$query = "DELETE FROM tbl_order WHERE customerId ='$customerId' AND status = 2 ";
			$ordered_row = $this->db->select($query);
		}
	}