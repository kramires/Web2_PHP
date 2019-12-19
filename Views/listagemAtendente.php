<?php
    session_start();
    require_once '../Login/checkSession.php';
    require_once '../DB/Database.php';
    require_once '../Model/Entidades/Atendente.php';
    require_once '../Model/Entidades/Pessoa.php';
    require_once '../Model/DAO/AtendenteDao.php';
    require_once '../Model/DAO/PessoaDao.php';
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Lista de Atendentes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../Views/menu.php';
    ?>
	<div class="card" style="margin:10px">
		<div class="card-header">
			<h5 class="card-title">Listagem de Atendentes</h5>
		</div>
		<div class="card-body">	
		
			<table class="table">
			  <thead>
			    <tr>
			      <th>Código Funcional</th>
                              <th>Login</th>
			      <th>Nome</th>
			      <th>CPF</th>
			      <th>Telefone</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php

    			  $listaTodos = array();
    			  $conexao = new Database();
    			  $atDao = new AtendenteDao($conexao->conecta());
    	    			  
    			  $listaTodos = $atDao->buscarTodos();
    			  $a = new Atendente();
    			  foreach ($listaTodos as $a){
			  ?>
			
				<tr>
                                    <td><?php echo $a->getCodigoFuncional(); ?></td>
                                    <td><?php echo $a->getLogin(); ?></td> 
                                    <td><?php echo $a->getPessoa()->getNome(); ?></td>
                                    <td><?php echo $a->getPessoa()->getCpf(); ?></td>
                                    <td><?php echo $a->getPessoa()->getFone(); ?></td>
					  <td>
                                              <a class="btn btn-sm btn-primary" href="../Controllers/controllerAtendente.php?btn=edt&id=<?=$a->getPessoa()->getId();?>">Editar</a>	
                                              <a class="delete btn btn-sm btn-danger" href="../Controllers/controllerAtendente.php?btn=rmv&id=<?=$a->getPessoa()->getId();?>">Excluir</a>
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