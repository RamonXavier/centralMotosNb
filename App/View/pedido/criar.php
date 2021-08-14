<?php
require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$_GET['formGet'] = "buscarStatus";
$listaStatus = require "../../Controller/PedidoController.php";

$_POST['formPost'] = "buscar";
$listaBairro = require "../../Controller/BairroController.php";

$_POST['formPost'] = '';
$_GET['formGet'] = 'buscarPorTipo';
$_GET['tipoUsuario'] = '1';
$listaMotoboy = require "../../Controller/UsuarioController.php";
?>

<div class="container">
    <div class="col-md-12" id="div_form">
        <form action="../../Controller/PedidoController.php" method="POST">
            <fieldset>
                <legend>Criar Pedido</legend>
                <div class="col-12 row">

                    <div class="form-group col-6">
                        <label for="dt_prazo">Data de Prazo </label>
                        <input type="date" name="dt_prazo" id="dt_prazo" value="" class="form-control"></input>
                        <small id="DepHelp" class="form-text text-muted">O valor que será cobrado para entregar neste
                            bairro.</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="dt_conclusao">Data de Conclusão </label>
                        <input readonly type="date" name="dt_conclusao" id="dt_conclusao"
                            value="<?= $pedido['dt_conclusao'] == '0000-00-00 00:00:00' ? ' ' :  date('Y-m-d', strtotime($pedido['dt_conclusao'])) ?>"
                            class="form-control"></input>
                        <small id="DepHelp" class="form-text text-muted">O valor que será cobrado para entregar neste
                            bairro.</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="motoboy">Entregador</label>
                        <select name="motoboy" id="motoboy" class="form-control">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($listaMotoboy as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                            <?php }
                            ?>
                        </select>
                        <small id="DepHelp" class="form-text text-muted">Entregador responsável pela entrega.</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="status">Status da Entrega</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($listaStatus as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                            <?php }
                            ?>
                        </select>
                        <small id="DepHelp" class="form-text text-muted">Estado atual da entrega.</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="bairro_origem">Bairro de origem</label>
                        <select name="bairro_origem" id="bairro_origem" class="form-control">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($listaBairro as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>">
                                <?= $value['nome'] ?> </option>
                            <?php }
                            ?>
                        </select>
                        <small id="DepHelp" class="form-text text-muted">Local de saída da entrega.</small>
                    </div>

                    <div class="form-group col-12">
                        <label for="bairro_destino">Bairro de destino</label>
                        <select name="bairro_destino" id="bairro_destino" class="form-control">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($listaBairro as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>">
                                <?= $value['nome'] ?> - R$<?= $value['valor_entrega'] ?>
                            </option>
                            <?php }
                            ?>
                        </select>
                        <small id="DepHelp" class="form-text text-muted">Local de entrega do pedido.</small>
                    </div>

                    <div class="form-group col-12">
                        <label for="descricao">Descrição Pedido</label>
                        <textarea rows="4" class="form-control" id="descricao" name="descricao"
                            aria-describedby="DepHelp"
                            placeholder="Ex: Objeto frágil, entregar em mãos a Pedro"></textarea>
                        <small id="DepHelp" class="form-text text-muted">Informe aqui o endereço, descrição e
                            orientações do pedido.</small>
                    </div>
                </div>
                <div class="row container">
                    <div class="form-group">
                        <input type="hidden" value="criar" name="formPost" id="formPost">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <div class="form-group col-md-3">
                        <a href="listar.php" class="btn btn-secondary">Listar Pedidos</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";