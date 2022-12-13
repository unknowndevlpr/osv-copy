<?php
error_reporting(0);
session_start();
function pathTo($destination){
	echo "<script>window.location.href = './$destination.php'</script>";
}
if($_SESSION['admin_login'] == 'incorrect' || empty($_SESSION['admin_login'])){

			$_SESSION['admin_login'] = 'incorrect';	
	
			pathTo('login');
			}
?>