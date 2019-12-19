<?php 
    session_start();
    require_once '../Login/checkSession.php';
    require_once '../Model/Entidades/Aviao.php';
    require_once '../DB/Database.php';
    require_once '../Model/DAO/AviaoDao.php';
    require_once '../Controllers/controllerAviao.php';    
   
    $btn = $_GET['btn'];
    $idtb_aviao = $_GET["id"];
    $aviao = new  Aviao();
    $aviao-> setIdtb_aviao($idtb_aviao);
    
    $conexao = new Database();
    $aDao = new  AviaoDao($conexao->conecta());
    $avi = new  Aviao();
    $avi =  $aDao->buscarId($aviao);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Cadastro de Aviões</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
     <?php
        include '../Views/menu.php';
    ?>
	<div class="card" style="margin:10px">
            <div class="card-header">
            <h5 class="card-title">Cadastro de Avi&otilde;es</h5>
        </div>
	<div class="card-body">	
             <form method="GET" action="../Controllers/controllerAviao.php">
            <div class="form-group">
                <label>Número</label>
                <input type="number" class="form-control"  name= "numero" value="<?=$avi->getNumero();?>">
            </div>
            <div class="form-group">
                <label>Fabricante</label>
                <input type="text" class="form-control" name="fabricante" value="<?=$avi->getFabricante();?>" placeholder="Embraer">
            </div>
            <div class="form-group">
                <label>Capacidade</label>
                <input type="number" class="form-control" name="capacidade" value="<?=$avi->getCapacidade();?>" >
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <input type="text" class="form-control" name="tipo" value="<?=$avi->getTipo();?>" placeholder="Tipo">
            </div>
              <?php 
              
              if ($idtb_aviao){
                  $opcao = "upd";
                  $nome = "Atualizar";
              }
              else {
                  $opcao = "add";
                  $nome = "Salvar";
              }
              ?>
              	<input type="hidden" name="id" value="<?= $idtb_aviao?>"/>
              	<button type="submit" class="btn btn-primary" name="btn" value="<?=$opcao;?>"><?=$nome;?></button>
              	
            </form>		
		
		</div>
	</div>	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>