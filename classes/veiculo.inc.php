<?php

class Veiculo
{
    private $placa;
    private $nome;
    private $anoFabricacao;
    private $fabricante;
    private $opcionais;
    private $motorizacao;
    private $valorBase;
    private $id_categoria;
    private $descricao;
    private $categoria;  // Novo atributo
    private $resumo;     // Novo atributo


     public function setVeiculo($placa, $nome, $anoFabricacao, $fabricante, $opcionais, $motorizacao, $valorBase, $id_categoria, $descricao, $categoria, $resumo)
    {
        $this->placa = $placa;
        $this->nome = $nome;
        $this->anoFabricacao = $anoFabricacao;
        $this->fabricante = $fabricante;
        $this->opcionais = $opcionais;
        $this->motorizacao = $motorizacao;
        $this->valorBase = $valorBase;
        $this->id_categoria = $id_categoria;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->resumo = $resumo;
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
