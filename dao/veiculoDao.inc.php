<?php
require_once "conexao.inc.php";
require_once "../utils/funcoesUteis.php";
require_once '../classes/veiculo.inc.php';
require_once "categoriaDao.inc.php";

final class VeiculoDAO
{
    private PDO $con;

    public function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirVeiculo(Veiculo $veiculo)
    {
        $sql = $this->con->prepare("
            INSERT INTO veiculos (
                placa, 
                nome, 
                anoFabricacao, 
                fabricante, 
                opcionais, 
                motorizacao, 
                valorBase, 
                id_categoria,
                descricao,         
                resumo             
            )
            VALUES (
                :placa, 
                :nome, 
                :anoFabricacao, 
                :fabricante, 
                :opcionais, 
                :motorizacao, 
                :valorBase, 
                :id_categoria,
                :descricao,        
                :resumo            
            )
        ");

        $sql->bindValue(":placa", $veiculo->placa);
        $sql->bindValue(":nome", $veiculo->nome);
        $sql->bindValue(":anoFabricacao", $veiculo->anoFabricacao);
        $sql->bindValue(":fabricante", $veiculo->fabricante);
        $sql->bindValue(":opcionais", $veiculo->opcionais);
        $sql->bindValue(":motorizacao", $veiculo->motorizacao);
        $sql->bindValue(":valorBase", $veiculo->valorBase);
        $sql->bindValue(":id_categoria", $veiculo->id_categoria);
        $sql->bindValue(":descricao", $veiculo->descricao);   // Novo campo
        $sql->bindValue(":resumo", $veiculo->resumo);         // Novo campo

        $sql->execute();
    }


    public function getVeiculos()
    {
        $sql = $this->con->query("
         SELECT veiculos.*, categoria.descricao AS descricao_categoria
        FROM veiculos
        LEFT JOIN categoria ON veiculos.id_categoria = categoria.id_categoria
        ");
        $lista = array();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $veiculo = new Veiculo();
            $veiculo->__set('placa', $row->placa);
            $veiculo->__set('nome', $row->nome);
            $veiculo->__set('anoFabricacao', $row->anoFabricacao);
            $veiculo->__set('fabricante', $row->fabricante);
            $veiculo->__set('opcionais', $row->opcionais);
            $veiculo->__set('motorizacao', $row->motorizacao);
            $veiculo->__set('valorBase', $row->valorBase);
            $veiculo->__set('id_categoria', $row->id_categoria);
            $veiculo->__set('descricao', $row->descricao);
            $veiculo->__set('resumo', $row->resumo);
            $veiculo->__set('categoria', $row->descricao_categoria);
            $lista[] = $veiculo;
        }
        return $lista;
    }

    public function getVeiculo(string $placa)
    {
        $sql = $this->con->prepare("select * from veiculos where placa=:placa");
        $sql->bindValue(":placa", $placa);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        $veiculo = new Veiculo();
        $veiculo->__set('placa', $row->placa);
        $veiculo->__set('nome', $row->nome);
        $veiculo->__set('anoFabricacao', $row->anoFabricacao);
        $veiculo->__set('fabricante', $row->fabricante);
        $veiculo->__set('opcionais', $row->opcionais);
        $veiculo->__set('motorizacao', $row->motorizacao);
        $veiculo->__set('valorBase', $row->valorBase);
        $veiculo->__set('id_categoria', $row->id_categoria);
        $veiculo->__set('descricao', $row->descricao);
        $veiculo->__set('resumo', $row->resumo);

        return $veiculo;
    }

    public function atualizarVeiculo(Veiculo $veiculo)
    {
        $sql = $this->con->prepare("
            UPDATE veiculos
            SET 
                nome = :nome, 
                anoFabricacao = :anoFabricacao, 
                fabricante = :fabricante, 
                opcionais = :opcionais, 
                motorizacao = :motorizacao, 
                valorBase = :valorBase, 
                descricao = :descricao,       
                resumo = :resumo            
            WHERE
                placa = :placa
        ");

        $sql->bindValue(":placa", $veiculo->placa);
        $sql->bindValue(":nome", $veiculo->nome);
        $sql->bindValue(":anoFabricacao", $veiculo->anoFabricacao);
        $sql->bindValue(":fabricante", $veiculo->fabricante);
        $sql->bindValue(":opcionais", $veiculo->opcionais);
        $sql->bindValue(":motorizacao", $veiculo->motorizacao);
        $sql->bindValue(":valorBase", $veiculo->valorBase);
        $sql->bindValue(":descricao", $veiculo->descricao);  // Novo campo
        $sql->bindValue(":resumo", $veiculo->resumo);        // Novo campo

        $sql->execute();
    }


    public function deleteVeiculo(string $placa)
    {
        $sql = $this->con->prepare("DELETE FROM veiculos WHERE placa = :placa");
        $sql->bindValue(":placa", $placa);

        $sql->execute();
    }

    public function pesquisaPlaca($placa)
    {
        $sql = $this->con->prepare("select * from veiculos where placa = :placa");
        $sql->bindValue(":placa", $placa);
        $sql->execute();

        $lista = array();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $veiculo = new Veiculo();
            $veiculo->__set('placa', $row->placa);
            $veiculo->__set('nome', $row->nome);
            $veiculo->__set('anoFabricacao', $row->anoFabricacao);
            $veiculo->__set('fabricante', $row->fabricante);
            $veiculo->__set('opcionais', $row->opcionais);
            $veiculo->__set('motorizacao', $row->motorizacao);
            $veiculo->__set('valorBase', $row->valorBase);
            $veiculo->__set('id_categoria', $row->id_categoria);
            $veiculo->__set('descricao', $row->descricao);
            $veiculo->__set('resumo', $row->resumo);
            $veiculo->__set('categoria', $row->descricao_categoria);
            $lista[] = $veiculo;
        }
        return $lista;
    }

    public function pesquisaNome($nome)
    {
        $sql = $this->con->prepare("select * from veiculos where nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        $lista = array();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $veiculo = new Veiculo();
            $veiculo->__set('placa', $row->placa);
            $veiculo->__set('nome', $row->nome);
            $veiculo->__set('anoFabricacao', $row->anoFabricacao);
            $veiculo->__set('fabricante', $row->fabricante);
            $veiculo->__set('opcionais', $row->opcionais);
            $veiculo->__set('motorizacao', $row->motorizacao);
            $veiculo->__set('valorBase', $row->valorBase);
            $veiculo->__set('id_categoria', $row->id_categoria);
            $veiculo->__set('descricao', $row->descricao);
            $veiculo->__set('resumo', $row->resumo);
            $veiculo->__set('categoria', $row->descricao_categoria);
            $lista[] = $veiculo;
        }
        return $lista;
    }

    public function pesquisaFabricante($fabricante)
    {
        $sql = $this->con->prepare("select * from veiculos where fabricante = :fabricante");
        $sql->bindValue(":fabricante", $fabricante);
        $sql->execute();

        $lista = array();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $veiculo = new Veiculo();
            $veiculo->__set('placa', $row->placa);
            $veiculo->__set('nome', $row->nome);
            $veiculo->__set('anoFabricacao', $row->anoFabricacao);
            $veiculo->__set('fabricante', $row->fabricante);
            $veiculo->__set('opcionais', $row->opcionais);
            $veiculo->__set('motorizacao', $row->motorizacao);
            $veiculo->__set('valorBase', $row->valorBase);
            $veiculo->__set('id_categoria', $row->id_categoria);
            $veiculo->__set('descricao', $row->descricao);
            $veiculo->__set('resumo', $row->resumo);
            $veiculo->__set('categoria', $row->descricao_categoria);
            $lista[] = $veiculo;
        }
        return $lista;
    }

