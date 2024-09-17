<?php

class Categoria
{
    private $id_categoria;
    private $descricao;
    private $valor;

    public function __construct($id_categoria, $descricao, $valor)
    {
        $this->id_categoria = $id_categoria;
        $this->descricao = $descricao;
        $this->valor = $valor;
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
        return "Categoria: {$this->descricao}, Valor: {$this->valor}";
    }
}
