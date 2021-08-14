<?php
require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$id = $_GET['id'];
$_GET['formGet'] = 'buscarPorId';
$Usuario = require_once "../../Controller/UsuarioController.php";
?>

<div class="container">
    <div class="col-md-12" id="div_form">
        <form action="../../Controller/UsuarioController.php" method="POST">
            <fieldset>
                <legend>Editar Usuario - <?= $Usuario['nome'] ?></legend>
                <div class="form-group">
                    <label for="nome">Nome do Usuario</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="DepHelp"
                        value="<?= $Usuario['nome'] ?>" placeholder="Ex: Alto dos Passos" required>
                    <small id="DepHelp" class="form-text text-muted">Nome descritivo do novo usuario.</small>
                </div>
                <div class="form-group">
                    <label for="telefone1">Telefone primário</label>
                    <input type="text" name="telefone1" id="telefone1" value="<?= $Usuario['telefone1'] ?>"
                        class="form-control" placeholder="(32) xxxxx-xxxx" required></input>
                    <small id="DepHelp" class="form-text text-muted">O telefone de contato principal.</small>
                </div>
                <div class="form-group">
                    <label for="telefone2">Telefone segundário</label>
                    <input type="text" name="telefone2" id="telefone2" value="<?= $Usuario['telefone2'] ?>"
                        class="form-control" placeholder="(32) xxxxx-xxxx"></input>
                    <small id="DepHelp" class="form-text text-muted">Um segundo telefone de contato.</small>
                </div>
                <div class="form-group">
                    <label for="id_tipo_usuario">Tipo Usuário</label>
                    <select name="id_tipo_usuario" class="form-control" id="id_tipo_usuario" required>
                        <option value="1" <?= $Usuario['idTipoUsuario'] == 1 ? print_r('selected') : '' ?>>Motoboy
                        </option>
                        <option value="2" <?= $Usuario['idTipoUsuario'] == '2' ? 'selected' : '' ?>>Administrador
                        </option>
                        <option value="3" <?= $Usuario['idTipoUsuario'] == 3 ? print_r('selected') : '' ?>>Cliente
                        </option>
                        <option value="4" <?= $Usuario['idTipoUsuario'] == 4 ? print_r('selected') : '' ?>>Cliente
                            Administrador</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <input type="hidden" value="editar" name="formPost" id="formPost">
                        <input type="hidden" value="<?= $Usuario['id'] ?>" name="id" id="id">
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