    public function pesquisaMotorizacao($motorizacao)
    {
        $sql = $this->con->prepare("select * from veiculos where motorizacao = :motorizacao");
        $sql->bindValue(":motorizacao", $motorizacao);
        $sql->execute();

        $lista = array();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $veiculo = new Veiculo();
            $veiculo->__set('placa', $row->placa);
            $veiculo->__set('nome', $row->nome);
            $veiculo->__set('anoFabricacao', $row->anoFabricacao);
            $veiculo->__set('fabricante', $row->fabricante);
            $veiculo->__set('opcionais', $row->opcionais);
            $veiculo->__set('motorizacao', $row->motorizacao);
            $veiculo->__set('valorBase', $row->valorBase);
            $veiculo->__set('id_categoria', $row->id_categoria);
            $veiculo->__set('descricao', $row->descricao);
            $veiculo->__set('resumo', $row->resumo);
            $veiculo->__set('categoria', $row->descricao_categoria);
            $lista[] = $veiculo;
        }
        return $lista;
    }
    public function verificarDisponibilidade(string $placa, string $dataInicio, string $dataFim): bool
    {
        // SQL para verificar se o veículo já está reservado nas datas fornecidas
        $sql = $this->con->prepare("
        SELECT COUNT(*) AS total 
        FROM reservas 
        WHERE placa = :placa 
        AND (
            (dataInicio <= :dataFim AND dataFim >= :dataInicio)
        )
    ");

        // Bind dos parâmetros
        $sql->bindValue(":placa", $placa);
        $sql->bindValue(":dataInicio", $dataInicio);
        $sql->bindValue(":dataFim", $dataFim);

        // Executa a consulta
        $sql->execute();

        // Pega o resultado da consulta
        $row = $sql->fetch(PDO::FETCH_OBJ);

        // Se o total for maior que 0, o veículo já está reservado no período informado
        return $row->total == 0;
    }
}
