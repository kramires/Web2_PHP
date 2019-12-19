<?php
    require_once '../Model/Entidades/Atendente.php';
    require_once '../DB/Database.php';    
    require_once '../Model/DAO/AtendenteDao.php';
    require_once '../Model/Entidades/Pessoa.php';
    require_once '../Model/DAO/PessoaDao.php';
    
    $codigoFuncional = $_GET["codigoFuncional"];
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];
    $endereco = $_GET["endereco"];
    $fone = $_GET["fone"];
    $login = $_GET["login"];
    $senha = $_GET["senha"];
    $btn  = $_GET["btn"];
    
    switch ($btn){
        case 'add': 
            inserir($codigoFuncional,$nome,$cpf,$endereco,$fone,$login,$senha); 
            break;
        case 'edt': 
            $idtb_pessoa = $_GET["id"];
            header('Location: ../Views/cadastroAtendente.php?id='.$idtb_pessoa);
        break; 
        case 'rmv': 
             $idtb_pessoa = $_GET["id"];
            remover($idtb_pessoa); 
            break;
        case 'upd':
            $idtb_pessoa = $_GET["id"];
            atualizar($idtb_pessoa, $codigoFuncional,$nome,$cpf,$endereco,$fone,$login,$senha);
            break;
    }

    function atualizar ($idtb_pessoa, $codigoFuncional, $nome,$cpf,$endereco,$fone,$login,$senha){
        
        $conexao = new Database();
        $atendenteDao = new AtendenteDao($conexao->conecta());
        
        $pessoa = new Pessoa();
        $pessoa->setId($idtb_pessoa);
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);
        $pessoa->setEndereco($endereco);
        $pessoa->setFone($fone);
        
        
        $atendente = new Atendente();
        $atendente->setCodigoFuncional($codigoFuncional);
        $atendente->setLogin($login);
        $atendente->setSenha($senha);
        $atendente->setPessoa($pessoa);
        
        $atendenteDao->atualizar($atendente);
        header('Location: ../Views/listagemAtendente.php');
    }

    function inserir($codigoFuncional,$nome,$cpf,$endereco,$fone,$login,$senha)
    {
        $conexao = new Database();
        $atendenteDao = new AtendenteDao($conexao->conecta());
        
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);
        $pessoa->setEndereco($endereco);
        $pessoa->setFone($fone);
        
        
        $atendente = new Atendente();
        $atendente->setCodigoFuncional($codigoFuncional);
        $atendente->setLogin($login);
        $atendente->setSenha($senha);
        $atendente->setPessoa($pessoa);
	$atendenteDao->insere($atendente);
	header('Location: ../Views/listagemAtendente.php'); 
       
    }

    function remover($idtb_pessoa)
    {
        
        $conexao = new Database();
        $atendente = new Atendente();
        $pessoa = new Pessoa();
        $pessoa->setId($idtb_pessoa);
        
        
        $atendente->setPessoa($pessoa);
        $atendenteDao = new AtendenteDao($conexao->conecta());
        $atendenteDao->deletar($atendente);
        header('Location: ../Views/listagemAtendente.php');
    }

?>

