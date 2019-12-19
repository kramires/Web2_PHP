<?php 
	session_start();
	$_SESSION['LOGADO'] = false;
	session_destroy();
	header('Location: ../Views/viewLogin.php');

 ?>


