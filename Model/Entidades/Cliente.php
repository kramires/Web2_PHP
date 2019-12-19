<?php

class Cliente
{

    private $nacionalidade;
    private $passaporte;
    private $pessoa;
    
    
    /**
     * @return mixed
     */
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    /**
     * @return mixed
     */
    public function getPassaporte()
    {
        return $this->passaporte;
    }

    /**
     * @return mixed
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * @param mixed $nacionalidade
     */
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

   
    public function setPassaporte($passaporte)
    {
        $this->passaporte = $passaporte;
    }

    
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
    }

    
}

?>