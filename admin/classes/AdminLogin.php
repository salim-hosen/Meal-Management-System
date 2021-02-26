<?php
	include "config/config.php";
	include "lib/Database.php";
	include "helpers/Format.php";
	class AdminLogin{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function logAdmin($admInfo){
			$username = $this->fm->validate($admInfo['username']);
			$password = $this->fm->validate(md5($admInfo['password']));
			
		
			$username = mysqli_real_escape_string($this->db->link,$username);
			$password = mysqli_real_escape_string($this->db->link,$password);
			
			
			if(empty($username) || empty($password)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}
			
			$query = "select * from admin_login where adminUsername = '$username' and adminPass = '$password'";
			$res = $this->db->select($query);
			if(!empty($res)){
				$data = $res->fetch_assoc();
				Session::set("logStatus",true);
				Session::set("adminUsername",$data['adminUsername']);
				Session::set("adminId",$data['adlogId']);
				echo "<script>window.location='index.php'</script>";
			}else{
				$msg = "<span class='errMsg'>Login Failed. Didn't Matched.</span>";
				return $msg;
			}
		}
	}
?>