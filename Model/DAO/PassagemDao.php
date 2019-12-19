<?php

class PassagemDao {

        private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function insere(Passagem $passagem) {
    $sql = "insert into tb_passagem 
    (numero,data,classe,poltrona,preco,tb_voo_idtb_voo,tb_cliente_tb_pessoa_idtb_pessoa,tb_atendente_tb_pessoa_idtb_pessoa) 
    values ('{$passagem->getNumero()}','{$passagem->getData()}',
    '{$passagem->getClasse()}','{$passagem->getPoltrona()}','{$passagem->getPreco()}',
    '{$passagem->getVoo()->getIdtb_voo()}','{$passagem->getCliente()->getPessoa()}',
    '{$passagem->getAtendente()->getPessoa()}')";

        mysqli_query($this->conexao, $sql);
    }

    public function deletar(Passagem $passagem) {
        $sql = "delete from tb_passagem 
            where idtb_passagem = 
            '{$passagem->getIdtb_passagem()}'";

        mysqli_query($this->conexao, $sql);
    }

    public function atualizar(Passagem $passagem) {
    $sql = "update tb_passagem set 
    numero='{$passagem->getNumero()}',data='{$passagem->getData()}',classe='{$passagem->getClasse()}', 
    poltrona='{$passagem->getPoltrona()}',preco='{$passagem->getPreco()}',tb_voo_idtb_voo='{$passagem->getVoo()->getIdtb_voo()}',tb_cliente_tb_pessoa_idtb_pessoa='{$passagem->getCliente()->getPessoa()}',tb_atendente_tb_pessoa_idtb_pessoa='{$passagem->getAtendente()->getPessoa()}'
    where idtb_passagem='{$passagem->getIdtb_passagem()}'";

        mysqli_query($this->conexao, $sql);
    }

    public function buscarId(Passagem $passagem) {

        $sql = "select * from tb_passagem 
        where idtb_passagem='{$passagem->getIdtb_passagem()}'";
        $resultado = mysqli_query($this->conexao, $sql);

        $objeto = new Passagem();
        while ($row = mysqli_fetch_assoc($resultado)) {

            $objeto->setIdtb_passagem($row["idtb_passagem"]);
            $objeto->setNumero($row["numero"]);
            $objeto->setData($row["data"]);
            $objeto->setClasse($row["classe"]);
            $objeto->setPoltrona($row["poltrona"]);
            $objeto->setPreco($row["preco"]);

            $voo = new Voo();
            $voo->setIdtb_voo($row["tb_voo_idtb_voo"]);
            $vooDao = new VooDao($this->conexao);
            $v2 = new Voo();
            $v2 = $vooDao->buscarId($voo);
            $objeto->setVoo($v2);

            $pessoa1 = new Pessoa();
            $pessoa1->setId($row["tb_cliente_tb_pessoa_idtb_pessoa"]);
            $cliente = new Cliente();
            $cliente->setPessoa($pessoa1);
            $clienteDao = new ClienteDao($this->conexao);
            $cliente2 = new Cliente();
            $cliente2 = $clienteDao->buscarId($cliente);
            $objeto->setCliente($cliente2);
            
            $pessoa2 = new Pessoa();
            $pessoa2->setId($row["tb_atendente_tb_pessoa_idtb_pessoa"]);
            $at = new Atendente();
            $at->setPessoa($pessoa2);
            $atDao = new AtendenteDao($this->conexao);
            $at2 = new Atendente();
            $at2 = $atDao->buscarId($at);
            $objeto->setAtendente($at2);
        }
        return $objeto;
    }

    public function buscarTodos() {
        $sql = "select * from tb_passagem";
        $resultado = mysqli_query($this->conexao, $sql);
        $lista = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $objeto = new Passagem();
            $objeto->setIdtb_passagem($row["idtb_passagem"]);
            $objeto->setNumero($row["numero"]);
            $objeto->setData($row["data"]);
            $objeto->setClasse($row["classe"]);
            $objeto->setPoltrona($row["poltrona"]);
            $objeto->setPreco($row["preco"]);
           

            $voo = new Voo();
            $voo->setIdtb_voo($row["tb_voo_idtb_voo"]);
            $vooDao = new VooDao($this->conexao);
            $v2 = new Voo();
            $v2 = $vooDao->buscarId($voo);
            $objeto->setVoo($v2);

            $pessoa1 = new Pessoa();
            $pessoa1->setId($row["tb_cliente_tb_pessoa_idtb_pessoa"]);
            $cliente = new Cliente();
            $cliente->setPessoa($pessoa1);
            $clienteDao = new ClienteDao($this->conexao);
            $cliente2 = new Cliente();
            $cliente2 = $clienteDao->buscarId($cliente);
            $objeto->setCliente($cliente2);
            
            $pessoa2 = new Pessoa();
            $pessoa2->setId($row["tb_atendente_tb_pessoa_idtb_pessoa"]);
            $at = new Atendente();
            $at->setPessoa($pessoa2);
            $atDao = new AtendenteDao($this->conexao);
            $at2 = new Atendente();
            $at2 = $atDao->buscarId($at);
            $objeto->setAtendente($at2);

            array_push($lista, $objeto);
        }
        return $lista;
    }
}
