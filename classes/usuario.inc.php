<?php

class Usuario
{
    private $user;
    private $senha;
    private $tipo;
    private $email;

    public function __construct($user, $senha, $tipo, $email)
    {
        $this->user = $user;
        $this->senha = $senha;
        $this->tipo = $tipo;
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
}
