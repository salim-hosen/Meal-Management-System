<?php
	class Member{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function addMember($memInfo){
			$name = mysqli_real_escape_string($this->db->link,$memInfo['name']);
			
			$name = $this->fm->validate($name);
			
			if(empty($name)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}
			
			$query = "insert into tbl_members(memName)values('$name')";
			$res = $this->db->insert($query);
			if($res){
				$sQ = "select memId from tbl_members where memName = '$name'";
				$res = $this->db->select($sQ)->fetch_assoc();
				$memId = $res['memId'];
				$tblQuery = "Alter table meal_tbl add memID_$memId varchar(255)";
				$this->db->insert($tblQuery);
				$insQuery = "update meal_tbl set memId_$memId = '$name' where mealId = '1'";
				$this->db->update($insQuery);
				$msg = "<span class='sucMsg'>Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='errMsg'>Couldn't Submit. Something Wrong!</span>";
				return $msg;
			}
		}
		
		public function getMemberList(){
			$query = "select * from tbl_members";
			$res = $this->db->select($query);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function delMembers($memDelId){
			$query = "delete from tbl_members where memId = '$memDelId'";
			$res = $this->db->del($query);
			if($res){
				$altTab = "alter table meal_tbl drop column memId_$memDelId";
				$this->db->del($altTab);
				$msg = "<span class='sucMsg'>Deleted Successfully.</span>";
				return $msg;
			}else{
				return false;
			}
		}
		
		public function getMemberbyId($memEditId){
			$query = "select * from tbl_members where memId = '$memEditId' limit 1";
			$res = $this->db->select($query);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function updateMember($memData,$memEditId){
			$name = mysqli_real_escape_string($this->db->link,$memData['name']);
			
			$name = $this->fm->validate($name);
			
			if(empty($name)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}
			
			$query = "update tbl_members set memName = '$name' where memId = '$memEditId'";
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