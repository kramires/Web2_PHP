<?php
session_start();
require_once '../Login/checkSession.php';
require_once '../DB/Database.php';
require_once '../Model/Entidades/Pessoa.php';
require_once '../Model/Entidades/Atendente.php';
require_once '../Model/DAO/AtendenteDao.php';
require_once '../Model/DAO/PessoaDao.php';




$idtb_pessoa = $_GET["id"];
$conexao = new Database();
$atendeDao = new AtendenteDao($conexao->conecta());
$atendente = new Atendente();

$pessoaDao = new PessoaDao($conexao->conecta());
$pes = new Pessoa();
$pes->setId($idtb_pessoa);

$p = new Pessoa();
$p = $pessoaDao->buscarId($pes);
$atendente->setPessoa($p);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="Content-Type"
              content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Cadastro de Atendente</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include '../Views/menu.php';
        ?>
        <div class="card" style="margin:10px">
            <div class="card-header">
                <h5 class="card-title">Cadastro de Atendente</h5>
            </div>
            <?php
            if ($erro) {
                ?>		
                <div class="alert alert-danger" role="alert"> Login já existente!!</div>
                <?php
            }
            ?>

            <div class="card-body">	
                <form method="GET" action="../Controllers/controllerAtendente.php">
                     <div class="form-group">
                        <label>Código Funcional</label>
                        <input type="number" class="form-control"  name= "codigoFuncional" value="<?=$atendente->getCodigoFuncional(); ?>" placeholder="Digite seu Código Funcional">
                    </div>
                    
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control"  name= "login" value="<?=$atendente->getLogin(); ?>" placeholder="Digite seu login">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="senha" value="<?=$atendente->getSenha(); ?>" placeholder="Digite a Senha">
                    </div>

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?= $atendente->getPessoa()->getNome(); ?>" placeholder="Digite o nome completo">
                    </div>
                    
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="cpf" value="<?= $atendente->getPessoa()->getCpf(); ?>" placeholder="Digite o CPF aqui">
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?= $atendente->getPessoa()->getEndereco(); ?>" placeholder="Av, Rua, Estrada, Nr, Bairro, Cidade ">
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="fone" value="<?= $atendente->getPessoa()->getFone(); ?>" placeholder="(DD) 9999-9999">
                    </div>

                    <?php
                    if ($idtb_pessoa) {
                        $opcao = "upd";
                        $nome = "Atualizar";
                    } else {
                        $opcao = "add";
                        $nome = "Salvar";
                    }
                    ?>
                    <input type="hidden" name="id" value="<?=$idtb_pessoa; ?>"/>
                    <button type="submit" class="btn btn-primary" name="btn" value="<?=$opcao; ?>"><?= $nome; ?></button>

                </form>		

            </div>
        </div>	

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>




