<?php
	error_reporting(0);
	session_start();

		unset($_SESSION['login']);
		unset($_SESSION["lastname"]);
        unset($_SESSION["firstname"]);
        unset($_SESSION["middlename"]);
        unset($_SESSION["email"]);
        unset($_SESSION["dateofbirth"]);
        unset($_SESSION["age"]);
        unset($_SESSION["gender"]);
        unset($_SESSION["placeofbirth"]);
        unset($_SESSION["civilstatus"]);
        unset($_SESSION["address"]);
        unset($_SESSION["contact"]);
        unset($_SESSION["userid"]);

	function pathTo($destination){
		echo "<script>window.location.href = './$destination.php'</script>";
	}	
		pathTo('login');
	
?>