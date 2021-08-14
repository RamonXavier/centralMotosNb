<?php
require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";
?>

<div class="container">
    <div class="col-md-12" id="div_form">
        <form action="../../Controller/UsuarioController.php" method="POST">
            <fieldset>
                <legend>Cadastro de Usuario</legend>
                <div class="form-group">
                    <label for="nome">Nome do Usuario</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="DepHelp"
                        placeholder="Ex: Alto dos Passos" required>
                    <small id="DepHelp" class="form-text text-muted">Nome descritivo do novo usuario.</small>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="********"
                        required></input>
                    <small id="DepHelp" class="form-text text-muted">Senha para acessar o sistema.</small>
                </div>
                <div class="form-group">
                    <label for="telefone1">Telefone primário</label>
                    <input type="text" name="telefone1" id="telefone1" class="form-control"
                        placeholder="(32) xxxxx-xxxx" required></input>
                    <small id="DepHelp" class="form-text text-muted">O telefone de contato principal.</small>
                </div>
                <div class="form-group">
                    <label for="telefone2">Telefone segundário</label>
                    <input type="text" name="telefone2" id="telefone2" class="form-control"
                        placeholder="(32) xxxxx-xxxx"></input>
                    <small id="DepHelp" class="form-text text-muted">Um segundo telefone de contato.</small>
                </div>
                <div class="form-group">
                    <label for="id_tipo_usuario">Tipo Usuário</label>
                    <select name="id_tipo_usuario" class="form-control" id="id_tipo_usuario" required>
                        <option value="1">Motoboy</option>
                        <option value="2">Administrador</option>
                        <option value="3">Cliente</option>
                        <option value="4">Cliente Administrador</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <input type="hidden" value="criar" name="formPost" id="formPost">
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