<?php
	class Database{
		private $db_user = DB_USER;
		private $db_name = DB_NAME;
		private $db_pass = DB_PASS;
		private $db_host = DB_HOST;
		public $link;

		
		public function __construct(){
			$this->dbCon();
		}
		
		public function dbCon(){
			$this->link = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if(!isset($this->link)){
				echo "Error Connection".$this->link->connect_error();
			}
		}
		
		public function select($query){
			$res = $this->link->query($query)or die("Connection Fail".$this->link->error.__LINE__);
			if(mysqli_num_rows($res)>0){
				return $res;
			}else{
				return false;
			}
		}
		public function insert($query){
			$res = $this->link->query($query)or die("Connection Fail".$this->link->error.__LINE__);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function update($query){
			$res = $this->link->query($query)or die("Connection Fail".$this->link->error.__LINE__);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function del($query){
			$res = $this->link->query($query)or die("Connection Fail".$this->link->error.__LINE__);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
	}
?>