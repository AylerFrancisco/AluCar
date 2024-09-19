<?php
require_once "conexao.inc.php";
require_once "../utils/funcoesUteis.php";

final class VeiculoDAO
{
    private PDO $conn;

    public function __construct()
    {
        $c = new Conexao();
        $this->conn = $c->getConexao();
    }

    public function incluirVeiculo(Veiculo $veiculo)
    {
        $sql = $this->conn->prepare("
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
        $sql = $this->conn->query("
    SELECT 
        v.placa, 
        v.nome,
        v.anoFabricacao, 
        v.fabricante, 
        v.opcionais,
        v.motorizacao,
        v.valorBase, 
        v.id_categoria,
        v.descricao,
        c.descricao AS categoria,
        v.resumo
    FROM veiculos v
    INNER JOIN categoria c
    ON v.id_categoria = c.id_categoria");

        $veiculos = [];
        if ($sql->rowCount() > 0) {
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $veiculo = new Veiculo(
                    $row->placa,
                    $row->nome,
                    $row->anoFabricacao,
                    $row->fabricante,
                    $row->opcionais,
                    $row->motorizacao,
                    $row->valorBase,
                    $row->id_categoria,
                    $row->descricao,
                    $row->categoria, // Categoria agora aparece corretamente
                    $row->resumo
                );

                $veiculos[] = $veiculo;
            }
        }

        return $veiculos;
    }

    public function getVeiculo(string $placa)
    {
        $sql = $this->conn->prepare("
        SELECT 
            v.placa, 
            v.nome, 
            v.anoFabricacao, 
            v.fabricante, 
            v.opcionais, 
            v.motorizacao, 
            v.valorBase, 
            c.descricao as categoria,
            v.id_categoria,
            v.descricao,
            v.resumo
        FROM veiculos v
        INNER JOIN categoria c
        ON v.id_categoria = c.id_categoria
        WHERE v.placa = :placa");

        $sql->bindValue(":placa", $placa);
        $sql->execute();

        $v = $sql->fetch(PDO::FETCH_OBJ);
        return new Veiculo(
            $v->placa,
            $v->nome,
            $v->anoFabricacao,
            $v->fabricante,
            $v->opcionais,
            $v->motorizacao,
            $v->valorBase,
            $v->categoria,
            $v->id_categoria,
            $v->descricao,    // Novo campo
            $v->resumo
        );
    }

    public function atualizarVeiculo(Veiculo $veiculo)
    {
        $sql = $this->conn->prepare("
            UPDATE veiculos
            SET 
                nome = :nome, 
                anoFabricacao = :anoFabricacao, 
                fabricante = :fabricante, 
                opcionais = :opcionais, 
                motorizacao = :motorizacao, 
                valorBase = :valorBase, 
                id_categoria = :id_categoria,
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
        $sql->bindValue(":id_categoria", $veiculo->__get('id_categoria'));
        $sql->bindValue(":descricao", $veiculo->descricao);  // Novo campo
        $sql->bindValue(":resumo", $veiculo->resumo);        // Novo campo

        $sql->execute();
    }


    public function deleteVeiculo(string $placa)
    {
        $sql = $this->conn->prepare("DELETE FROM veiculos WHERE placa = :placa");
        $sql->bindValue(":placa", $placa);

        $sql->execute();
    }
}
