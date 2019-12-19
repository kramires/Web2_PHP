<?php
 
    class Voo {
        
        private $idtb_voo;
        private $numero;
        private $companhia;
        private $horario;
        private $origem;
        private $aviao;
        private $destino;
        
        function getIdtb_voo() {
            return $this->idtb_voo;
        }

        function getNumero() {
            return $this->numero;
        }

        function getCompanhia() {
            return $this->companhia;
        }

        function getHorario() {
            return $this->horario;
        }

        function getOrigem() {
            return $this->origem;
        }

        function getAviao() {
            return $this->tb_aviao_idtb_aviao;
        }

        function getDestino() {
            return $this->destino;
        }

        function setIdtb_voo($idtb_voo) {
            $this->idtb_voo = $idtb_voo;
        }

        function setNumero($numero) {
            $this->numero = $numero;
        }

        function setCompanhia($companhia) {
            $this->companhia = $companhia;
        }

        function setHorario($horario) {
            $this->horario = $horario;
        }

        function setOrigem($origem) {
            $this->origem = $origem;
        }

        function setAviao($aviao) {
            $this->tb_aviao_idtb_aviao = $aviao;
        }

        function setDestino($destino) {
            $this->destino = $destino;
        }  
    }