<?php

class Socios
{
    private $cpf;
    private $nome;
    private $rg;
    private $endereco;
    private $telefone;
    private $email;

    public function __construct($cpf, $nome, $rg, $endereco, $telefone, $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->rg = $rg;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->email = $email;
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
