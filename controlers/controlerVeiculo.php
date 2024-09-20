<?php
require_once '../dao/veiculoDao.inc.php';
require_once "../classes/veiculo.inc.php";

if (isset($_REQUEST['opcao'])) {
    $opcao = $_REQUEST['opcao'];

    if ($opcao == 1) {

        $veiculo = new Veiculo();
        $veiculo->setVeiculo(
            $_REQUEST['vPlaca'],
            $_REQUEST['vNome'],
            $_REQUEST['vAnoFabricacao'],
            $_REQUEST['vFabricante'],
            $_REQUEST['vOpcionais'],
            $_REQUEST['vMotorizacao'],
            $_REQUEST['vValorBase'],
            $_REQUEST['vDescricao'],
            $_REQUEST['vCategoria'],
            $_REQUEST['id_categoria'],
            $_REQUEST['vResumo']
        );

        $veiculoDAO = new VeiculoDAO();
        $veiculoDAO->incluirVeiculo($veiculo);

        header("Location: controlerVeiculo.php?opcao=2");
    }
    if ($opcao == 2 || $opcao == 6) {
        
        $veiculoDao = new VeiculoDAO();
        $veics = $veiculoDao->getVeiculos();
        session_start();
        $_SESSION['veiculos'] = $veics;
        //var_dump($veics);
        if ($opcao == 2) {
            header("Location: ../views/exibirVeiculos.php");
        } elseif($opcao == 6) {
            header("Location: ../views/veiculosVenda.php");
        }
    }
    if ($opcao == 4) {
        $placa = $_REQUEST['placa'];
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->getVeiculo($placa);

        session_start();
        $_SESSION["veiculo"] = $veiculo;
        header("Location: ../controlers/controlerCategoria.php?opcao=3");
    }
    if ($opcao == 5) {
        $veiculo = new Veiculo(
            $_REQUEST['placa'],
            $_REQUEST['nome'],
            $_REQUEST['anoFabricacao'],
            $_REQUEST['fabricante'],
            $_REQUEST['opcionais'],
            $_REQUEST['motorizacao'],
            $_REQUEST['valorBase'],
            $_REQUEST['id_categoria'], 
            $_REQUEST['descricao'],
            $_REQUEST['resumo']
        );



        // Instancia o DAO e chama o método de atualização
        $veiculoDAO = new VeiculoDAO();
        $veiculoDAO->atualizarVeiculo($veiculo);

        // Redireciona para a página de exibição de veículos
        header("Location: ../views/exibirVeiculos.php");
    }
}
