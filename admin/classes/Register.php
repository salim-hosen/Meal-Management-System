<?php
	class Register{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function insertRegInfo($regInfo){
			$userName = mysqli_real_escape_string($this->db->link,$regInfo['username']);
			$fullName = mysqli_real_escape_string($this->db->link,$regInfo['fullName']);
			$email = mysqli_real_escape_string($this->db->link,$regInfo['email']);
			$phone = mysqli_real_escape_string($this->db->link,$regInfo['phone']);
			$password = mysqli_real_escape_string($this->db->link,$regInfo['password']);
			$rePassword = mysqli_real_escape_string($this->db->link,$regInfo['repassword']);
			
			if(empty($userName) || empty($fullName) || empty($email) || empty($phone) || empty($password) || empty($rePassword)){
				$msg = "<span class='errMsg'>You must Fill all the Field.</span>";
				return $msg;
			}else if(preg_match('/\s/',$userName)){
				$msg = "<span class='errMsg'>Username should not contain Whitespace.</span>";
				return $msg;
			}else if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
				$msg = "<span class='errMsg'>Invalid Email.</span>";
				return $msg;
			}else if($password != $rePassword){
				$msg = "<span class='errMsg'>Password Didn't Matched.</span>";
				return $msg;
			}else if(strlen($password)<6){
				$msg = "<span class='errMsg'>Password Should contain at least 6 Characters.</span>";
				return $msg;
			}else{
				$query = "insert into usr_reg(userName,fullName,email,phone,pass,rePass)values('$userName','$fullName','$email','$phone',md5('$password'),md5('$rePassword'))";
				$res = $this->db->insert($query);
				if($res){
					$msg = "<span class='sucMsg'>Registered Successfully.</span>";
					return $msg;
				}else{
					$msg = "<span class='errMsg'>Couldn't Register.</span>";
					return $msg;
				}
			}
		}
		
		public function ifRegistered($logInfo){
			$username = $this->fm->validate($logInfo['username']);
			$password = $this->fm->validate($logInfo['password']);
			
		
			$username = mysqli_real_escape_string($this->db->link,$username);
			$password = mysqli_real_escape_string($this->db->link,$password);
			
			
			if(empty($username) || empty($password)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}else{
				$query = "select * from usr_reg where userName = '$username' and pass = md5('$password') and rePass = md5('$password') limit 1";
				$res = $this->db->select($query);
				if(!empty($res)){
					$data = $res->fetch_assoc();
					Session::set("usrLogin",true);
					Session::set("userName",$data['userName']);
					Session::set("fullName",$data['fullName']);
					Session::set("userId",$data['regId']);
					echo "<script>window.location='index.php'</script>";
				}else{
					$msg = "<span class='errMsg'>Login Failed. Didn't Matched.</span>";
					return $msg;
				}
			}
		}
		
		public function getUserInfo($pId){
			$query = "select * from usr_reg where regId = '$pId' limit 1";
			$res = $this->db->select($query);
			return $res;
		}
		
		public function updateUserInfo($upInfo,$pId){
			$userName = mysqli_real_escape_string($this->db->link,$upInfo['username']);
			$fullName = mysqli_real_escape_string($this->db->link,$upInfo['fullName']);
			$email = mysqli_real_escape_string($this->db->link,$upInfo['email']);
			$phone = mysqli_real_escape_string($this->db->link,$upInfo['phone']);
			$oldPassword = mysqli_real_escape_string($this->db->link,$upInfo['oldPassword']);
			$newPassword = mysqli_real_escape_string($this->db->link,$upInfo['newPassword']);
			
			if(empty($oldPassword) && empty($newPassword)){
				if(empty($userName) || empty($fullName) || empty($email) || empty($phone)){
				$msg = "<span class='errMsg'>You must Fill Username, fullName, Email, Phone Field.</span>";
				return $msg;
				}else if(preg_match('/\s/',$userName)){
					$msg = "<span class='errMsg'>Username should not contain Whitespace.</span>";
					return $msg;
				}else if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
					$msg = "<span class='errMsg'>Invalid Email.</span>";
					return $msg;
				}else{
					$query = "update usr_reg set userName = '$userName', fullName = '$fullName', email = '$email', phone = '$phone' where regId = '$pId'";
					$res = $this->db->insert($query);
					if($res){
						$msg = "<span class='sucMsg'>Updated Successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='errMsg'>Couldn't Update.</span>";
						return $msg;
					}
				}
			}else{
				if(empty($oldPassword)){
					$msg = "<span class='errMsg'>Old Password is Empty.</span>";
					return $msg;
				}else if(empty($newPassword)){
					$msg = "<span class='errMsg'>New Password is Empty.</span>";
					return $msg;
				}else if(strlen($newPassword)<6){
					$msg = "<span class='errMsg'>Password Should contain at least 6 Characters.</span>";
					return $msg;
				}else{
					$query = "select pass,rePass from usr_reg where regId = '$pId'";
					$sres = $this->db->select($query);
					if($sres){
						$value = $sres->fetch_assoc();
						if($value['pass'] == md5($oldPassword) && $value['rePass'] == md5($oldPassword)){
							$query = "update usr_reg set userName = '$userName', fullName = '$fullName', email = '$email', phone = '$phone',pass = md5('$newPassword'), rePass = md5('$newPassword')";
							$res = $this->db->insert($query);
							if($res){
								$msg = "<span class='sucMsg'>Updated Successfully.</span>";
								return $msg;
							}else{
								$msg = "<span class='errMsg'>Couldn't Update.</span>";
								return $msg;
							}
						}else{
							$msg = "<span class='errMsg'>Old Password didn't Match.</span>";
							return $msg;
						}
					}else{
						$msg = "<span class='errMsg'>Couldn't Update.</span>";
						return $msg;
					}
				}
			}
		}
	}
?>