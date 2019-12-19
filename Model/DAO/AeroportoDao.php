<?php

class AeroportoDao
{
    private $conexao;
    public function __construct($conexao){
        $this->conexao = $conexao;
    }
    
    function insere (Aeroporto $aeroporto){
        $sql = "insert into tb_aeroporto (codigo,nome,localizacao) 
                values ('{$aeroporto->getCodigo()}',
                        '{$aeroporto->getNome()}',
                        '{$aeroporto->getLocalizacao()}')";
        
        mysqli_query($this->conexao,$sql);
    } 
    
    function deletar(Aeroporto $aeroporto){
        $sql = "delete from tb_aeroporto 
        where idtb_aeroporto = '{$aeroporto->getIdtb_aeroporto()}'";
        mysqli_query($this->conexao,$sql);
    }
    
    function atualizar (Aeroporto $aeroporto){
//        echo $aeroporto->getNome();
//        echo $aeroporto->getCodigo();
//        echo $aeroporto->getLocalizacao();
        
        $sql = "update tb_aeroporto set
        codigo='{$aeroporto->getCodigo()}',nome='{$aeroporto->getNome()}',localizacao='{$aeroporto->getLocalizacao()}' where idtb_aeroporto='{$aeroporto->getIdtb_aeroporto()}'";
        mysqli_query($this->conexao,$sql);
    }
    
    function buscarId(Aeroporto $aeroporto){
        
        $sql = "select * from tb_aeroporto where 
        idtb_aeroporto = '{$aeroporto->getIdtb_aeroporto()}'";
        
        $resultado = mysqli_query($this->conexao,$sql);
        $objeto =  new Aeroporto();
        
        while ($row = mysqli_fetch_assoc($resultado)){
            
            $objeto->setIdtb_aeroporto($row["idtb_aeroporto"]);
            $objeto->setCodigo($row["codigo"]);
            $objeto->setNome($row["nome"]);
            $objeto->setLocalizacao($row["localizacao"]);
        }  
        return $objeto;
    }
    
    function buscarTodos(){
        
        $sql = "select * from tb_aeroporto";
        $resultado = mysqli_query($this->conexao,$sql);
        $lista = array();
        
        while($row = mysqli_fetch_assoc($resultado)){
            $objeto = new Aeroporto();
            $objeto->setIdtb_aeroporto($row["idtb_aeroporto"]);
            $objeto->setCodigo($row["codigo"]);
            $objeto->setNome($row["nome"]);
            $objeto->setLocalizacao($row["localizacao"]);
            array_push($lista, $objeto);
        }
        return $lista;
    }  
}

