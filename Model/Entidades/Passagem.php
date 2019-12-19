<?php

    class Passagem {
        
        private $idtb_passagem;
        private $numero;
        private $data;
        private $classe;
        private $poltrona;
        private $preco;
        private $voo;
        private $cliente;
        private $atendente;
        /**
         * @return mixed
         */
        public function getIdtb_passagem()
        {
            return $this->idtb_passagem;
        }
    
        /**
         * @return mixed
         */
        public function getNumero()
        {
            return $this->numero;
        }
    
        /**
         * @return mixed
         */
        public function getData()
        {
            return $this->data;
        }
    
        /**
         * @return mixed
         */
        public function getClasse()
        {
            return $this->classe;
        }
    
        /**
         * @return mixed
         */
        public function getPoltrona()
        {
            return $this->poltrona;
        }
    
        /**
         * @return mixed
         */
        public function getPreco()
        {
            return $this->preco;
        }
    
        /**
         * @return mixed
         */
        public function getVoo()
        {
            return $this->voo;
        }
    
        /**
         * @return mixed
         */
        public function getCliente()
        {
            return $this->cliente;
        }
    
        /**
         * @return mixed
         */
        public function getAtendente()
        {
            return $this->atendente;
        }
    
        /**
         * @param mixed $idtb_passagem
         */
        public function setIdtb_passagem($idtb_passagem)
        {
            $this->idtb_passagem = $idtb_passagem;
        }
    
        /**
         * @param mixed $numero
         */
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }
    
        /**
         * @param mixed $data
         */
        public function setData($data)
        {
            $this->data = $data;
        }
    
        /**
         * @param mixed $classe
         */
        public function setClasse($classe)
        {
            $this->classe = $classe;
        }
    
        /**
         * @param mixed $poltrona
         */
        public function setPoltrona($poltrona)
        {
            $this->poltrona = $poltrona;
        }
    
        /**
         * @param mixed $preco
         */
        public function setPreco($preco)
        {
            $this->preco = $preco;
        }
    
        /**
         * @param mixed $voo
         */
        public function setVoo($voo)
        {
            $this->voo = $voo;
        }
    
        /**
         * @param mixed $cliente
         */
        public function setCliente($cliente)
        {
            $this->cliente = $cliente;
        }
    
        /**
         * @param mixed $atendente
         */
        public function setAtendente($atendente)
        {
            $this->atendente = $atendente;
        }
      
    }

?>
