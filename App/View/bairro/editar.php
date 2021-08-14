<?php
require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$id = $_GET['id'];
$_GET['formGet'] = 'buscarPorId';
$bairro = require_once "../../Controller/BairroController.php";
?>

<div class="container">
    <div class="col-md-12" id="div_form">
        <form action="../../Controller/BairroController.php" method="POST">
            <fieldset>
                <legend>Editar bairro - <?= $bairro['nome'] ?></legend>
                <div class="form-group">
                    <label for="nome">Nome do Bairro</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="DepHelp"
                        value="<?= $bairro['nome'] ?>" placeholder="Ex: Alto dos Passos">
                    <small id="DepHelp" class="form-text text-muted">Nome descritivo do novo bairro.</small>
                </div>
                <div class="form-group">
                    <label for="valor_entrega">Valor de entrega</label>
                    <input type="text" name="valor_entrega" id="valor_entrega" value="<?= $bairro['valor_entrega'] ?>"
                        class="form-control" placeholder="15.00"></input>
                    <small id="DepHelp" class="form-text text-muted">O valor que será cobrado para entregar neste
                        bairro.</small>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <input type="hidden" value="editar" name="formPost" id="formPost">
                        <input type="hidden" value="<?= $bairro['id'] ?>" name="id" id="id">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <div class="form-group col-md-3">
                        <a href="listar.php" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php
require "../../Structure/importsPagesJs.php"; ?>
<script>
$('#valor_entrega').mask("#.##0.00", {
    reverse: true
});
</script>
<?php
require "../../Structure/footer.php";