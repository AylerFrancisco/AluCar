<?php
require_once '../classes/socio.inc.php';
require_once "includes/cabecalho.inc.php";


$socio = $_SESSION['socio'];
?>
<p>
<h1 class="text-center">Atualizar Sócio</h1>
<p>

<form class="row g-3" action="../controlers/controlerSocio.php?opcao=2" method="post">
    <div class="col-md-3">
        <label for="pCpf" class="form-label">Cpf:</label>
        <input type="text" class="form-control" name="pCpf" value="<?= $socio->cpf ?>">
    </div>
    <div class="col-md-6">
        <label for="pNome" class="form-label">Nome:</label>
        <input type="text" class="form-control" name="pNome" value="<?php echo $socio->nome ?>">
    </div>
    <div class="col-md-3">
        <label for="pRg" class="form-label">RG:</label>
        <input type="text" class="form-control" name="pRg" value="<?php echo $socio->rg ?>">
    </div>
    <div class="col-md-3">
        <label for="pEndereco" class="form-label">Endereço:</label>
        <input type="text" class="form-control" name="pEndereco" value="<?php echo $socio->endereco ?>">
    </div>
    <div class="col-md-2">
        <label for="pTelefone" class="form-label">Telefone:</label>
        <input type="text" class="form-control" name="pTelefone" value="<?php echo $socio->telefone ?>">
    </div>
    <div class="col-md-4">
        <label for="pEmail" class="form-label">Email:</label>
        <input type="text" class="form-control" name="pEmail" value="<?php echo $socio->email ?>">
    </div>
    <div class="col-md-2">
        <label for="pEmail" class="form-label">Senha:</label>
        <input type="text" class="form-control" name="pSenha" value="<?php echo $socio->senha ?>">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-success">Alterar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>
    <input type="hidden" name="opcao" value="5">
</form>

<?php
require_once 'includes/rodape.inc.php';
?>