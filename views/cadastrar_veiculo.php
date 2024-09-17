<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Cadastrar Veículo</h2>
        <form action="processa_cadastro_veiculo.php" method="POST">
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="anoFabricacao" class="form-label">Ano de Fabricação</label>
                <input type="number" class="form-control" id="anoFabricacao" name="anoFabricacao" required>
            </div>
            <div class="mb-3">
                <label for="fabricante" class="form-label">Fabricante</label>
                <input type="text" class="form-control" id="fabricante" name="fabricante" required>
            </div>
            <div class="mb-3">
                <label for="opcionais" class="form-label">Opcionais</label>
                <textarea class="form-control" id="opcionais" name="opcionais"></textarea>
            </div>
            <div class="mb-3">
                <label for="motorizacao" class="form-label">Motorização</label>
                <input type="text" class="form-control" id="motorizacao" name="motorizacao" required>
            </div>
            <div class="mb-3">
                <label for="valorBase" class="form-label">Valor Base</label>
                <input type="number" step="0.01" class="form-control" id="valorBase" name="valorBase" required>
            </div>
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select class="form-select" id="id_categoria" name="id_categoria" required>
                    <option value="1">SUV</option>
                    <option value="2">Passeio</option>
                    <option value="3">Van</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>