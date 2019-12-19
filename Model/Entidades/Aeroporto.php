<?php
    
    class Aeroporto {
        
        private $idtb_aeroporto;
        private $codigo;
        private $nome;
        private $localizacao;
        /**
         * @return mixed
         */
        public function getIdtb_aeroporto()
        {
            return $this->idtb_aeroporto;
        }
    
        /**
         * @return mixed
         */
        public function getCodigo()
        {
            return $this->codigo;
        }
    
        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }
    
        /**
         * @return mixed
         */
        public function getLocalizacao()
        {
            return $this->localizacao;
        }
    
        /**
         * @param mixed $idtb_aeroporto
         */
        public function setIdtb_aeroporto($idtb_aeroporto)
        {
            $this->idtb_aeroporto = $idtb_aeroporto;
        }
    
        /**
         * @param mixed $codigo
         */
        public function setCodigo($codigo)
        {
            $this->codigo = $codigo;
        }
    
        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
    
        /**
         * @param mixed $localizacao
         */
        public function setLocalizacao($localizacao)
        {
            $this->localizacao = $localizacao;
        } 
    }
?>
