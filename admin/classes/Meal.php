<?php
	class Meal{
		private $db;
		private $fm;
		private $mem;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			$this->mem = new Member();
		}
		
		public function addMeal($mealInfo){
			$date = mysqli_real_escape_string($this->db->link,$mealInfo['date']);
			
			$sq = "select * from meal_tbl where date = '$date'";
			if($this->db->select($sq)){
				$msg = "<span class='errMsg'>Already Submitted for this Date.</span>";
				return $msg;
			}
			
			$insDate = "insert into meal_tbl(date)values('$date')";
			$this->db->insert($insDate);
			
			$res = $this->mem->getMemberList();
				if($res){
					while($value = $res->fetch_assoc()){
						$memId = $value['memId'];
						$meal = $mealInfo[$memId];
						$upQuery = "update meal_tbl set memID_$memId = '$meal' where date = '$date'";
						$upRes = $this->db->update($upQuery);
					}
					if($upRes){
						$msg = "<span class='sucMsg'>Inserted Successfully.</span>";
						return $msg;
					}
				}
		}
		
		public function delMeal($mDelID){
			$query = "Alter table meal_tbl drop column memID_$mDelID";
			$res = $this->db->del($query);
			if($res){
				$msg = "<span class='sucMsg'>Deleted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='errMsg'>Couldn't Delete</span>";
				return $msg;
			}
		}
		
		public function getMealbyId($chkId){
			$query = "select mealId,date,memID_$chkId from meal_tbl order by date desc";
			$res = $this->db->select($query);
			return $res;
		}
		
		public function updateMeal($upInfo,$chkId){
			$end = mysqli_real_escape_string($this->db->link,$upInfo['i'])-1;
			$i = 1;
			while($i <= $end){
				$fieldName = "name".$i;
				$value = mysqli_real_escape_string($this->db->link,$upInfo[$fieldName]);
				$mealId = mysqli_real_escape_string($this->db->link,$upInfo[$i]);
				
				$query = "update meal_tbl set memID_$chkId = '$value' where mealId = '$mealId'";
				$res = $this->db->update($query);
				$i++;
			}
			
			if($i == $end+1){
				$msg = "<span class='sucMsg'>Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='errMsg'>Couldn't Update.</span>";
				return $msg;
			}
		}
	}
?>