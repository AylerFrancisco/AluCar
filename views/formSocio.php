<?php
require_once "includes/cabecalho.inc.php";
?>
<p>
<h1 class="text-center">Inclusão de Sócio</h1>
<p>

<form class="row g-3" action="../controlers/controlerSocio.php" method="post">
    <div class="col-md-3">
        <label for="pCpf" class="form-label">Cpf</label>
        <input type="text" class="form-control" name="pCpf">
    </div>
    <div class="col-md-6">
        <label for="pNome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="pNome">
    </div>
    <div class="col-md-3">
        <label for="pRg" class="form-label">RG</label>
        <input type="text" class="form-control" name="pRg">
    </div>
    <div class="col-md-3">
        <label for="pEndereco" class="form-label">Endereço</label>
        <input type="text" class="form-control" name="pEndereco">
    </div>
    <div class="col-md-2">
        <label for="pTelefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="pTelefone">
    </div>
    <div class="col-md-4">
        <label for="pEmail" class="form-label">Email</label>
        <input type="text" class="form-control" name="pEmail">
    </div>
    <div class="col-md-2">
        <label for="pSenha" class="form-label">Senha</label>
        <input type="text" class="form-control" name="pSenha">
    </div>
    

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Incluir</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>
    <input type="hidden" name="opcao" value="1">
</form>

<?php
require_once 'includes/rodape.inc.php';
?>