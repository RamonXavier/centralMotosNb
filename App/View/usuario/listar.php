<?php

require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$_POST['formPost'] = 'buscar';
$listagem = require_once "../../Controller/UsuarioController.php";

// echo '<pre>';
// print_r($listagem);
// echo '</pre>';
?>
<div class="container">
    <div class="row" style="margin-top: 35px;">
        <div class="form-group col-md-3">
            <a href="criar.php" class="btn background_add"><i class="fas fa-plus"></i>Adicionar</a>
        </div>
    </div>
    <div class="div_center">
        <table id="thisTable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Telefone 1</th>
                    <th>Telefone 2</th>
                    <th>Tipo</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listagem as $key => $value) { ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['nome'] ?></td>
                    <td nowrap><?= $value['telefone1'] ?></td>
                    <td nowrap><?= $value['telefone2'] != null ? $value['telefone2'] : 'Não possui' ?></td>
                    <td><?= $value['tipo'] ?></td>
                    <td><a href="../../Controller/UsuarioController.php?formGet=excluir&id=<?= $value['id'] ?>"
                            class="btn btn-warning">Excluir</a></td>
                    <td><a href="editar.php?formGet=buscarPorId&id=<?= $value['id'] ?>"
                            class="btn btn-primary">Editar</a>
                    </td>
                    <td><button onclick="modalExcluir(<?= $value['id'] ?>,'<?= $value['nome'] ?>')"
                            class="btn btn-danger">Alterar
                            Senha</button></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="../../Controller/UsuarioController.php" method="POST">
            <div class="modal-content" style="width: 400px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nova senha
                        <b>
                            <div id="usuarioNome"></div>
                        </b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="usarioExcluir">
                        <label for="senhaUsuario">Nova senha</label>
                        <input hidden type="text" name="idUsuario" id="idUsuario">
                        <input hidden type="text" name="formPost" id="formPost" value="alterarSenha">
                        <input type="text" name="senhaUsuario" class="form-control" id="senhaUsuario">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                    <button type="submit" class=" btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require "../../Structure/importsPagesJs.php"; ?>

<script>
function modalExcluir(id, nome) {
    $('#modalExcluir').modal('show');
    $("#idUsuario").val(id);
    $("#usuarioNome").html(nome);
}
</script>
<?php
require "../../Structure/footer.php";