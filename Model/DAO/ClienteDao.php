<?php
  
class ClienteDao
{

    private $conexao;
    public function __construct($conexao){
        $this->conexao = $conexao;
    }
    
    public function insere (Cliente $cliente){
        
        $pessoaDao = new PessoaDao($this->conexao);
        $id = $pessoaDao->insere($cliente->getPessoa());
        
        $sql = "insert into tb_cliente 
        (nacionalidade,passaporte,tb_pessoa_idtb_pessoa)
        values ('{$cliente->getNacionalidade()}',
        '{$cliente->getPassaporte()}','{$id}')";
        
        mysqli_query($this->conexao,$sql);
    }
    
    public function deletar (Cliente $cliente){
        $sql = "delete from tb_cliente
            where tb_pessoa_idtb_pessoa = '{$cliente->getPessoa()->getId()}'";
        mysqli_query($this->conexao,$sql);
        
        $pessoaDao = new PessoaDao($this->conexao);
        $pessoaDao->deletar($cliente->getPessoa());
        
    }
    
    public function atualizar (Cliente $cliente){
        $pessoaDao = new PessoaDao($this->conexao);
        $pessoaDao->atualizar($cliente->getPessoa());
        
        $sql = "update tb_cliente set
        nacionalidade='{$cliente->getNacionalidade()}', 
        passaporte='{$cliente->getPassaporte()}'
        where tb_pessoa_idtb_pessoa = '{$cliente->getPessoa()->getId()}'";
        
        mysqli_query($this->conexao,$sql);
        
    }
    
    public function buscarId(Cliente $cliente){
                
        $sql = "select * from tb_cliente where tb_pessoa_idtb_pessoa ='{$cliente->getPessoa()->getId()}'";
        
        $resultado = mysqli_query($this->conexao,$sql);
        
        $objeto =  new Cliente();
        
        while ($row = mysqli_fetch_assoc($resultado)){
            $objeto->setNacionalidade($row["nacionalidade"]);
            $objeto->setPassaporte($row["passaporte"]);
            
            $pessoaDao = new PessoaDao($this->conexao);
            $pes = new Pessoa();
            $pes->setId($row["tb_pessoa_idtb_pessoa"]);
            $p = $pessoaDao->buscarId($pes);
            
            $objeto->setPessoa($p);
        }
        return $objeto;
        
    }
    
    public function buscarTodos(){
  
        $sql = "select * from tb_cliente";
        
        $resultado = mysqli_query($this->conexao,$sql);
        
        $lista = array();
        
        while ($row = mysqli_fetch_assoc($resultado)){
            $objeto =  new Cliente();
            $objeto->setNacionalidade($row["nacionalidade"]);
            $objeto->setPassaporte($row["passaporte"]);
            
            $pessoaDao = new PessoaDao($this->conexao);
            $pes = new Pessoa();
            $pes->setId($row["tb_pessoa_idtb_pessoa"]);
            $p = $pessoaDao->buscarId($pes);
            
            $objeto->setPessoa($p);
            array_push($lista, $objeto);
        }
        return $lista;
    }  
    
}

?>