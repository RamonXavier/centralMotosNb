<?php

require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$_POST['formPost'] = 'buscar';
$listagem = require_once "../../Controller/BairroController.php";
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
                    <th>Valor Entrega</th>
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
                    <td>R$ <?= $value['valor_entrega'] ?></td>
                    <td><a href="../../Controller/BairroController.php?formGet=excluir&id=<?= $value['id'] ?>"
                            class="btn btn-warning">Excluir</a></td>
                    <td><a href="editar.php?formGet=buscarPorId&id=<?= $value['id'] ?>"
                            class="btn btn-primary">Editar</a>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";