<?php
require_once '../dao/reservaDao.inc.php';
require_once '../classes/reserva.inc.php';
require_once '../classes/veiculo.inc.php';
require_once '../dao/veiculoDao.inc.php';

if (isset($_REQUEST['opcao'])) {
    $opcao = $_REQUEST['opcao'];

    if ($opcao == 1) {
        // Criar uma nova reserva
        $reserva = new Reserva();
        $reserva->setReserva(
            $_REQUEST['clienteId'],
            $_REQUEST['veiculoId'],
            $_REQUEST['dataInicio'],
            $_REQUEST['dataFim']
        );

        // Verificar se o veículo está disponível
        $veiculoDAO = new VeiculoDAO();
        $veiculoDisponivel = $veiculoDAO->verificarDisponibilidade($_REQUEST['veiculoId'], $_REQUEST['dataInicio'], $_REQUEST['dataFim']);

        if ($veiculoDisponivel) {
            $reservaDAO = new ReservaDAO();
            $reservaDAO->reservarVeiculo($_REQUEST['veiculoId'],$_REQUEST['$clientecpf'], $_REQUEST['dataInicio'], $_REQUEST['dataFim']);
            header("Location: controlerReserva.php?opcao=2");
        } else {
            header("Location: ../views/erroReserva.php?erro=Veículo indisponível");
        }
    }

    if ($opcao == 2) {
        // Exibir todas as reservas de um cliente específico
        $clienteId = $_REQUEST['clienteId'];
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->getReservasPorCliente($clienteId);

        session_start();
        $_SESSION['reservas'] = $reservas;

        if (empty($reservas)) {
            header("Location: ../views/nenhumaReserva.php");
        } else {
            header("Location: ../views/exibirReservas.php");
        }
    }

    if ($opcao == 3) {
        // Excluir uma reserva
        $reservaId = $_REQUEST['reservaId'];
        $reservaDAO = new ReservaDAO();
        $reservaDAO->deleteReserva($reservaId);

        header("Location: controlerReserva.php?opcao=2");
    }
}
