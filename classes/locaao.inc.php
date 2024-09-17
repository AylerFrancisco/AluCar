<?php

class Locacao
{
    private $id_locacao;
    private $data;
    private $valor_total;
    private $cpf_socio;
    private $id_veiculo;

    public function __construct($id_locacao, $data, $valor_total, $cpf_socio, $id_veiculo)
    {
        $this->id_locacao = $id_locacao;
        $this->data = $data;
        $this->valor_total = $valor_total;
        $this->cpf_socio = $cpf_socio;
        $this->id_veiculo = $id_veiculo;
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
        return "Locação ID: {$this->id_locacao}, Data: {$this->data}, Valor Total: {$this->valor_total}";
    }
}
