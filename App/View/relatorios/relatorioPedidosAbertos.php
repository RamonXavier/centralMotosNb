<?php

require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$_POST['formPost'] = 'buscarStatus';
$listaStatus = require "../../Controller/RelatoriosController.php";
$listaPedidos = [];

$colunaInput = 6;
if ($_SESSION['Usuariologin']['idTipoUsuario'] == 1) {
    $_GET['id'] = $_SESSION['Usuariologin']['id'];
    $_GET['formGetAux'] = 'buscarPorId';
    $usuario = require "../../Controller/UsuarioController.php";
    $colunaInput = 3;
}

if (isset($_GET['formGet'])) {
    $_POST['formPost'] = 'formFilter_relatorioPedido';
    $listaPedidos = require "../../Controller/RelatoriosController.php";
}
?>

<div class="container">

    <div id="accordion" style="margin-top: 3rem;">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="m-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        <i class="fas fa-filter"></i>Clique para exibir/fechar
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <h5 class="card-title">Filtro</h5>
                    <form action="#" method="GET">
                        <div class="row col-12">
                            <div class="form-group col-<?= $colunaInput ?>">
                                <label for="statusPedido">Status dos pedidos</label>
                                <select class="form-control" id="statusPedido" name="statusPedido" required>
                                    <option value="">SELECIONE...</option>
                                    <?php foreach ($listaStatus as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php if ($_SESSION['Usuariologin']['idTipoUsuario'] == 1) { ?>
                            <div class="form-group col-<?= $colunaInput ?>">
                                <label for="id_entregador">Entregador</label>
                                <select class="form-control" name="id_entregador" id="id_entregador" disabled required>
                                    <option value="<?= $usuario['id'] ?>" selected><?= $usuario['nome'] ?></option>
                                </select>
                            </div>
                            <?php } ?>
                            <div class="form-group col-3">
                                <label for="dataInicial">Per??odo Inicial</label>
                                <input class="form-control" type="date" name="dataInicial" id="dataInicial" required>
                                <small>Inicio da data de conclus??o dos pedidos</small>
                            </div>
                            <div class="form-group col-3">
                                <label for="dataFinal">Per??odo Final</label>
                                <input class="form-control" type="date" name="dataFinal" id="dataFinal" required>
                                <small>Fim da data de conclus??o dos pedidos</small>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="formGet" value="formFilter_relatorioPedido">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_GET['formGet'])) { ?>
    <div class="div_center">
        <div class="mb-1 text-right">
            <button id="exporttable" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="">
                <i class="fas fa-file-excel"></i> Baixar Excel
            </button>
        </div>
        <table id="thisTable">
            <thead>
                <tr>
                    <th>N??mero Pedido</th>
                    <th style="width: 130px;">Data Cria????o</th>
                    <th style="width: 130px;">Data Prazo</th>
                    <th style="width: 130px;">Data Conclus??o</th>
                    <th style="width: 130px;">Status</th>
                    <th style="width: 130px;">Abertura Pedido</th>
                    <th style="width: 130px;">Entregador</th>
                    <th style="width: 160px;">Bairro origem</th>
                    <th style="width: 160px;">Bairro destino</th>
                    <th style="width: 130px;">Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $valorTotal = 00.00;
                    if (is_array($listaPedidos)) {
                        foreach ($listaPedidos as $key => $value) {
                            $valorTotal += (float)filter_var($value['Valor'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
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
                </tr>
                <?php  }
                    } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
    <?php
    if (isset($_GET['formGet'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        O per??do de
        <strong><?= $_GET['dataInicial'] == '0000-00-00 00:00:00' ? ' ' : date('d-m-Y', strtotime($_GET['dataInicial'])) ?>
        </strong>
        at??
        <strong><?= $_GET['dataFinal'] == '0000-00-00 00:00:00' ? ' ' : date('d-m-Y', strtotime($_GET['dataFinal'])) ?></strong>
        Gerou um total de
        <strong>R$
            <span class="custoTotal">
                <?= (float)filter_var($valorTotal, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) ?>
            </span>
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>
</div>

<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";
?>
<script>
$(function() {
    $("#exporttable").click(function(e) {
        var table = $("#thisTable");
        if (table && table.length) {
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "Lista de pagamento" + new Date().toLocaleDateString("pt-Br").replace(
                        /[\-\:\.]/g,
                        "") +
                    ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: false
            });
        }
    });

});
</script>