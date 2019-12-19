<?php

class AtendenteDao
{
       
    private $conexao;
    public function __construct($conexao){
        $this->conexao = $conexao;
    }
    
    public function insere (Atendente $atendente){
        
        $pessoaDao = new PessoaDao($this->conexao);
        $id = $pessoaDao->insere($atendente->getPessoa());
        
        $sql = "insert into tb_atendente
        (codigoFuncional,tb_pessoa_idtb_pessoa,login,senha)
        values ('{$atendente->getCodigoFuncional()}','{$id}','{$atendente->getLogin()}','{$atendente->getSenha()}')";
        
        mysqli_query($this->conexao,$sql);
    }
    
    public function deletar (Atendente $atendente){
       
        $sql = "delete from tb_atendente where tb_pessoa_idtb_pessoa='{$atendente->getPessoa()->getId()}'";
        
        mysqli_query($this->conexao,$sql);
        
        $pessoaDao = new PessoaDao($this->conexao);
        $pessoaDao->deletar($atendente->getPessoa());
        
    }
    
    public function atualizar (Atendente $atendente){
        $pessoaDao = new PessoaDao($this->conexao);
        $pessoaDao->atualizar($atendente->getPessoa());
        
        $sql = "update tb_atendente set
        codigoFuncional='{$atendente->getCodigoFuncional()}',
        login='{$atendente->getLogin()}',
        senha='{$atendente->getSenha()}'
        where tb_pessoa_idtb_pessoa = '{$atendente->getPessoa()->getId()}'";
        
        mysqli_query($this->conexao,$sql);
        
    }
    
    public function buscarId(Atendente $atendente){
       
        $sql =  "select * from tb_atendente where tb_pessoa_idtb_pessoa='{$atendente->getPessoa()->getId()}'";
        
        $resultado = mysqli_query($this->conexao,$sql);
        
        $objeto =  new Atendente();
        
        while ($row = mysqli_fetch_assoc($resultado)){
            $objeto->setCodigoFuncional($row["codigoFuncional"]);
            $objeto->setLogin($row["login"]);
            $objeto->setSenha($row["senha"]);
            $pessoaDao = new PessoaDao($this->conexao);
            $pes = new Pessoa();
            $pes->setId($row["tb_pessoa_idtb_pessoa"]);
            $p = new Pessoa();
            $p = $pessoaDao->buscarId($pes);
            
            $objeto->setPessoa($p);
        }
        return $objeto;
        
    }
    
    public function buscarTodos(){
        
        $sql = "select * from tb_atendente";
        
        $resultado = mysqli_query($this->conexao,$sql);
        
        $lista = array();
        
        while ($row = mysqli_fetch_assoc($resultado)){
            $objeto =  new Atendente();
            $objeto->setCodigoFuncional($row["codigoFuncional"]);
            $objeto->setLogin($row["login"]);
            $objeto->setSenha($row["senha"]);
                        
            $pessoaDao = new PessoaDao($this->conexao);
            $pes = new Pessoa();
            $pes->setId($row["tb_pessoa_idtb_pessoa"]);
            $p = new Pessoa();
            $p = $pessoaDao->buscarId($pes);
            
            $objeto->setPessoa($p);
            array_push($lista, $objeto);
        }
        return $lista;
    }  
}

