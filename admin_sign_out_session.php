<?php
	error_reporting(0);
	session_start();
	
	unset($_SESSION['admin_login']);
	function pathTo($destination){
		echo "<script>window.location.href = './$destination.php'</script>";
	}
		
		pathTo('login');
	
?>