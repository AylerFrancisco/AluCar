<?php

class Exemplar
{
    private Veiculo $veiculo;
    private $disponolidade;
    private $valorExemplar;

    function __construct($veiculo)
    {
        $this->veiculo = $veiculo;
        $this->disponolidade = 1;
        $this->valorExemplar = $this->veiculo->getValorBase();
    }
    public function getValorExemplar()
    {
        return $this->valorExemplar;
    }
    public function setValorItem()
    {
        $this->valorExemplar = $this->disponolidade * $this->veiculo->getValorBase();
    }
    public function setDisponibilidade()
    {
        $this->disponolidade = 0;
    }
    public function getDisponibilidade(){
        return $this->disponolidade;

    }
    public function getVeiculo()
    {
        return $this->veiculo;
    }
}
