<?php
// Verifica se o parâmetro 'opcao' foi passado na URL
if (isset($_GET['opcao'])) {
    $opcao = $_GET['opcao'];

    // Verifica se a opção é 6 (Carros disponíveis)
    if ($opcao == 6) {
        // Redireciona para a página exibirCarros.php
        header('Location: ../views/exibirCarros.php');
        exit(); // Para garantir que o script pare após o redirecionamento
    } else {
        // Se a opção não for 6, redireciona para uma página de erro ou faz outra ação
        header('Location: ../views/error.php');
        exit();
    }
} else {
    // Caso o parâmetro 'opcao' não seja passado, redireciona para uma página de erro
    header('Location: ../views/error.php');
    exit();
}
