<?php

require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$_POST['formPost'] = 'buscar';
$listaPedidos = require_once "../../Controller/PedidoController.php";

// echo "<pre>";
// print_r($listaPedidos);
// echo "</pre>";
?>

<div class="container">

<div id="accordion"  style="margin-top: 3rem;">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="m-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-filter"></i>Clique para exibir/fechar
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
    <div class="card-body">
            <h5 class="card-title">Filtro</h5>
                <form action="../Controller/EmpregadoController.php" method="GET">
                    <div class="row col-12">
                        <div class="form-group col-6">
                            <label for="selectProj">Status dos pedidos</label>
                            <select class="form-control" id="selectProj" name="selectProj">
                                <option value="">SELECIONE...</option>
                                <?php foreach ($listarProjetos as $key => $value) { ?>
                                <option value="<?= $value['codigo'] ?>"><?= $value['descricao'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-3">
                                <label for="dataInicial">Período Inicial</label>
                                <input class="form-control" type="date" name="dataInicial" id="dataInicial">
                        </div>
                        <div class="form-group col-3">
                            <label for="dataFinal">Período Final</label>
                            <input class="form-control" type="date" name="dataFinal" id="dataFinal">
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="formGet" value="buscaRelEmp_Proj_null">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                    </div>
                </form>
        </div>
    </div>
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
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaPedidos as $key => $value) {
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
                    <td><a href="../pedido/editar.php?formGet=buscarPorId&id=<?= $value['id'] ?>"
                            class="btn btn-primary">Editar</a></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";
?>