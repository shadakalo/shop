<?php 
	$filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Database.php';
    include_once $filepath.'/../helpers/Format.php';
?>
<?php
	class Category
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function catInsert($catName){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link,$catName);

			if (empty($catName)) {
				$msg = "<span class='error'>Category name can not be empty !!!</span>";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
				$catinsert = $this->db->insert($query);
				if ($catinsert) {
					$msg = "<span class='success'>Category Inserted Successfully !!!</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Category Not Inserted !!!</span>";
					return $msg;
				}
			}
		}

		public function getAllcat(){
			$query  = "SELECT * FROM tbl_category";
			$result = $this->db->select($query);
			return $result;
		}

		public function getCatById($catId){

			$query  = "SELECT * FROM tbl_category WHERE catId = '$catId'";
			$result = $this->db->select($query);
			return $result;

		}

		public function catUpdate($catId,$catName){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link,$catName);

			if (empty($catName)) {
				$msg = "<span class='error'>Category name can not be empty !!!</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$catId'";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
					$msg = "<span class='success'>Category Updated Successfully !!!</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Category Not Updated !!!</span>";
					return $msg;
				}
			}
		}

		public function catDelete($catId){

			$query = " DELETE FROM tbl_category WHERE catId = '$catId'";
			$delete_row = $this->db->delete($query);
			if ($delete_row) {
				$msg = "<span class='success'>Category deleted Successfully !!!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Category Not Deleted !!!</span>";
				return $msg;
			}

		}
	}

	
?>