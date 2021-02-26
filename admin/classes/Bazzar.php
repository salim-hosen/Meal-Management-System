<?php
	class Bazzar{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function addBazar($bazData,$bazImg){
			$name = mysqli_real_escape_string($this->db->link,$bazData['name']);
			$date = mysqli_real_escape_string($this->db->link,$bazData['date']);
			$amount = mysqli_real_escape_string($this->db->link,$bazData['amount']);
			
			$name = $this->fm->validate($name);
			$date = $this->fm->validate($date);
			$amount = $this->fm->validate($amount);
			
			$permitted = array("jpg","png","gif","jpeg");
			$file_name = $bazImg['img']['name'];
			$file_size = $bazImg['img']['size'];
			$tmp_name = $bazImg['img']['tmp_name'];
			
			$fileExt = explode(".",$file_name);
			$fileExt = end($fileExt);
			$fileExt = strtolower($fileExt);
			$uniqueName = substr(md5(time()),0,10);
			$uniqueName = $uniqueName.".".$fileExt;
			$folderName = "uploads/".$uniqueName;
			
			if(empty($name) || empty($date) || empty($amount) || empty($file_name)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}else if($file_size > 1048576){
				$msg = "<span class='errMsg'>Image Size too Big.</span>";
				return $msg;
			}else if(in_array($fileExt,$permitted)== false){
				$msg = "<span class='errMsg'>You can upload only ".implode(", ",$permitted)." Files.</span>";
				return $msg;
			}else{
				move_uploaded_file($tmp_name,$folderName);
				$query = "insert into tbl_bazar(bName,bDate,image,amount)values('$name','$date','$uniqueName','$amount')";
				$res = $this->db->insert($query);
				if($res){
					$msg = "<span class='sucMsg'>Bazar Added Successfully.</span>";
					return $msg;
				}else{
					$msg = "<span class='sucMsg'>Couldn't Added. Something Wrong.</span>";
					return $msg;
				}
			}
		}
		
		public function getBazDetails(){
			$query = "select * from tbl_bazar";
			$res = $this->db->select($query);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		public function delBazList($bDelId){
			$sQ = "select * from tbl_bazar where bazId = '$bDelId'";
			$sRes = $this->db->select($sQ);
			if($sRes){
				$value = $sRes->fetch_assoc();
				unlink("uploads/".$value['image']);
			}
			$query = "delete from tbl_bazar where bazId = '$bDelId'";
			$res = $this->db->del($query);
			if($res){
				$msg = "<span class='sucMsg'>Deleted Successfully.</span>";
				return $msg;
			}else{
				return false;
			}
		}
		public function getBazbyId($bEditId){
			$query = "select * from tbl_bazar where bazId = '$bEditId' limit 1";
			$res = $this->db->select($query);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function editBazar($bazData,$file,$bEditId){
			$name = mysqli_real_escape_string($this->db->link,$bazData['name']);
			$date = mysqli_real_escape_string($this->db->link,$bazData['date']);
			$amount = mysqli_real_escape_string($this->db->link,$bazData['amount']);
			
			$name = $this->fm->validate($name);
			$date = $this->fm->validate($date);
			$amount = $this->fm->validate($amount);
			
			$permitted = array("jpg","png","gif","jpeg");
			$file_name = $file['img']['name'];
			$file_size = $file['img']['size'];
			$tmp_name = $file['img']['tmp_name'];
			
			$fileExt = explode(".",$file_name);
			$fileExt = end($fileExt);
			$fileExt = strtolower($fileExt);
			$uniqueName = substr(md5(time()),0,10);
			$uniqueName = $uniqueName.".".$fileExt;
			$folderName = "uploads/".$uniqueName;
			
			if(empty($name) || empty($date) || empty($amount)){
				$msg = "<span class='errMsg'>Field Should not be Empty.</span>";
				return $msg;
			}else{
				if(empty($file_name)){
					$query = "update tbl_bazar set bName = '$name',bDate = '$date',amount = '$amount' where bazId = '$bEditId'";
					$res = $this->db->update($query);
					if($res){
						$msg = "<span class='sucMsg'>Updated Successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='errMsg'>Couldn't Updated.</span>";
						return $msg;
					}
				}else{
					if($file_size > 1048576){
						$msg = "<span class='errMsg'>Image Size too Big.</span>";
						return $msg;
					}else if(in_array($fileExt,$permitted)== false){
						$msg = "<span class='errMsg'>You can upload only ".implode(", ",$permitted)." Files.</span>";
						return $msg;
					}else{
						$sQ = "select * from tbl_bazar where bazId = '$bEditId'";
						$sRes = $this->db->select($sQ);
						if($sRes){
							$value = $sRes->fetch_assoc();
							unlink("uploads/".$value['image']);
						}
						move_uploaded_file($tmp_name,$folderName);
						$query = "update tbl_bazar set bName = '$name',bDate = '$date',image = '$uniqueName',amount = '$amount' where bazId = '$bEditId'";
						$res = $this->db->update($query);
						if($res){
							$msg = "<span class='sucMsg'>Updated Successfully.</span>";
							return $msg;
						}else{
							$msg = "<span class='errMsg'>Couldn't Updated.</span>";
							return $msg;
						}
					}
				}
			}
		}
		
		public function insertMonth(){
			$query = "select * from bazar_date";
			$res = $this->db->select($query);
			if(empty($res)){
				$i = 1;
				while($i<=31){
					$date = date("$i-m-Y");
					$insQuery = "insert into bazar_date(bDate)values('$date')";
					$this->db->insert($insQuery);
					$i++;
				}
			}
		}
		
		public function getBazarDate(){
			$query = "select * from bazar_date";
			$res = $this->db->select($query);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function updateBazDate($bdInfo){
			$i = 1;
			while($i<=31){
				$name = mysqli_real_escape_string($this->db->link,$bdInfo["name".$i]);
				$status = mysqli_real_escape_string($this->db->link,$bdInfo["status".$i]);
				$name = $this->fm->validate($name);
				$status = $this->fm->validate($status);
				
				$query = "update bazar_date set bdName = '$name', bdStatus = '$status' where bdId = '$i'";
				$res = $this->db->update($query);
				$i++;
			}
			
			if($i==32){
				$msg = "<span class='sucMsg'>Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='errMsg'>Couldn't Updated.</span>";
				return $msg;
			}
		}
	}
?>