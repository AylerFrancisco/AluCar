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
                id_categoria
            )
            VALUES (
                :placa, 
                :nome, 
                :anoFabricacao, 
                :fabricante, 
                :opcionais, 
                :motorizacao, 
                :valorBase, 
                :id_categoria
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

        $sql->execute();
    }

    public function getVeiculos()
    {
        $sql = $this->conn->query("
        SELECT 
            v.placa, 
            v.nome, 
            v.fabricante, 
            v.anoFabricacao, 
            v.valorBase, 
            c.descricao AS categoria 
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
                    null, // Opcionais (pode adicionar se necessário)
                    null, // Motorização (pode adicionar se necessário)
                    $row->valorBase,
                    $row->categoria // Categoria agora aparece corretamente
                );

                $veiculos[] = $veiculo;
            }
        }

        return $veiculos;
    }


    public function getVeiculo(string $placa): Veiculo
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
            c.descricao as categoria
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
            $v->categoria
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
                id_categoria = :id_categoria
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
        $sql->bindValue(":id_categoria", $veiculo->id_categoria);

        $sql->execute();
    }

    public function deleteVeiculo(string $placa)
    {
        $sql = $this->conn->prepare("DELETE FROM veiculos WHERE placa = :placa");
        $sql->bindValue(":placa", $placa);

        $sql->execute();
    }
}
