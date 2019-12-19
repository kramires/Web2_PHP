<?php
    require_once '../Model/Entidades/Cliente.php';
    require_once '../DB/Database.php';    
    require_once '../Model/DAO/ClienteDao.php';
    require_once '../Views/cadastroCliente.php';
    require_once '../Model/Entidades/Pessoa.php';
    require_once '../Model/DAO/PessoaDao.php';
    
    
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];
    $endereco = $_GET["endereco"];
    $fone = $_GET["fone"];
    $passaporte = $_GET["passaporte"];
    $nacionalidade = $_GET["nacionalidade"];
    $btn  = $_GET["btn"];
    
    switch ($btn){
        case 'add': 
            inserir($nome,$cpf,$endereco,$fone,$nacionalidade,$passaporte); 
            break;
        case 'edt': 
            $idtb_pessoa = $_GET["id"];
            header('Location: ../Views/cadastroCliente.php?id='.$idtb_pessoa);
        break; 
        case 'rmv': 
             $idtb_pessoa = $_GET["id"];
            remover($idtb_pessoa); 
            break;
        case 'upd':
            $idtb_pessoa = $_GET["id"];
            atualizar($idtb_pessoa,$nome,$cpf,$endereco,$fone,$nacionalidade,$passaporte);
            break;
    }

    function atualizar ($idtb_pessoa,$nome,$cpf,$endereco,$fone,$nacionalidade,$passaporte){
        
        $conexao = new Database();
        $clienteDao = new ClienteDao($conexao->conecta());
        
        $pessoa = new Pessoa();
        $pessoa->setId($idtb_pessoa);
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);
        $pessoa->setEndereco($endereco);
        $pessoa->setFone($fone);
        
        $cliente = new Cliente();
        $cliente->setNacionalidade($nacionalidade);
        $cliente->setPassaporte($passaporte);
        $cliente->setPessoa($pessoa);
        
        
        $clienteDao->atualizar($cliente);
        header('Location: ../Views/listagemCliente.php');
    }

    function inserir($nome,$cpf,$endereco,$fone,$nacionalidade,$passaporte)
    {
        $conexao = new Database();
        $clienteDao = new ClienteDao($conexao->conecta());
        
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);
        $pessoa->setEndereco($endereco);
        $pessoa->setFone($fone);
        
        $cliente = new Cliente();
        
        $cliente->setNacionalidade($nacionalidade);
        $cliente->setPassaporte($passaporte);
        $cliente->setPessoa($pessoa);
        
        
        $clienteDao->insere($cliente);
        header('Location: ../Views/listagemCliente.php');  
    }

    function remover($idtb_pessoa)
    {
        $conexao = new Database();
        $cliente = new Cliente();
        $pessoa = new Pessoa();
        $pessoa->setId($idtb_pessoa);
        
        $cliente->setPessoa($pessoa);
        $clienteDao = new ClienteDao($conexao->conecta());
        $clienteDao->deletar($cliente);
        header('Location: ../Views/listagemCliente.php');
    }
?>


