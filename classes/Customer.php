<?php 
	$filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Database.php';
    include_once $filepath.'/../helpers/Format.php';
?>
<?php
	class Customer
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function customerInsert($data)
		{
			$name 		 =  $this->fm->validation($_POST['name']);
			$city		 =  $this->fm->validation($_POST['city']);
			$zip 	 	 =  $this->fm->validation($_POST['zip']);
			$email 		 =  $this->fm->validation($_POST['email']);
			$address 	 =  $this->fm->validation($_POST['address']);
			$country 	 =	$this->fm->validation($_POST['country']);
			$phone 		 =	$this->fm->validation($_POST['phone']);
			$pass 		 =	$this->fm->validation($_POST['pass']);

			$name 		 =  mysqli_real_escape_string($this->db->link,$name);
			$city		 =  mysqli_real_escape_string($this->db->link,$city);
			$zip		 =  mysqli_real_escape_string($this->db->link,$zip);
			$email		 =  mysqli_real_escape_string($this->db->link,$email);
			$address 	 =  mysqli_real_escape_string($this->db->link,$address);
			$country 	 =  mysqli_real_escape_string($this->db->link,$country);
			$phone 		 =  mysqli_real_escape_string($this->db->link,$phone);
			$pass 		 =  mysqli_real_escape_string($this->db->link,$pass);


			 if ($name == "" || $city == "" || $zip == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $pass == "") {
		    	$msg = "<span class='error'>Field's can not be empty !!!</span>";
		    	return $msg;
		    }else{

		    		$queryEmail = "SELECT * FROM tbl_customer WHERE email = '$email'";
		    		$getdata     = $this->db->select($queryEmail);
		    		if ($getdata) {
						 $msg = "<span class='error'>Email Already Exist !!!</span>";
						 return $msg;
				    }else{
				    	  $pass = md5($pass);
				    	  $query = "INSERT INTO tbl_customer(name,address,city,country,zip,phone,email,pass) VALUES('$name','$address','$city','$country','$zip','$phone','$email','$pass')";
				    	  $inserted_row = $this->db->insert($query);
				    	  if ($inserted_row) {
				    	  	$msg = "<span class='success'>Account Created Successfully !!!</span>";
				    	  	return $msg;
				    	  }else{
				    	  	$msg = "<span class='error'>Account not created !!!</span>";
							return $msg;
				    	  }
				   }
		    	}
		    }

		    public function customerLogin($email,$pass){
		    	$email 		 =  $this->fm->validation($_POST['email']);
		    	$pass 		 =	$this->fm->validation($_POST['pass']);
		    	$email		 =  mysqli_real_escape_string($this->db->link,$email);
		    	$pass 		 =  mysqli_real_escape_string($this->db->link,$pass);
		    	

		    	if ($email == "" || $pass == "") {
		    		$msg = "<span class='error2'>Field's can not be empty !!!</span>";
		    		return $msg;
		    	}else{
		    		$pass		 =  md5($pass);
		    		$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
			    	$result     = $this->db->select($query);
			    	if($result != false){
			    		$value = $result->fetch_assoc();
			    		$_SESSION['cuslogin']   = true;
			    		$_SESSION['name']       = $value['name'];
			    		$_SESSION['customerId'] = $value['customerId'];
			    		echo "<script>window.location = 'cart.php';</script>";
			    	}else{
			    		$msg =  "<span class='error2'>Invalid Username/Password !!!</span>";
			    		return $msg;
		    		}
		    	}

		    	
		    }

		    public function customerProfile($customerId){
		    	$customerId 	=  $this->fm->validation($customerId);
		    	$customerId		=  mysqli_real_escape_string($this->db->link,$customerId);
		    	$query 			= "SELECT * FROM tbl_customer WHERE customerId ='$customerId'";
		    	$result     	= $this->db->select($query);
		    	return $result;
		    }

		    public function customerProfileUpdate($data,$id)
		    {
		    	$name 		 =  $this->fm->validation($_POST['name']);
				$city		 =  $this->fm->validation($_POST['city']);
				$zip 	 	 =  $this->fm->validation($_POST['zip']);
				$email 		 =  $this->fm->validation($_POST['email']);
				$address 	 =  $this->fm->validation($_POST['address']);
				$country 	 =	$this->fm->validation($_POST['country']);
				$phone 		 =	$this->fm->validation($_POST['phone']);

				$name 		 =  mysqli_real_escape_string($this->db->link,$name);
				$city		 =  mysqli_real_escape_string($this->db->link,$city);
				$zip		 =  mysqli_real_escape_string($this->db->link,$zip);
				$email		 =  mysqli_real_escape_string($this->db->link,$email);
				$address 	 =  mysqli_real_escape_string($this->db->link,$address);
				$country 	 =  mysqli_real_escape_string($this->db->link,$country);
				$phone 		 =  mysqli_real_escape_string($this->db->link,$phone);

				if ($name == "" || $city == "" || $zip == "" || $email == "" || $address == "" || $country == "" || $phone == "" ) {
	    			$msg = "<span class='error'>Field's can not be empty !!!</span>";
	    			return $msg;
		    	}else{

				    	  $query = "UPDATE tbl_customer SET name = '$name', city ='$city', zip = '$zip', email ='$email', address ='$address', country = '$country', phone ='$phone' WHERE  customerId ='$id'";
				    	  $updated_row = $this->db->update($query);
				    	  if ($updated_row) {
				    	  	$msg = "<span class='success'>Details updated Successfully !!!</span>";
				    	  	return $msg;
				    	  }else{
				    	  	$msg = "<span class='error'>Details not updated !!!</span>";
							return $msg;
				    	  }
				   
		    	}
		    }

		    public function changePass($data,$id)
		    {
		    	$pass 		 =	$this->fm->validation($_POST['pass']);
		    	$pass1 		 =	$this->fm->validation($_POST['pass1']);
		    	$pass2 		 =	$this->fm->validation($_POST['pass2']);
		    	$pass 		 =  mysqli_real_escape_string($this->db->link,$pass);
		    	$pass1 		 =  mysqli_real_escape_string($this->db->link,$pass1);
		    	$pass2 		 =  mysqli_real_escape_string($this->db->link,$pass2);
		    	


		    	if ($pass == "" || $pass1 == "" || $pass2 =="") {
		    		$msg = "<span class='error'>Field's can not be empty !!!</span>";
	    			return $msg;
		    	}else{
					$pass 		 = md5($pass);
		    		$querypass 	 = "SELECT * FROM tbl_customer WHERE customerId = '$id'";
			    	$result     	= $this->db->select($querypass)->fetch_assoc();
			    	if ($pass != $result['pass']) {
			    		$msg = "<span class='error'>Wrong Old Password !!!</span>";
					    return $msg;
			    	}elseif($pass1 != $pass2){
			    		$msg = "<span class='error'>Password don't match !!!</span>";
					    return $msg;
		    		}else{
		    			$pass1 = md5($pass1);
		    			$query = "UPDATE tbl_customer SET pass = '$pass1' WHERE customerId='$id'";
		    			 $updated_row = $this->db->update($query);
				    	  if ($updated_row) {
				    	  	$msg = "<span class='success'>Password Changed Successfully !!!</span>";
				    	  	return $msg;
				    	  }else{
				    	  	$msg = "<span class='error'>Password not updated !!!</span>";
							return $msg;
				    	  }

		    		}

		    	}



		    	
		    }

	}
?>