<?php

class Veiculos
{
    private $placa;
    private $nome;
    private $anoFabricacao;
    private $fabricante;
    private $opcionais;
    private $motorizacao;
    private $valorBase;
    private $id_categoria;

    public function __construct($placa, $nome, $anoFabricacao, $fabricante, $opcionais, $motorizacao, $valorBase, $id_categoria)
    {
        $this->placa = $placa;
        $this->nome = $nome;
        $this->anoFabricacao = $anoFabricacao;
        $this->fabricante = $fabricante;
        $this->opcionais = $opcionais;
        $this->motorizacao = $motorizacao;
        $this->valorBase = $valorBase;
        $this->id_categoria = $id_categoria;
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
