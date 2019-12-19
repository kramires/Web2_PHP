<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $base = "passagemAerea";
    
    public function conecta(){
        $conexao = new mysqli($this->host,$this->usuario,$this->senha,$this->base);
        return $conexao;
    }
}
?>