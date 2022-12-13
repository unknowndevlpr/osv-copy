<?php

	error_reporting(0);
	session_start();

	function pathTo($destination){
		echo "<script>window.location.href = './$destination.php'</script>";
	}
		session_destroy();
		pathTo('login');
	
?>