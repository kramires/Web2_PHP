<?php
session_start();
require_once '../Login/checkSession.php';
require_once '../DB/Database.php';
require_once '../Model/Entidades/Pessoa.php';
require_once '../Model/DAO/PessoaDao.php';
require_once '../Model/Entidades/Aviao.php';
require_once '../Model/DAO/AviaoDao.php';
require_once '../Model/Entidades/Aeroporto.php';
require_once '../Model/DAO/AeroportoDao.php';
require_once '../Model/DAO/VooDao.php';
require_once '../Model/Entidades/Voo.php';
require_once '../Model/Entidades/Passagem.php';
require_once '../Model/DAO/PassagemDao.php';
require_once '../Model/Entidades/Cliente.php';
require_once '../Model/DAO/ClienteDao.php';
require_once '../Model/Entidades/Atendente.php';
require_once '../Model/DAO/AtendenteDao.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Lista de Passagem Aérea</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../Views/menu.php';
    ?>
	<div class="card" style="margin:10px">
			
		<div class="card-header">
			<h5 class="card-title">Listagem de Passagens</h5>				  			
	   	</div>
		<div class="card-body">	
		
			<table class="table">
			  <thead>
			    <tr>
			      <th>Número</th>
			      <th>Data</th>
			      <th>Classe</th>
                              <th>Poltrona</th>
                              <th>Preço</th>
                              <th>Voo</th>
                              <th>Cliente</th>
                              <th>Atendente</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php

			$lista = array();
        		$conexao = new Database();
        		$passagemDao = new PassagemDao($conexao->conecta());
                        
        		$lista = $passagemDao->buscarTodos();
        		$passagem = new Passagem();
                        
        		foreach ($lista as $passagem){
			  ?>
				<tr>
                                    <td><?php echo $passagem->getNumero(); ?></td>	
                                    <td><?php echo $passagem->getData(); ?></td>
                                    <td><?php echo $passagem->getClasse(); ?></td>
                                    <td><?php echo $passagem->getPoltrona(); ?></td>
                                    <td><?php echo $passagem->getPreco(); ?></td>
                                    <td><?php echo $passagem->getVoo()->getDestino()->getCodigo(); ?></td>
                                    <td><?php echo $passagem->getCliente()->getPessoa()->getNome(); ?></td>
                                    <td><?php echo $passagem->getAtendente()->getPessoa()->getNome(); ?></td>
					
                                    <td>						  		  	
                                        <a class="btn btn-sm btn-primary" href="../Controllers/controllerPassagem.php?btn=edt&id=<?=$passagem->getIdtb_passagem(); ?>">Editar</a>	
                                        <a class="delete btn btn-sm btn-danger" href="../Controllers/controllerPassagem.php?btn=rmv&id=<?=$passagem->getIdtb_passagem(); ?>">Excluir</a>
                                        <a class="btn-sm btn-info" href="../Views/pdfPassagem.php?id=<?=$passagem->getIdtb_passagem(); ?>">Imprimir</a>
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