<?php
session_start();
    require_once '../Login/checkSession.php';
    require_once '../Model/Entidades/Aeroporto.php';
    require_once '../DB/Database.php';
    require_once '../Model/DAO/AeroportoDao.php';
    include '../Views/menu.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Lista de Aeroportos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="card" style="margin:10px">
			
		<div class="card-header">
			<h5 class="card-title">Listagem de Aeroportos</h5>				  			
	   	</div>
		<div class="card-body">	
		
			<table class="table">
			  <thead>
			    <tr>
			      <th>ID</th>
			      <th>Código</th>
			      <th>Nome</th>
			      <th>Localização</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php

			$lista = array();
        		$conexao = new Database();
        		$aeroDao = new AeroportoDAO($conexao->conecta());
        		$lista = $aeroDao->buscarTodos();
        		$aero = new Aeroporto();
        		foreach ($lista as $aero){
			  ?>
			
				<tr>
                                    <td><?php echo $aero->getIdtb_aeroporto(); ?></td>	
                                    <td><?php echo $aero->getCodigo(); ?></td>
                                    <td><?php echo $aero->getNome(); ?></td>
                                    <td><?php echo $aero->getLocalizacao(); ?></td>
					  <td>						  		  	
                                              <a class="btn btn-sm btn-primary" href="../Controllers/controllerAeroporto.php?btn=edt&id=<?=$aero->getIdtb_aeroporto();?>">Editar</a>	
                                              <a class="delete btn btn-sm btn-danger" href="../Controllers/controllerAeroporto.php?btn=rmv&id=<?=$aero->getIdtb_aeroporto();?>">Excluir</a>
					  </td>
				</tr>	
            	<?php	      
        		 }
				?>	
			</tbody>
			</table>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>