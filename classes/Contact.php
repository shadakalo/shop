<?php 
	$filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Database.php';
    include_once $filepath.'/../helpers/Format.php';
?>
<?php
	class Contact
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function messageInsert($data)
		{
			$name =  $this->fm->validation($_POST['name']);
			$email		 =  $this->fm->validation($_POST['email']);
			$mobile 	 =  $this->fm->validation($_POST['mobile']);
			$body 		 =  $this->fm->validation($_POST['body']);

			$name =  mysqli_real_escape_string($this->db->link,$name);
			$email		 =  mysqli_real_escape_string($this->db->link,$email);
			$mobile	 =  mysqli_real_escape_string($this->db->link,$mobile);
			$body		 =  mysqli_real_escape_string($this->db->link,$body);

			if ($name == "" || $body == "" || $email == "" || $mobile == "") {
		    	$msg = "<span style='color:red;'>Fields can not be empty !!!</span>";
		    	return $msg;
		    }else{
		    	 $query = "INSERT INTO tbl_contact(name,email,mobile,body) VALUES('$name','$email','$mobile','$body')";
		    	  $inserted_row = $this->db->insert($query);
		    	  if ($inserted_row) {
		    	  	$msg = "<span style='color:green;'>Message Sent Successfully !!!</span>";
		    	  	return $msg;
		    	  }else{
		    	  	$msg = "<span style='color:red;'>Message Not Inserted !!!</span>";
					return $msg;
		    	  }
		    }
		}

		public function message(){
			$query  = "SELECT * FROM tbl_contact";
			$result = $this->db->select($query);
			return $result;
		}

		public function msgDelete($id)
		{
			$query = "DELETE FROM tbl_contact WHERE id = '$id'";
			$deleted_row = $this->db->delete($query);
		}
	}
?>