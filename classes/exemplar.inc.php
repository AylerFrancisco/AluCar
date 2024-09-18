<?php

class Exemplar
{
    private $id_exemplar;
    private $placa_veiculo;
    private $id_locacao;
    private $locado;

    public function __construct($id_exemplar, $placa_veiculo, $id_locacao, $locado)
    {
        $this->id_exemplar = $id_exemplar;
        $this->placa_veiculo = $placa_veiculo;
        $this->id_locacao = $id_locacao;
        $this->locado = $locado;
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
        return "Exemplar ID: {$this->id_exemplar}, Veículo: {$this->placa_veiculo}, Locado: {$this->locado}";
    }
}
