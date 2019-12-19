Japão<?php

class AviaoDao
{
    private $conexao;
    public function __construct($conexao){
        $this->conexao = $conexao;
    }
    
    function insere (Aviao $aviao){
        $sql = "insert into tb_aviao (numero,fabricante,capacidade,tipo) 
                values ('{$aviao->getNumero()}',
                        '{$aviao->getFabricante()}',
                        '{$aviao->getCapacidade()}',
                        '{$aviao->getTipo()}')";
        
        mysqli_query($this->conexao,$sql);
    } 
    
    function deletar(Aviao $aviao){
        $sql = "delete from tb_aviao 
        where idtb_aviao = '{$aviao->getIdtb_aviao()}'";
        mysqli_query($this->conexao,$sql);
    }
    
    function atualizar (Aviao $aviao){
        $sql = "update tb_aviao set
        numero='{$aviao->getNumero()}',
        fabricante='{$aviao->getFabricante()}',
        capacidade='{$aviao->getCapacidade()}',
        tipo='{$aviao->getTipo()}'    
        where idtb_aviao = '{$aviao->getIdtb_aviao()}'";
        mysqli_query($this->conexao,$sql);
    }
    
    function buscarId(Aviao $aviao){
        
        $sql = "select * from tb_aviao where 
        idtb_aviao = '{$aviao->getIdtb_aviao()}'";
        
        $resultado = mysqli_query($this->conexao,$sql);
        $objeto =  new Aviao();
        
        while ($row = mysqli_fetch_assoc($resultado)){
            
            $objeto->setIdtb_aviao($row["idtb_aviao"]);
            $objeto->setNumero($row["numero"]);
            $objeto->setFabricante($row["fabricante"]);
            $objeto->setCapacidade($row["capacidade"]);
            $objeto->setTipo($row["tipo"]);
        }  
        return $objeto;
    }
    
    function buscarTodos(){
        
        $sql = "select * from tb_aviao";
        $resultado = mysqli_query($this->conexao,$sql);
        $lista = array();
        
        while($row = mysqli_fetch_assoc($resultado)){
            $objeto = new Aviao();
            $objeto->setIdtb_aviao($row["idtb_aviao"]);
            $objeto->setNumero($row["numero"]);
            $objeto->setFabricante($row["fabricante"]);
            $objeto->setCapacidade($row["capacidade"]);
            $objeto->setTipo($row["tipo"]);
            array_push($lista, $objeto);
        }
        return $lista;
    }  
}


