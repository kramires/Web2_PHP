<?php 
    session_start();
    require_once '../Login/checkSession.php';
    require_once '../Model/Entidades/Aeroporto.php';
    require_once '../DB/Database.php';
    require_once '../Model/DAO/AeroportoDao.php';
    require_once '../Controllers/controllerAeroporto.php';  
   
   
    $btn = $_GET['btn'];
    $idtb_aeroporto = $_GET["id"];
    $aeroporto = new  Aeroporto();
    $aeroporto-> setIdtb_aeroporto($idtb_aeroporto);
    
    $conexao = new Database();
    $aeroDao = new  AeroportoDao($conexao->conecta());
    $aero = new  Aeroporto();
    $aero =  $aeroDao->buscarId($aeroporto);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Cadastro de Aeroportos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../Views/menu.php';
    ?>
	<div class="card" style="margin:10px">
            <div class="card-header">
            <h5 class="card-title">Cadastro de Aeroportos</h5>
        </div>
	<div class="card-body">	
             <form method="GET" action="../Controllers/controllerAeroporto.php">
            <div class="form-group">
                <label>Código</label>
                <input type="text" class="form-control"  name= "codigo" value="<?=$aero->getCodigo();?>" placeholder="Digite o código do Aeroporto">
            </div>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" value="<?=$aero->getNome();?>" placeholder="Digite o nome do Aeroporto">
            </div>
            <div class="form-group">
                <label>Localização</label>
                <input type="text" class="form-control" name="localizacao" value="<?=$aero->getLocalizacao();?>" >
            </div>
            
              <?php 
              
              if ($idtb_aeroporto){
                  $opcao = "upd";
                  $nome = "Atualizar";
              }
              else {
                  $opcao = "add";
                  $nome = "Salvar";
              }
              ?>
              	<input type="hidden" name="id" value="<?=$idtb_aeroporto; ?>"/>
              	<button type="submit" class="btn btn-primary" name="btn" value="<?=$opcao;?>"><?=$nome;?></button>
              	
            </form>		
		
		</div>
	</div>	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>