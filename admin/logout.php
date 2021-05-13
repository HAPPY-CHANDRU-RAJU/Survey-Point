<?php

	session_start();
	
	require_once 'dbconnect.php';
	if (!isset($_SESSION['SP_Admin_Ext'])) {
		header("Location: login.php");
	} 
	
	if (isset($_GET['logout'])&&isset($_SESSION['SP_Admin_Ext'])) {

		unset($_SESSION['SP_Admin_Ext']);
		session_unset();
		session_destroy();
		header("Location: login.php");
		exit;
	}
	
	?>
