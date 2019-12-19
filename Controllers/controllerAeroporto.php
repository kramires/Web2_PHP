<?php

    require_once '../Model/Entidades/Aeroporto.php';
    require_once '../DB/Database.php';    
    require_once '../Model/DAO/AeroportoDao.php';
   
    
    
    $codigo = $_GET["codigo"];
    $nome = $_GET["nome"];
    $localizacao = $_GET["localizacao"];
    $btn = $_GET["btn"];
    
    switch ($btn){
        case 'add': 
            inserir($codigo, $nome, $localizacao); 
            break;
        case 'edt': 
            $idtb_aeroporto = $_GET["id"];
            header('Location: ../Views/cadastroAeroporto.php?id='.$idtb_aeroporto);
            break; 
        case 'rmv': 
            $idtb_aeroporto = $_GET["id"];
            remover($idtb_aeroporto); 
            break;
            
        case 'upd':
            $idtb_aeroporto = $_GET["id"];
            atualizar($idtb_aeroporto,$codigo,$nome,$localizacao);
            break;
    }

    function atualizar ($idtb_aeroporto,$codigo,$nome,$localizacao){
        $aeroporto = new Aeroporto();
        $aeroporto->setIdtb_aeroporto($idtb_aeroporto);
        $aeroporto->setCodigo($codigo);
        $aeroporto->setNome($nome);
        $aeroporto->setLocalizacao($localizacao);
        
        $conexao = new Database();
        $aeroDao = new AeroportoDao($conexao->conecta());
        $aeroDao->atualizar($aeroporto);
        header('Location: ../Views/listagemAeroporto.php');
        
    }
    function inserir($codigo,$nome,$localizacao)
    {
        $aeroporto = new Aeroporto();
        $aeroporto->setCodigo($codigo);
        $aeroporto->setNome($nome);
        $aeroporto->setLocalizacao($localizacao);
        
        $conexao = new Database();
        
        $aeroDao = new AeroportoDao($conexao->conecta());
        $aeroDao->insere($aeroporto);
        header('Location: ../Views/listagemAeroporto.php');
        
    }
    function remover($idtb_aeroporto)
    {
        $aeroporto = new Aeroporto();
        $aeroporto->setIdtb_aeroporto($idtb_aeroporto);
        
        $conexao = new Database();
        
        $aeroDao = new AeroportoDao($conexao->conecta());
        $aeroDao->deletar($aeroporto);
        header('Location: ../Views/listagemAeroporto.php');
    }
?>

