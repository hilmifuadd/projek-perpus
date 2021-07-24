<?php
	session_start();
	define('BASE_URL', 'http://localhost/PWLPerpus/');
	
	function check_login(){
		if(!isset($_SESSION['username'])){
			header("Location: http://localhost/PWLPerpus/login.php");
		}
	}
?>