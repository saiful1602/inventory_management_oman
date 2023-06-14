<?php
	include('DBconfig.php');

	unset($_SESSION);
	session_destroy();

	header('Location: Account/Login.php');
?>