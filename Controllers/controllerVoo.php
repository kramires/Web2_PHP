<?php
require_once '../DB/Database.php';
require_once '../Model/DAO/AeroportoDao.php';
require_once '../Model/Entidades/Aeroporto.php';
require_once '../Model/Entidades/Aviao.php';
require_once '../Model/DAO/AviaoDao.php';
require_once '../Model/Entidades/Voo.php';
require_once '../Model/DAO/VooDao.php';


$numero = $_GET["numero"];
$companhia = $_GET["companhia"];
$horario = $_GET["horario"];
$origem = $_GET["origem"];
$destino = $_GET["destino"];
$btn = $_GET["btn"];
$aviao = $_GET["aviao"];
$idtb_voo = $_GET["id"];

switch ($btn) {
    case 'add':
        inserir($numero, $companhia, $horario, $aviao, $origem, $destino);
        break;
    case 'edt':
        $idtb_voo = $_GET["id"];
        header('Location: ../Views/cadastroVoo.php?id=' . $idtb_voo);
        break;
    case 'rmv':
        $idtb_voo = $_GET["id"];
        remover($idtb_voo);
        break;

    case 'upd':
        $idtb_voo = $_GET["id"];
        atualizar($idtb_voo, $numero, $companhia, $horario, $aviao, $origem, $destino);
        break;
}

function inserir($numero, $companhia, $horario, $aviao, $origem, $destino) {
    $voo = new Voo();
    $voo->setNumero($numero);
    $voo->setCompanhia($companhia);
    $voo->setHorario($horario);

    $conexao = new Database();

    $aero = new Aeroporto();
    $aero->setIdtb_aeroporto($origem);
    $voo->setOrigem($aero);

    $av = new Aviao();
    $av->setIdtb_aviao($aviao);
    $voo->setAviao($av);

    $aero2 = new Aeroporto();
    $aero2->setIdtb_aeroporto($destino);
    $voo->setDestino($aero2);

    $vooDao = new VooDao($conexao->conecta());
    $vooDao->insere($voo);
    header('Location: ../Views/listagemVoo.php');
}

function remover($idtb_voo) {
    $voo = new Voo();
    $voo->setIdtb_voo($idtb_voo);

    $conexao = new Database();
    $vooDao = new VooDao($conexao->conecta());
    $vooDao->deletar($voo);
    header('Location: ../Views/listagemVoo.php');
}

function atualizar($idtb_voo, $numero, $companhia, $horario, $aviao, $origem, $destino) {

   
    $voo = new Voo();
    $voo->setIdtb_voo($idtb_voo);
    $voo->setNumero($numero);
    $voo->setCompanhia($companhia);
    $voo->setHorario($horario);

    
    $conexao = new Database();

    $aero = new Aeroporto();
    $aero->setIdtb_aeroporto($origem);
    
    $voo->setOrigem($aero);

    $aviao1 = new Aviao();
    $aviao1->setIdtb_aviao($aviao);
    $voo->setAviao($aviao1);

    $aero1 = new Aeroporto();
    $aero1->setIdtb_aeroporto($destino);
    $voo->setDestino($aero1);

    $vooDao = new VooDao($conexao->conecta());
    $vooDao->atualizar($voo);
    header('Location: ../Views/listagemVoo.php');
}
?>
