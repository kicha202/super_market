<?php
	include "database.php";
	session_start();
	unset ($_SESSION["user1"]);	
	unset ($_SESSION["id"]);	
	session_destroy();
	echo "<script>window.open('../index.php','_self')</script>";
?>