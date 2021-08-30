<?php

require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$_POST['formPost'] = 'buscar';
$listagem = require_once "../../Controller/PedidoController.php";
?>
<div class="container" style="max-width: 1539px;">
    <div class="row" style="margin-top: 35px;">
        <div class="form-group col-md-3">
            <a href="criar.php" class="btn background_add"><i class="fas fa-plus"></i>Adicionar</a>
        </div>
    </div>
    <div class="div_center">
        <table id="thisTable">
            <thead>
                <tr>
                    <th>Número Pedido</th>
                    <th style="width: 130px;">Data Criação</th>
                    <th style="width: 130px;">Data Prazo</th>
                    <th style="width: 130px;">Data Conclusão</th>
                    <th style="width: 130px;">Status</th>
                    <th style="width: 130px;">Abertura Pedido</th>
                    <th style="width: 130px;">Entregador</th>
                    <th style="width: 160px;">Bairro origem</th>
                    <th style="width: 160px;">Bairro destino</th>
                    <th style="width: 130px;">Valor</th>

                    <?php
                    if ($_SESSION['Usuariologin']['idTipoUsuario'] == 2 || $_SESSION['Usuariologin']['idTipoUsuario'] == 4) { ?>
                    <th> </th>
                    <th> </th>
                    <?php } ?>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listagem as $key => $value) {
                    $corDestaque = "green";
                    if ($value['dt_prazo'] > $value['dt_conclusao'] || !$value['dt_conclusao']) {
                        $corDestaque = "red";
                    }
                ?>
                <tr style="color: <?= $corDestaque ?>">
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['dt_criacao'] == '0000-00-00 00:00:00' ? ' ' : date('d-m-Y', strtotime($value['dt_criacao'])) ?>
                    </td>
                    <td><?= $value['dt_prazo'] == '0000-00-00 00:00:00' ? ' ' : date('d-m-Y', strtotime($value['dt_prazo'])) ?>
                    </td>
                    <td><?= $value['dt_conclusao']  == '0000-00-00 00:00:00' ? ' ' : date('d-m-Y', strtotime($value['dt_conclusao'])) ?>
                    </td>
                    <td><?= $value['Status'] ?></td>
                    <td><?= $value['Usuario'] ?></td>
                    <td><?= $value['Motoboy'] ?></td>
                    <td><?= $value['Bairro_origem'] ?></td>
                    <td><?= $value['Bairro_destino'] ?></td>
                    <td><?= $value['Valor'] ?></td>

                    <?php
                        if ($_SESSION['Usuariologin']['idTipoUsuario'] == 2 || $_SESSION['Usuariologin']['idTipoUsuario'] == 4) {
                            if ($_SESSION['Usuariologin']['idTipoUsuario'] == 2) { ?>
                    <td><a href="../../Controller/PedidoController.php?formGet=excluir&id=<?= $value['id'] ?>"
                            class="btn btn-warning">Excluir</a></td>
                    <?php } ?>

                    <td><a href="editar.php?formGet=buscarPorId&id=<?= $value['id'] ?>"
                            class="btn btn-primary">Editar</a></td>

                    <?php } ?>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";