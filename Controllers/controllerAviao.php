<?php

    require_once '../Model/Entidades/Aviao.php';
    require_once '../DB/Database.php';    
    require_once '../Model/DAO/AviaoDao.php';
    
    
    $numero= $_GET["numero"];
    $fabricante= $_GET["fabricante"];
    $capacidade= $_GET["capacidade"];
    $tipo= $_GET["tipo"];
    $btn = $_GET["btn"];
    
    switch ($btn){
        case 'add': 
            inserir($numero, $fabricante, $capacidade, $tipo); 
            break;
        case 'edt': 
            $idtb_aviao = $_GET["id"];
            header('Location: ../Views/cadastroAviao.php?id='.$idtb_aviao);
            break; 
        case 'rmv': 
            $idtb_aviao = $_GET["id"];
            remover($idtb_aviao); 
            break;
        case 'upd':
            $idtb_aviao = $_GET["id"];
            atualizar($idtb_aviao,$numero ,$fabricante,$capacidade,$tipo);
            break;
    }

    function atualizar ($idtb_aviao, $numero, $fabricante, $capacidade, $tipo){
        $aviao = new Aviao();
        $aviao->setIdtb_aviao($idtb_aviao);
        $aviao->setNumero($numero);
        $aviao->setFabricante($fabricante);
        $aviao->setCapacidade($capacidade);
        $aviao->setTipo($tipo);
        
        $conexao = new Database();
        $aDao = new AviaoDao($conexao->conecta());
        $aDao->atualizar($aviao);
        header('Location: ../Views/listagemAviao.php');
        
    }
    function inserir($numero,$fabricante,$capacidade,$tipo)
    {
        $aviao = new Aviao();
        $aviao->setNumero($numero );
        $aviao->setFabricante($fabricante );
        $aviao->setCapacidade($capacidade );
        $aviao->setTipo($tipo );
        
        $conexao = new Database();
        
        $aDao = new AviaoDao($conexao->conecta());
        $aDao->insere($aviao);
        header('Location: ../Views/listagemAviao.php');
        
    }
    function remover($idtb_aviao)
    {
        $aviao = new Aviao();
        $aviao->setIdtb_aviao($idtb_aviao);
        
        $conexao = new Database();
        
        $aDao = new AviaoDao($conexao->conecta());
        $aDao->deletar($aviao);
        header('Location: ../Views/listagemAviao.php');
    }
?>

