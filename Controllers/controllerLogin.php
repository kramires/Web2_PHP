<?php 
	require_once '../Database.php';  
	$conexao = new Database();

	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];



	$sql = "select * from tb_usuario where login='$login'";
	$result = mysqli_query($conexao->conecta(),$sql);

	$line = mysqli_num_rows($result);

	if ($line==0) {
		header('Location: ../controller/controllerAtendente.php?.login='.$login.'$senha='.$senha.'&nome='.$nome.'email='.$email.'&telefone'.$telefone);
	}
	else{
		header('Location:../views/cadastroAtendente.php');
	}
 ?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

