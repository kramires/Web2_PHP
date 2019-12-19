<?php
    session_start();
    require_once '../Login/checkSession.php';
    require_once '../DB/Database.php';
    require_once '../Model/Entidades/Aeroporto.php';
    require_once '../Model/DAO/AeroportoDao.php';
    require_once '../Model/Entidades/Voo.php';
    require_once '../Model/DAO/VooDao.php';
    require_once '../Model/Entidades/Aviao.php';
    require_once '../Model/DAO/AviaoDao.php';
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Lista de Vôos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../Views/menu.php';
    ?>
	<div class="card" style="margin:10px">
			
		<div class="card-header">
			<h5 class="card-title">Listagem de Vôos</h5>				  			
	   	</div>
		<div class="card-body">	
		
			<table class="table">
			  <thead>
			    <tr>
			      <th>Número</th>
			      <th>Companhia</th>
			      <th>Horário</th>
			      <th>Origem</th>
                              <th>Destino</th>
                              <th>Avião</th>
                              <th>Capacidade</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php

			$lista = array();
        		$conexao = new Database();
        		$vooDao = new VooDao($conexao->conecta());
        		$lista = $vooDao->buscarTodos();
        		$voo = new Voo();
                        
        		foreach ($lista as $voo){
			  ?>
				<tr>
                                    <td><?php echo $voo->getNumero(); ?></td>	
                                    <td><?php echo $voo->getCompanhia(); ?></td>
                                    <td><?php echo $voo->getHorario(); ?></td>
                                    <td><?php echo $voo->getOrigem()->getNome(); ?></td>
                                    <td><?php echo $voo->getDestino()->getNome(); ?></td>
                                    <td><?php echo $voo->getAviao()->getNumero(); ?></td>
                                    <td><?php echo $voo->getAviao()->getCapacidade(); ?></td>
                                    
					  <td>						  		  	
                                              <a class="btn btn-sm btn-primary" href="../Controllers/controllerVoo.php?btn=edt&id=<?=$voo->getIdtb_voo();?>">Editar</a>	
                                              <a class="delete btn btn-sm btn-danger" href="../Controllers/controllerVoo.php?btn=rmv&id=<?=$voo->getIdtb_voo();?>">Excluir</a>
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