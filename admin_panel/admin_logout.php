<?php
	include('../DBconfig.php');

	unset($_SESSION);
	session_destroy();

	header('Location: ../Account/admin.php');
?>