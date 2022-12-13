<?php
error_reporting(0);
session_start();
function pathTo($destination){
	echo "<script>window.location.href = './$destination.php'</script>";
}
if($_SESSION['login'] == 'incorrect' || empty($_SESSION['login'])){

			$_SESSION['login'] = 'incorrect';

			pathTo('login');
			}
?>