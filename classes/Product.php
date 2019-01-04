<?php 
	$filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Database.php';
    include_once $filepath.'/../helpers/Format.php';
?>
<?php

	class Product
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function productInsert($data,$file)
		{
			$productName =  $this->fm->validation($_POST['productName']);
			$catId		 =  $this->fm->validation($_POST['catId']);
			$brandId 	 =  $this->fm->validation($_POST['brandId']);
			$body 		 =  $this->fm->validation($_POST['body']);
			$price 		 =  $this->fm->validation($_POST['price']);
			$type 		 =	$this->fm->validation($_POST['type']);

			$productName =  mysqli_real_escape_string($this->db->link,$productName);
			$catId		 =  mysqli_real_escape_string($this->db->link,$catId);
			$brandId	 =  mysqli_real_escape_string($this->db->link,$brandId);
			$body		 =  mysqli_real_escape_string($this->db->link,$body);
			$price 		 =  mysqli_real_escape_string($this->db->link,$price);
			$type 		 =  mysqli_real_escape_string($this->db->link,$type);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "img/".$unique_image;


		    if ($productName == "" || $catId == -1 || $brandId == -1 || $body == "" || $price == "" || $type == -1 || $file_name == "") {
		    	$msg = "<span class='error'>Fields can not be empty !!!</span>";
		    	return $msg;
		    }else{
		    		if (in_array($file_ext, $permited) === false) {
						 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
				    }else{
				    	  move_uploaded_file($file_temp, $uploaded_image);
				    	  $query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type) VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";
				    	  $inserted_row = $this->db->insert($query);
				    	  if ($inserted_row) {
				    	  	$msg = "<span class='success'>Product Inserted Successfully !!!</span>";
				    	  	return $msg;
				    	  }else{
				    	  	$msg = "<span class='error'>Product Not Inserted !!!</span>";
							return $msg;
				    	  }
				   }
		    }
					
		}


		public function getAllProduct()
		{
			$query = "	SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName FROM tbl_product
						INNER JOIN tbl_category
						ON tbl_product.catId = tbl_category.catId
						INNER JOIN tbl_brand
						ON tbl_product.brandId = tbl_brand.brandId
					  ";
			$result = $this->db->select($query);
			return $result;
		}

		public function productDelete($productId){

			$selectQuery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$getdata     = $this->db->select($selectQuery);
			if ($getdata) {
				while ($delimg = $getdata->fetch_assoc()) {
					unlink($delimg['image']);
				}
			}

			$query = " DELETE FROM tbl_product WHERE productId = '$productId'";
			$delete_row = $this->db->delete($query);
			if ($delete_row) {
				$msg = "<span class='success'>Product deleted Successfully !!!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Product Not Deleted !!!</span>";
				return $msg;
			}

		}

		public function getProductById($productId)
		{
			$query  = "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function productUpdate($productId,$data,$file)
		{
			$productName =  $this->fm->validation($_POST['productName']);
			$catId		 =  $this->fm->validation($_POST['catId']);
			$brandId 	 =  $this->fm->validation($_POST['brandId']);
			$body 		 =  $this->fm->validation($_POST['body']);
			$price 		 =  $this->fm->validation($_POST['price']);
			$type 		 =	$this->fm->validation($_POST['type']);

			$productName =  mysqli_real_escape_string($this->db->link,$productName);
			$catId		 =  mysqli_real_escape_string($this->db->link,$catId);
			$brandId	 =  mysqli_real_escape_string($this->db->link,$brandId);
			$body		 =  mysqli_real_escape_string($this->db->link,$body);
			$price 		 =  mysqli_real_escape_string($this->db->link,$price);
			$type 		 =  mysqli_real_escape_string($this->db->link,$type);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "img/".$unique_image;


			 if ($productName == "" || $catId == -1 || $brandId == -1 || $body == "" || $price == "" || $type == -1) {
		    	$msg = "<span class='error'>Fields can not be empty !!!</span>";
		    	return $msg;
		    }else{

		    	if ($file_name == "") {
				    	  $query = "UPDATE tbl_product SET 
				    	  			productName = '$productName',
				    	  			catId 		= '$catId',
				    	  			brandId		= '$brandId',
				    	  			body 		= '$body',
				    	  			price 		= '$price',
				    	  			type 		= '$type'
				    	  			WHERE productId = '$productId'
				    	  			";
				    	  $updated_row = $this->db->insert($query);
				    	  if ($updated_row) {
				    	  	$msg = "<span class='success'>Product Updated Successfully !!!</span>";
				    	  	return $msg;
				    	  }else{
				    	  	$msg = "<span class='error'>Product Not Updated !!!</span>";
							return $msg;
				    	  }
		    	}else{

		    			if (in_array($file_ext, $permited) === false) {
						 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
				    }else{
			    		  move_uploaded_file($file_temp, $uploaded_image);
				    	  $query = "UPDATE tbl_product SET 
				    	  			productName = '$productName',
				    	  			catId 		= '$catId',
				    	  			brandId		= '$brandId',
				    	  			body 		= '$body',
				    	  			price 		= '$price',
				    	  			image 		= '$uploaded_image',
				    	  			type 		= '$type'
				    	  			WHERE productId = '$productId'
				    	  			";
				    	  $updated_row = $this->db->insert($query);
				    	  if ($updated_row) {
				    	  	$msg = "<span class='success'>Product Updated Successfully !!!</span>";
				    	  	return $msg;
				    	  }else{
				    	  	$msg = "<span class='error'>Product Not Updated !!!</span>";
							return $msg;
				    	  }
			    	 }
		    	}

		    }


		}

		public function getFeaturedProduct(){
			$query  = "SELECT * FROM tbl_product WHERE type = 1 ORDER BY rand() DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getEachProduct(){
			$query  = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getSingleProduct($productId){
			$query  = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName FROM tbl_product
						INNER JOIN tbl_category
						ON tbl_product.catId = tbl_category.catId
						INNER JOIN tbl_brand
						ON tbl_product.brandId = tbl_brand.brandId
						WHERE tbl_product.productId = '$productId'
						";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByBrandId($brandId)
		{
			$query  = "SELECT * FROM tbl_product WHERE brandId = '$brandId' ORDER BY productId DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByBrandOne()
		{
			$query  = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByBrandTwo()
		{
			$query  = "SELECT * FROM tbl_product WHERE brandId = '3' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByBrandThree()
		{
			$query  = "SELECT * FROM tbl_product WHERE brandId = '5' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByBrandFour()
		{
			$query  = "SELECT * FROM tbl_product WHERE brandId = '6' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByCategory($catId)
		{
			$catId = mysqli_real_escape_string($this->db->link,$catId);
			$query  = "SELECT * FROM tbl_product WHERE catId = '$catId' ORDER BY productId DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function search($productName)
		{

			if ($productName == "") {
				echo "<script>window.location = 'index.php';</script>";
			}
			$productName		 =  $this->fm->validation($_POST['productName']);
			$productName = mysqli_real_escape_string($this->db->link,$productName);
			$query  = "SELECT * FROM tbl_product WHERE productName LIKE '%$productName%' ";
			$result = $this->db->select($query);
			return $result;
		}
	}
?>