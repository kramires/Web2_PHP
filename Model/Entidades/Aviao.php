<?php

    class Aviao {
        
        private $idtb_aviao;
        private $numero;
        private $fabricante;
        private $capacidade;
        private $tipo;
        /**
         * @return mixed
         */
        public function getIdtb_aviao()
        {
            return $this->idtb_aviao;
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
        public function getCapacidade()
        {
            return $this->capacidade;
        }
    
        /**
         * @return mixed
         */
        public function getTipo()
        {
            return $this->tipo;
        }
    
        /**
         * @param mixed $idtb_aviao
         */
        public function setIdtb_aviao($idtb_aviao)
        {
            $this->idtb_aviao = $idtb_aviao;
        }
    
        /**
         * @param mixed $numero
         */
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }
    
        /**
         * @param mixed $capacidade
         */
        public function setCapacidade($capacidade)
        {
            $this->capacidade = $capacidade;
        }
    
        /**
         * @param mixed $tipo
         */
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }
        
        function getFabricante() {
            return $this->fabricante;
        }

        function setFabricante($fabricante) {
            $this->fabricante = $fabricante;
        } 
        
    }

?>
