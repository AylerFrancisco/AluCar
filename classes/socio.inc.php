<?php

class Socio
{
    private $cpf;
    private $nome;
    private $rg;
    private $endereco;
    private $telefone;
    private $email;
    private $tipo;
    private $senha;

    public function __construct()
    {
        
    }

    public function setSocio($cpf, $nome, $rg, $endereco, $telefone, $email, $senha)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->rg = $rg;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "Sócio: {$this->nome}, CPF: {$this->cpf}";
    }
}
