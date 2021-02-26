<?php
	class Deposit{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function insertDep($depInfo){
			$name = mysqli_real_escape_string($this->db->link,$depInfo['name']);
			$date = mysqli_real_escape_string($this->db->link,$depInfo['date']);
			$amount = mysqli_real_escape_string($this->db->link,$depInfo['amount']);
			
			$name = $this->fm->validate($name);
			$date = $this->fm->validate($date);
			$amount = $this->fm->validate($amount);
			
			if(empty($name) || empty($date) || empty($amount)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}
			
			$query = "insert into tbl_deposit(uname,depDate,amount)values('$name','$date','$amount')";
			$res = $this->db->insert($query);
			
			if($res){
				$msg = "<span class='sucMsg'>Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='errMsg'>Couldn't Submit. Something Wrong!</span>";
				return $msg;
			}
		}
		
		public function getDeposit(){
			$query = "select * from tbl_deposit";
			$res = $this->db->select($query);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function delDeposit($dpDelId){
			$query = "delete from tbl_deposit where depId = '$dpDelId'";
			$res = $this->db->del($query);
			if($res){
				$msg = "<span class='sucMsg'>Deleted Successfully.</span>";
				return $msg;
			}else{
				return false;
			}
		}
		
		public function getDepositbyId($dpEditId){
			$query = "select * from tbl_deposit where depId = '$dpEditId' limit 1";
			$res = $this->db->select($query);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function updateDep($dpEditId,$upData){
			$name = mysqli_real_escape_string($this->db->link,$upData['name']);
			$date = mysqli_real_escape_string($this->db->link,$upData['date']);
			$amount = mysqli_real_escape_string($this->db->link,$upData['amount']);
			
			$name = $this->fm->validate($name);
			$date = $this->fm->validate($date);
			$amount = $this->fm->validate($amount);
			
			if(empty($name) || empty($date) || empty($amount)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}
			
			$query = "update tbl_deposit set uName = '$name',depDate = '$date',amount='$amount' where depId = '$dpEditId'";
			$res = $this->db->update($query);
			if($res){
				$msg = "<span class='sucMsg'>Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='sucMsg'>Couldn't Update.</span>";
				return $msg;
			}
		}
	}
?>