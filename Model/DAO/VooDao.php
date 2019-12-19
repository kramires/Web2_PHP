<?php
    
class VooDao {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function insere(Voo $voo) {
        $sql = "insert into tb_voo 
    (numero,compania,horario,origem,tb_aviao_idtb_aviao,destino) 
    values ('{$voo->getNumero()}','{$voo->getCompanhia()}',
    '{$voo->getHorario()}','{$voo->getOrigem()->getIdtb_aeroporto()}',
    '{$voo->getAviao()->getIdtb_aviao()}','{$voo->getDestino()->getIdtb_aeroporto()}')";

        mysqli_query($this->conexao, $sql);
    }

    public function deletar(Voo $voo) {
        $sql = "delete from tb_voo 
            where idtb_voo = 
            '{$voo->getIdtb_voo()}'";

        mysqli_query($this->conexao, $sql);
    }

    public function atualizar(Voo $voo) {
        
        $sql = "update tb_voo set 
    numero='{$voo->getNumero()}',compania='{$voo->getCompanhia()}',horario='{$voo->getHorario()}',origem='{$voo->getOrigem()->getIdtb_aeroporto()}', tb_aviao_idtb_aviao='{$voo->getAviao()->getIdtb_aviao()}',destino='{$voo->getDestino()->getIdtb_aeroporto()}' where idtb_voo ='{$voo->getIdtb_voo()}'";

        mysqli_query($this->conexao, $sql);
    }

    public function buscarId(Voo $voo) {

        $sql = "select * from tb_voo 
        where idtb_voo='{$voo->getIdtb_voo()}'";
        $resultado = mysqli_query($this->conexao, $sql);

        $objeto = new Voo();
        while ($row = mysqli_fetch_assoc($resultado)) {

            $objeto->setIdtb_voo($row["idtb_voo"]);
            $objeto->setNumero($row["numero"]);
            $objeto->setCompanhia($row["compania"]);
            $objeto->setHorario($row["horario"]);
            
            $aero = new Aeroporto();
            $aero->setIdtb_aeroporto($row["origem"]);
            $aeroDao = new AeroportoDAO($this->conexao);
            $aero2 = new Aeroporto();
            $aero2 = $aeroDao->buscarId($aero);
            $objeto->setOrigem($aero2);
            
            $aviao = new Aviao();
            $aviao->setIdtb_aviao($row["aviao"]);
            $aDao = new AviaoDAO($this->conexao);
            $aviao2 = new Aviao();
            $aviao2 = $aDao->buscarId($aviao);
            $objeto->setAviao($aviao2);
            
            $aero = new Aeroporto();
            $aero->setIdtb_aeroporto($row["destino"]);
            $aeroDao = new AeroportoDAO($this->conexao);
            $aero2 = new Aeroporto();
            $aero2 = $aeroDao->buscarId($aero);
            $objeto->setDestino($aero2);
        }
        return $objeto;
    }

    public function buscarTodos() {
        $sql = "select * from tb_voo";
        $resultado = mysqli_query($this->conexao, $sql);
        $lista = array();
        
        while ($row = mysqli_fetch_assoc($resultado)) {
            $objeto = new Voo();
            $objeto->setIdtb_voo($row["idtb_voo"]);
            $objeto->setNumero($row["numero"]);
            $objeto->setCompanhia($row["compania"]);
            $objeto->setHorario($row["horario"]);
            
            $aero = new Aeroporto();
            $aero->setIdtb_aeroporto($row["origem"]);
            $aeroDao = new AeroportoDAO($this->conexao);
            $aero2 = new Aeroporto();
            $aero2 = $aeroDao->buscarId($aero);
            $objeto->setOrigem($aero2);
            
            $aviao = new Aviao();
            $aviao->setIdtb_aviao($row["tb_aviao_idtb_aviao"]);
            $aDao = new AviaoDao($this->conexao);
            $aviao2 = new Aviao();
            $aviao2 = $aDao->buscarId($aviao);
            $objeto->setAviao($aviao2);
            
            $aero = new Aeroporto();
            $aero->setIdtb_aeroporto($row["destino"]);
            $aeroDao = new AeroportoDAO($this->conexao);
            $aero2 = new Aeroporto();
            $aero2 = $aeroDao->buscarId($aero);
            $objeto->setDestino($aero2);

            array_push($lista, $objeto);
        }

        return $lista;
    }

}
