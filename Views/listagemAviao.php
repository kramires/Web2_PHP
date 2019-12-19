<?php
    session_start();
    require_once '../Login/checkSession.php';
    require_once '../Model/Entidades/Aviao.php';
    require_once '../DB/Database.php';
    require_once '../Model/DAO/AviaoDao.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Lista de Aviões</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../Views/menu.php';
    ?>
	<div class="card" style="margin:10px">
			
		<div class="card-header">
			<h5 class="card-title">Listagem de Avi&otilde;es</h5>				  			
	   	</div>
		<div class="card-body">	
		
			<table class="table">
			  <thead>
			    <tr>
			      <th>ID</th>
			      <th>Número</th>
			      <th>Fabricante</th>
			      <th>Capacidade</th>
                              <th>Tipo</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php

			$lista = array();
        		$conexao = new Database();
        		$aDao = new AviaoDao($conexao->conecta());
        		$lista = $aDao->buscarTodos();
        		$avi = new Aviao();
        		foreach ($lista as $avi){
			  ?>
			
				<tr>
				      <td><?php echo $avi->getIdtb_aviao(); ?></td>	
                                      <td><?php echo $avi->getNumero(); ?></td>
                                      <td><?php echo $avi->getFabricante(); ?></td>
                                      <td><?php echo $avi->getCapacidade(); ?></td>
                                      <td><?php echo $avi->getTipo(); ?></td>
					  <td>						  		  	
                                              <a class="btn btn-sm btn-primary" href="../Controllers/controllerAviao.php?btn=edt&id=<?=$avi->getIdtb_aviao();?>">Editar</a>	
                                              <a class="delete btn btn-sm btn-danger" href="../Controllers/controllerAviao.php?btn=rmv&id=<?=$avi->getIdtb_aviao();?>">Excluir</a>
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