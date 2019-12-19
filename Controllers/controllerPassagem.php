<?php
//require_once '../Login/checkSession.php';
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

$numero = $_GET["numero"];
$data = $_GET["data"];
$classe= $_GET["classe"];
$poltrona = $_GET["poltrona"];
$preco = $_GET["preco"];
$voo = $_GET["voo"];
$btn = $_GET["btn"];
$cliente = $_GET["cliente"];
$atendente = $_GET["atendente"];

switch ($btn) {
    case 'add':
        inserir($numero,$data,$classe,$poltrona,$preco,$voo,$cliente,$atendente);
        break;
    case 'edt':
        $idtb_passagem = $_GET["id"];
        header('Location: ../Views/compraPassagem.php?id='. $idtb_passagem);
        break;
    case 'rmv':
        $idtb_passagem = $_GET["id"];
        remover($idtb_passagem);
        break;

    case 'upd':
        $idtb_passagem = $_GET["id"];
        atualizar($idtb_passagem,$numero,$data,$classe,$poltrona,$preco,$voo,$cliente,$atendente);
        break;
}

function inserir($numero,$data,$classe,$poltrona,$preco,$voo,$cliente,$atendente) {
    $passagem = new Passagem();
    $passagem->setNumero($numero);
    $passagem->setData($data);
    $passagem->setClasse($classe);
    $passagem->setPoltrona($poltrona);
    $passagem->setPreco($preco);

    $conexao = new Database();

    $v = new Voo();
    $v->setIdtb_voo($voo);
    $passagem->setVoo($v);
    
    $cli = new Cliente();
    $cli->setPessoa($cliente);
    $passagem->setCliente($cli);

    $at = new Atendente();
    $at->setPessoa($atendente);
    $passagem->setAtendente($at);

    $passagemDao = new PassagemDao($conexao->conecta());
    $passagemDao->insere($passagem);
    header('Location: ../Views/listagemPassagem.php');
}

function remover($idtb_passagem) {
    $passagem = new Passagem();
    $passagem->setIdtb_passagem($idtb_passagem);

    $conexao = new Database();
    $passagemDao = new PassagemDao($conexao->conecta());
    $passagemDao->deletar($passagem);
    header('Location: ../Views/listagemPassagem.php');
}

function atualizar($idtb_passagem,$numero,$data,$classe,$poltrona,$preco,$voo,$cliente,$atendente) {

    $passagem = new Passagem();
    $passagem->setIdtb_passagem($idtb_passagem);
    $passagem->setNumero($numero);
    $passagem->setData($data);
    $passagem->setClasse($classe);
    $passagem->setPoltrona($poltrona);
    $passagem->setPreco($preco);

    $conexao = new Database();

    $v = new Voo();
    $v->setIdtb_voo($voo);
    $passagem->setVoo($v);

    $cli = new Cliente();
    $cli->setPessoa($cliente);
    $passagem->setCliente($cli);

    $at = new Atendente();
    $at->setPessoa($atendente);
    $passagem->setAtendente($at);

    $passagemDao = new PassagemDao($conexao->conecta());
    $passagemDao->atualizar($passagem);
    header('Location: ../Views/listagemPassagem.php');
}

?>
