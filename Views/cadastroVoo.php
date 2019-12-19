<?php
 session_start();
require_once '../Login/checkSession.php';
require_once '../DB/Database.php';
require_once '../Model/Entidades/Voo.php';
require_once '../Model/DAO/VooDao.php';
require_once '../Controllers/controllerVoo.php';
require_once '../Model/Entidades/Aeroporto.php';
require_once '../Model/DAO/AeroportoDao.php';
require_once '../Model/Entidades/Aviao.php';
require_once '../Model/DAO/AviaoDao.php';



$idtb_voo = $_GET["id"];
$voo = new Voo();
$voo->setIdtb_voo($idtb_voo);

$conexao = new Database();
$vooDao = new VooDao($conexao->conecta());
$v = new Voo();
$v = $vooDao->buscarId($voo);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="Content-Type"
              content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Cadastro de Voos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include '../Views/menu.php';
        ?>

        <div class="card" style="margin:10px">
            <div class="card-header">
                <h5 class="card-title">Cadastro de Voos</h5>
            </div>
            <div class="card-body">	
                <form method="GET" action="../Controllers/controllerVoo.php">
                    <div class="form-group">
                        <label>Número</label>
                        <input type="number" class="form-control"  name= "numero" value="<?= $v->getNumero(); ?>" placeholder="Digite o número do Voo">
                    </div>
                    <div class="form-group">
                        <label>Companhia</label>
                        <input type="text" class="form-control" name="companhia" value="<?= $v->getCompanhia(); ?>" placeholder="Digite o nome da Companhia">
                    </div>
                    <div class="form-group">
                        <label>Horário</label>
                        <input type="text" class="form-control" name="horario" value="<?= $v->getHorario(); ?>" placeholder="00:00" >
                    </div>
                    <div class="form-group">
                        <label>Origem</label>
                        <select name="origem">
                            <?php
                            $lista = array();
                            $conexao = new Database();
                            $aeroDao = new AeroportoDao($conexao->conecta());
                            $lista = $aeroDao->buscarTodos();
                            $aero = new Aeroporto();

                            if ($idtb_voo) {
                                foreach ($lista as $aero) {

                                    if (($aero->getIdtb_aeroporto()) == ($v->getOrigem()->getIdtb_aeroporto())) {
                                        ?>
                                        <option value="<?= $aero->getIdtb_aeroporto(); ?>" selected><?= $aero->getNome() ?></option>
                                        <?php
                                    } else {
                                        ?>		
                                        <option value="<?= $aero->getIdtb_aeroporto(); ?>"><?= $aero->getNome() ?></option>   
                                        <?php
                                    }
                                }
                            } else {
                                foreach ($lista as $aero) {
                                    ?>

                                    <option  value="<?= $aero->getIdtb_aeroporto(); ?>"><?= $aero->getNome() ?></option> 

                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Avião</label>
                        <select name="aviao">
                            <?php
                            $lista = array();
                            $conexao = new Database();
                            $avDao = new AviaoDao($conexao->conecta());
                            $lista = $avDao->buscarTodos();
                            $av = new Aviao();

                            if ($idtb_aviao) {
                                foreach ($lista as $av) {

                                    if (($av->getIdtb_aeroporto()) == ($v->getAviao()->getIdtb_aviao())) {
                                        ?>
                                        <option value="<?= $av->getIdtb_aviao(); ?>" selected><?= $av->getNumero() ?></option>
                                        <?php
                                    } else {
                                        ?>		
                                        <option value="<?= $av->getIdtb_aviao(); ?>"><?= $av->getNumero() ?></option>   
                                        <?php
                                    }
                                }
                            } else {
                                foreach ($lista as $av) {
                                    ?>
                                    <option  value="<?= $av->getIdtb_aviao(); ?>"><?= $av->getNumero() ?></option> 
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Destino</label>
                        <select name="destino">
                            <?php
                            $lista = array();
                            $conexao = new Database();
                            $aeroDao = new AeroportoDao($conexao->conecta());
                            $lista = $aeroDao->buscarTodos();
                            $aero = new Aeroporto();

                            if ($idtb_voo) {
                                foreach ($lista as $aero) {

                                    if (($aero->getIdtb_aeroporto()) == ($v->getDestino()->getIdtb_aeroporto())) {
                                        ?>
                                        <option value="<?= $aero->getIdtb_aeroporto(); ?>" selected><?= $aero->getNome() ?></option>
                                        <?php
                                    } else {
                                        ?>		
                                        <option value="<?= $aero->getIdtb_aeroporto(); ?>"><?= $aero->getNome() ?></option>   
                                        <?php
                                    }
                                }
                            } else {
                                foreach ($lista as $aero) {
                                    ?>

                                    <option  value="<?= $aero->getIdtb_aeroporto(); ?>"><?= $aero->getNome() ?></option> 

                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <?php
                    if ($idtb_voo) {
                        $opcao = "upd";
                        $nome = "Atualizar";
                    } else {
                        $opcao = "add";
                        $nome = "Salvar";
                    }
                    ?>
                    <input type="hidden" name="id" value="<?=$idtb_voo; ?>"/>
                    <button type="submit" class="btn btn-primary" name="btn" value="<?=$opcao; ?>"><?= $nome; ?></button>

                </form>		

            </div>
        </div>	

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>