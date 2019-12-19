<?php

    class Endereco {
        
        private $idtb_endereco;
        private $rua;
        private $numero;
        private $bairro;
        private $cidade;
        private $estado;
        private $cep;
        
        /**
         * @return mixed
         */
        public function getIdtb_endereco()
        {
            return $this->idtb_endereco;
        }
    
        /**
         * @param mixed $idtb_endereco
         */
        public function setIdtb_endereco($idtb_endereco)
        {
            $this->idtb_endereco = $idtb_endereco;
        }
    
        /**
         * @return mixed
         */
        public function getRua()
        {
            return $this->rua;
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
        public function getBairro()
        {
            return $this->bairro;
        }
    
        /**
         * @return mixed
         */
        public function getCidade()
        {
            return $this->cidade;
        }
    
        /**
         * @return mixed
         */
        public function getEstado()
        {
            return $this->estado;
        }
    
        /**
         * @return mixed
         */
        public function getCep()
        {
            return $this->cep;
        }
    
        /**
         * @param mixed $rua
         */
        public function setRua($rua)
        {
            $this->rua = $rua;
        }
    
        /**
         * @param mixed $numero
         */
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }
    
        /**
         * @param mixed $bairro
         */
        public function setBairro($bairro)
        {
            $this->bairro = $bairro;
        }
    
        /**
         * @param mixed $cidade
         */
        public function setCidade($cidade)
        {
            $this->cidade = $cidade;
        }
    
        /**
         * @param mixed $estado
         */
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }
    
        /**
         * @param mixed $cep
         */
        public function setCep($cep)
        {
            $this->cep = $cep;
        }
    
        
        
        
    }
    
?>