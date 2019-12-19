<?php

	require_once '../DB/Database.php';
	$conexao = new Database();

	$login = $_POST["login"];
	$senha = $_POST["senha"];

	$sql = "select * from tb_atendente where login='{$login}' and senha='{$senha}'";
	$result = mysqli_query($conexao->conecta(),$sql);
	$linhas = mysqli_num_rows($result);

	if ($linhas == 0) {
		header('Location: ../Views/viewLogin.php');
		exit;
	}

	session_start();
	$row = mysqli_fetch_assoc($result);
	$_SESSION['logado'] = true;
	$_SESSION['codigoFuncional'] = $row['codigoFuncional'];
	$_SESSION['login'] = $row['login'];
	header('Location: ../Views/Home.php');
?>

