<?php
    session_start();
    require_once '../Login/checkSession.php';
    require_once '../Model/Entidades/Cliente.php';
    require_once '../Model/Entidades/Pessoa.php';
    require_once '../DB/Database.php';
    require_once '../Model/DAO/ClienteDao.php';
    require_once '../Model/DAO/PessoaDao.php';
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Lista de Clientes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../Views/menu.php';
    ?>
	<div class="card" style="margin:10px">
		<div class="card-header">
			<h5 class="card-title">Listagem de Clientes</h5>
		</div>
		<div class="card-body">	
		
			<table class="table">
			  <thead>
			    <tr>
			      <th>Passaporte</th>
			      <th>Nome</th>
			      <th>Nacionalidadec</th>
			      <th>CPF</th>
			      <th>Telefone</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php

    			  $listaTodos = array();
    			  $conexao = new Database();
    			  $cliDao = new ClienteDao($conexao->conecta());
    	    			  
    			  $listaTodos = $cliDao->buscarTodos();
    			  $c = new Cliente();
    			  foreach ($listaTodos as $c){
			  ?>
			
				<tr>
                                    <td><?php echo $c->getPassaporte(); ?></td>	
                                    <td><?php echo $c->getPessoa()->getNome(); ?></td>
                                    <td><?php echo $c->getNacionalidade(); ?></td> 
                                    <td><?php echo $c->getPessoa()->getCpf(); ?></td>
                                    <td><?php echo $c->getPessoa()->getFone(); ?></td>
					  <td>
                                              <a class="btn btn-sm btn-primary" href="../Controllers/controllerCliente.php?btn=edt&id=<?=$c->getPessoa()->getId();?>">Editar</a>	
                                              <a class="delete btn btn-sm btn-danger" href="../Controllers/controllerCliente.php?btn=rmv&id=<?=$c->getPessoa()->getId();?>">Excluir</a>
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