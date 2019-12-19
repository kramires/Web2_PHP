<?php

class PessoaDao
{

    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function insere (Pessoa $pessoa){
        $sql = "insert into tb_pessoa (nome,cpf,endereco,fone)
                values ('{$pessoa->getNome()}',
                        '{$pessoa->getCpf()}',
                        '{$pessoa->getEndereco()}',   
                        '{$pessoa->getFone()}')";
        
        mysqli_query($this->conexao,$sql);
        
        return mysqli_insert_id($this->conexao);
    }
    
    function deletar(Pessoa $pessoa){
        $sql = "delete from tb_pessoa
        where idtb_pessoa = '{$pessoa->getId()}'";
        mysqli_query($this->conexao,$sql);
    }
    
    function atualizar (Pessoa $pessoa){
        $sql = "update tb_pessoa set
        nome='{$pessoa->getNome()}',
        cpf='{$pessoa->getCpf()}',
        endereco='{$pessoa->getEndereco()}',
        fone='{$pessoa->getFone()}'
        where idtb_pessoa = '{$pessoa->getId()}'";
        mysqli_query($this->conexao,$sql);
    }
    
    function buscarId(Pessoa $pessoa){
        
        $sql = "select * from tb_pessoa where
    idtb_pessoa = '{$pessoa->getId()}'";
        
        $resultado = mysqli_query($this->conexao,$sql);
        $objeto =  new Pessoa();
        
        while ($row = mysqli_fetch_assoc($resultado)){
            
            $objeto->setId($row["idtb_pessoa"]);
            $objeto->setNome($row["nome"]);
            $objeto->setCpf($row["cpf"]);
            $objeto->setEndereco($row["endereco"]);
            $objeto->setFone($row["fone"]);         
            
        }
        
        return $objeto;
    }
    
    function buscarTodos(){
        
        $sql = "select * from tb_pessoa";
        $resultado = mysqli_query($this->conexao,$sql);
        $lista = array();
        
        while($row = mysqli_fetch_assoc($resultado)){
            $objeto = new Pessoa();
            $objeto->setId($row["idtb_pessoa"]);
            $objeto->setNome($row["nome"]);
            $objeto->setCnpj($row["cnpj"]);
            $objeto->setEndereco($row["endereco"]);
            $objeto->setFone($row["fone"]);
            
            array_push($lista, $objeto);
        }
        
        return $lista;
    } 

}

