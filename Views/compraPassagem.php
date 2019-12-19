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

$btn = $_GET['btn'];
$idtb_passagem = $_GET["id"];
$passagem = new Passagem();
$passagem->setIdtb_passagem($idtb_passagem);

$conexao = new Database();
$pDao = new PassagemDao($conexao->conecta());
$p = new Passagem();
$p = $pDao->buscarId($passagem);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="Content-Type"
              content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Passagem Aérea</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include '../Views/menu.php';
        ?>
        <div class="card" style="margin:10px">
            <div class="card-header">
                <h5 class="card-title">Compra de Passagem</h5>
            </div>
            <div class="card-body">	
                <form method="GET" action="../Controllers/controllerPassagem.php">
                    <div class="form-group">
                        <label>Número</label>
                        <input type="number" class="form-control"  name= "numero" value="<?= $p->getNumero(); ?>" placeholder="Digite o número da Passagem">
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input type="date" class="form-control" name="data" value="<?= $p->getData(); ?>" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="form-group">
                        <label>Classe</label>
                        <input type="text" class="form-control" name="classe" value="<?= $p->getClasse(); ?>" placeholder="Ex: Executiva" >
                    </div>
                    <div class="form-group">
                        <label>Poltrona</label>
                        <input type="text" class="form-control" name="poltrona" value="<?= $p->getPoltrona(); ?>" placeholder="Ex: 14C" >
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input type="text" class="form-control" name="preco" value="<?= $p->getPreco(); ?>" placeholder="Ex: 850.00" >
                    </div>
                    
                    <div class="form-group">
                        <label>Voo</label>
                        <select name="voo">
                            <?php
                            $lista = array();
                            $conexao = new Database();
                            $vooDao = new VooDao($conexao->conecta());
                            $lista = $vooDao->buscarTodos();
                            $voo = new Voo();
                            
                            foreach ($lista as $voo) {
                                if ($idtb_passagem) {
                                    if (($voo->getIdtb_voo()) == ($p->getVoo()->getIdtb_voo())) {
                                        if (($voo->getIdtb_voo()) == ($p->getVoo()->getIdtb_voo())) {
                                        ?>
                                            <option value="<?= $voo->getIdtb_voo(); ?>" selected><?= $voo->getNumero() . " - " . $voo->getCompanhia().
                                            " - " . $voo->getHorario() . " - " . $voo->getOrigem()->getCodigo() . " - " . $voo->getAviao()->getTipo() . " - " . 
                                            $voo->getDestino()->getCodigo(); ?></option>
                                                <?php
                                            } else {
                                                ?>		
                                                <option value="<?= $voo->getIdtb_voo(); ?>" selected><?= $voo->getNumero() . " - " . $voo->getCompanhia().
                                            " - " . $voo->getHorario() . " - " . $voo->getOrigem()->getCodigo() . " - " . $voo->getAviao()->getTipo() . " - " . 
                                            $voo->getDestino()->getCodigo(); ?></option>   
                                                <?php
                                            }
                                    }
                                } else{
                                    ?>
                                        <option  value="<?= $voo->getIdtb_voo(); ?>" selected><?= $voo->getNumero() . " - " . $voo->getCompanhia().
                                    " - " . $voo->getHorario() . " - " . $voo->getOrigem()->getCodigo() . " - " . $voo->getAviao()->getTipo() . " - " . 
                                    $voo->getDestino()->getCodigo(); ?></option> 
                                    <?php
                                }
                            } 
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Cliente</label>
                        <select name="cliente">
                            <?php
                            $lista = array();
                            $conexao = new Database();
                            $clienteDao = new ClienteDao($conexao->conecta());
                            $lista = $clienteDao->buscarTodos();
                            $cliente = new Cliente();

                            if ($idtb_passagem) {
                                foreach ($lista as $cliente) {

                                    if (($cliente->getPessoa()->getId()) == ($p->getCliente()->getPessoa()->getId())) {
                                        ?>
                            <option value="<?= $cliente->getPessoa()->getId(); ?>" selected><?= $cliente->getPessoa()->getNome(). " - " .
                                    $cliente->getPessoa()->getCpf()?></option>
                                        <?php
                                    } else {
                                        ?>		
                                        <option value="<?= $cliente->getPessoa()->getId(); ?>" selected><?= $cliente->getPessoa()->getNome(). " - " .
                                    $cliente->getPessoa()->getCpf()?></option>   
                                        <?php
                                    }
                                }
                            } else {
                                foreach ($lista as $cliente) {
                                    ?>
                                    <option  value="<?= $cliente->getPessoa()->getId(); ?>" selected><?= $cliente->getPessoa()->getNome(). " - " .
                                    $cliente->getPessoa()->getCpf()?></option> 
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Atendente</label>
                        <select name="atendente">
                            <?php
                            $lista = array();
                            $conexao = new Database();
                            $AtendeDao = new AtendenteDao($conexao->conecta());
                            $lista = $AtendeDao->buscarTodos();
                            $atende = new Atendente();

                            if ($idtb_voo) {
                                foreach ($lista as $atende) {
                                    if (($atende->getPessoa()->getId()) == ($p->getAtendente()->getPessoa()->getId())) {
                                        ?>
                            <option value="<?=$atende->getPessoa()->getId(); ?>" selected><?= $atende->getPessoa()->getNome(). " - " .
                                    $atende->getPessoa()->getCpf()?></option>
                                        <?php
                                    } else {
                                        ?>		
                                        <option value="<?=$atende->getPessoa()->getId(); ?>" selected><?= $atende->getPessoa()->getNome(). " - " .
                                    $atende->getPessoa()->getCpf()?></option>   
                                        <?php
                                    }
                                }
                            } else {
                                foreach ($lista as $atende) {
                                    ?>
                                    <option  value="<?=$atende->getPessoa()->getId(); ?>" selected><?= $atende->getPessoa()->getNome(); ?></option> 
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <?php
                    if ($idtb_passagem) {
                        $opcao = "upd";
                        $nome = "Atualizar";
                    } else {
                        $opcao = "add";
                        $nome = "Salvar";
                    }
                    ?>
                    <input type="hidden" name="id" value="<?=$idtb_passagem ?>"/>
                    <button type="submit" class="btn btn-primary" name="btn" value="<?=$opcao; ?>"><?= $nome; ?></button>

                </form>		

            </div>
        </div>	

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>