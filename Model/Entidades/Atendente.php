<?php

    class Atendente {
        
        private $codigoFuncional;
        private $pessoa;
        private $login;
        private $senha;
        
        function getCodigoFuncional() {
            return $this->codigoFuncional;
        }

        function setCodigoFuncional($codigoFuncional) {
            $this->codigoFuncional = $codigoFuncional;
        }

       public function getPessoa()
    {
        return $this->pessoa;
    }
        /**
         * @return mixed
         */
        public function getLogin()
        {
            return $this->login;
        }
    
        /**
         * @return mixed
         */
        public function getSenha()
        {
            return $this->senha;
        }
         /**
     * @param mixed $pessoa
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
    }
        /**
         * @param mixed $login
         */
        public function setLogin($login)
        {
            $this->login = $login;
        }
        /**
         * @param mixed $senha
         */
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }
       
    }

?>