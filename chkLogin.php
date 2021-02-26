<?php
	if(Session::get("usrLogin") == false){
		echo "<script>window.location='login.php'</script>";
	}
?>