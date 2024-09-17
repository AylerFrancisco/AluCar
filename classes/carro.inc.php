<?php

class Carro {
    private $id;
    private $modelo;
    private $marca;
    private $ano;
    private $precoPorDia;
    private $disponibilidade;

    // Construtor
    public function __construct($id, $modelo, $marca, $ano, $precoPorDia, $disponibilidade) {
        $this->id = $id;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
        $this->precoPorDia = $precoPorDia;
        $this->disponibilidade = $disponibilidade;
    }

    public function __get($attr) {
        if (property_exists($this, $attr)) {
            return $this->$attr;
        }
        return null; // Retorna null se a propriedade não existir
    }


    public function __set($attr, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Função para calcular o preço do aluguel baseado em dias
    public function calcularPrecoTotal($dias) {
        return $this->precoPorDia * $dias;
    }

    // Função para exibir informações do carro
    public function exibirInfo() {
        return "Modelo: {$this->modelo}, Marca: {$this->marca}, Ano: {$this->ano}, Preço por Dia: R$ {$this->precoPorDia}, Disponível: " . ($this->disponibilidade ? 'Sim' : 'Não');
    }
}
?>
