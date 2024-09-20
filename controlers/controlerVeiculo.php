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
            $_REQUEST['vCategoria'],
            $_REQUEST['vDescricao'],

            $_REQUEST['vResumo']
        );
        //var_dump($veiculo);
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
        } elseif ($opcao == 6) {
            header("Location: ../views/veiculosVenda.php");
        }
    }
    if ($opcao == 4) {
        $placa = $_REQUEST['placa'];
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->getVeiculo($placa);

        session_start();
        $_SESSION["veiculo"] = $veiculo;
        header("Location: ../controlers/controlerCategoria.php?opcao=2");
    }
    if ($opcao == 5) {
        $veiculo = new Veiculo();
        $veiculo->setVeiculo(
            $_REQUEST['placa'],
            $_REQUEST['nome'],
            $_REQUEST['anoFabricacao'],
            $_REQUEST['fabricante'],
            $_REQUEST['opcionais'],
            $_REQUEST['motorizacao'],
            $_REQUEST['valorBase'],
            $_REQUEST['categoria'],
            $_REQUEST['descricao'],

            $_REQUEST['resumo']
        );



        // Instancia o DAO e chama o método de atualização
        $veiculoDAO = new VeiculoDAO();
        $veiculoDAO->atualizarVeiculo($veiculo);
        

        // Redireciona para a página de exibição de veículos
        header("Location: controlerVeiculo.php?opcao=2");
    }
    if ($opcao == 7) {
        $placa = $_REQUEST['placa'];
        $veiculoDAO = new VeiculoDAO();
        $veiculoDAO->deleteVeiculo($placa);
        
        header("Location: controlerVeiculo.php?opcao=2");
    }

    if($opcao ==8){
        $placa = $_REQUEST['pPlaca'];
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->pesquisaPlaca($placa);
        $_SESSION['veiculos']=$veics;
        


        header("Location: ../controlers/controlerCategoria.php?opcao=6");
    }

    if ($opcao == 9) {
        $nome = $_REQUEST['pNome'];
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->pesquisaPlaca($nome);
        $_SESSION['veiculos'] = $veics;



        header("Location: ../controlers/controlerCategoria.php?opcao=6");
    }

    if ($opcao == 10) {
        $fabricante = $_REQUEST['pFabricante'];
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->pesquisaPlaca($fabricante);
        $_SESSION['veiculos'] = $veics;



        header("Location: ../controlers/controlerCategoria.php?opcao=6");
    }

    if ($opcao == 11) {
        $motorizacao = $_REQUEST['pMotorização'];
        $veiculoDAO = new VeiculoDAO();
        $veiculo = $veiculoDAO->pesquisaPlaca($motorizacao);
        $_SESSION['veiculos'] = $veics;



        header("Location: ../controlers/controlerCategoria.php?opcao=6");
    }
}
