<?php
require_once '../dao/veiculoDao.inc.php';
require_once "../classes/veiculo.inc.php";

if (isset($_REQUEST['opcao'])) {
    $opcao = $_REQUEST['opcao'];

    if ($opcao == 1) {
        // Verifica se todos os campos obrigatórios foram enviados pelo formulário
        if (
            isset(
                $_REQUEST['vPlaca'],
                $_REQUEST['vNome'],
                $_REQUEST['vAnoFabricacao'],
                $_REQUEST['vFabricante'],
                $_REQUEST['vMotorizacao'],
                $_REQUEST['vValorBase'],
                $_REQUEST['vCategoria'],
                $_REQUEST['vDescricao'],  // Novo campo
                $_REQUEST['vResumo']
            )
        ) {
            // Cria um novo objeto Veiculo com os dados do formulário
            $veiculo = new Veiculo(
                $_REQUEST['vPlaca'],
                $_REQUEST['vNome'],
                $_REQUEST['vAnoFabricacao'],
                $_REQUEST['vFabricante'],
                $_REQUEST['vOpcionais'],        // Opcionais pode estar vazio, então use o valor direto
                $_REQUEST['vMotorizacao'],
                $_REQUEST['vValorBase'],
                $_REQUEST['vCategoria'],
                $_REQUEST['vDescricao'],  // Novo campo
                $_REQUEST['vResumo']
            );

            // Instancia o DAO e chama o método de inclusão
            $veiculoDAO = new VeiculoDAO();
            $veiculoDAO->incluirVeiculo($veiculo);

            // Redireciona para a página de sucesso (ou exibe mensagem)
            header("Location: ../views/exibirVeiculos.php");
            exit();
        } else {
            // Caso algum campo obrigatório esteja faltando, redireciona para uma página de erro ou mostra uma mensagem
            echo "Erro: Todos os campos obrigatórios precisam ser preenchidos.";
        }
    } elseif ($opcao == 6) {
        header("Location: ../views/exibirVeiculos.php");
        exit();
    } else {
        // Caso a opção seja inválida
        echo "Erro: Opção inválida.";
        exit();
    }
} else {
    echo "Erro: Nenhuma ação foi selecionada.";
    exit();
}
