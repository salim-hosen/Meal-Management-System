<?php
	class Format{
		
		public function validate($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			$data = stripcslashes($data);
			return $data;
		}
		
		public function formatDate($data){
			$data = strtotime($data);
			return date("d M Y",$data);
		}
	}
?>