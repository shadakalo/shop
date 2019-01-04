<?php 
	session_start();
	$_SESSION['adminlogin'] = false;
	$filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Database.php';
    include_once $filepath.'/../helpers/Format.php';
?>
<?php
class Adminlogin
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminLogin($adminUser, $adminPass){

		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);
		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

		if (empty($adminUser) || empty($adminPass)) {
			$loginmsg = "Username or Password Can not be empty !!!";
			return $loginmsg;
		}else{
			$adminPass = md5($adminPass);
			$query  = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				$_SESSION['adminlogin'] = true;
				$_SESSION['adminId']    = $value['adminId'];
				$_SESSION['adminUser']  = $value['adminUser'];
				$_SESSION['adminName']  = $value['adminName'];
				echo "<script>window.location = 'index.php';</script>";
			}else{
				$loginmsg = "Invalid Username/Password !!!";
				return $loginmsg;
			}
		}
	}
}
?>