<?php
class ReservaDao
{
    private PDO $con;

    public function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function reservarVeiculo($veiculo_id, $cliente_id, $data_inicio, $data_fim)
    {
        // Verifica se o veículo já está reservado no período desejado
        $query = "SELECT * FROM reservas WHERE veiculo_id = :veiculo_id AND 
                  (data_inicio BETWEEN :data_inicio AND :data_fim OR 
                  data_fim BETWEEN :data_inicio AND :data_fim)";
        $stmt = $this->con->prepare($query);
        $stmt->bindValue(':veiculo_id', $veiculo_id);
        $stmt->bindValue(':data_inicio', $data_inicio);
        $stmt->bindValue(':data_fim', $data_fim);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // Veículo já está reservado nesse período
        }

        // Insere a reserva no banco de dados
        $query = "INSERT INTO reservas (veiculo_id, cliente_id, data_inicio, data_fim, status) 
                  VALUES (:veiculo_id, :cliente_id, :data_inicio, :data_fim, 'reservado')";
        $stmt = $this->con->prepare($query);
        $stmt->bindValue(':veiculo_id', $veiculo_id);
        $stmt->bindValue(':cliente_id', $cliente_id);
        $stmt->bindValue(':data_inicio', $data_inicio);
        $stmt->bindValue(':data_fim', $data_fim);
        $stmt->execute();

        return true; // Reserva realizada com sucesso
    }

    // Busca todas as reservas feitas por um cliente específico
    public function getReservasPorCliente($cliente_id)
    {
        $query = "SELECT r.*, v.nome AS veiculo_nome, v.placa AS veiculo_placa 
                  FROM reservas r
                  JOIN veiculos v ON r.veiculo_id = v.id
                  WHERE r.cliente_id = :cliente_id";
        $stmt = $this->con->prepare($query);
        $stmt->bindValue(':cliente_id', $cliente_id);
        $stmt->execute();

        $reservas = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Verifica se há reservas
        if (count($reservas) === 0) {
            return "Nenhuma reserva encontrada para este cliente.";
        }

        return $reservas;
    }

    // Deleta uma reserva pelo ID
    public function deleteReserva($reserva_id)
    {
        $query = "DELETE FROM reservas WHERE id = :reserva_id";
        $stmt = $this->con->prepare($query);
        $stmt->bindValue(':reserva_id', $reserva_id);
        $stmt->execute();

        // Verifica se a operação foi bem-sucedida
        if ($stmt->rowCount() > 0) {
            return true; // Reserva deletada com sucesso
        }

        return false; // Falha ao deletar a reserva
    }
}
