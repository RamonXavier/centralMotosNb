<?php
$_POST['perfis'] = true;
$_POST['permissao'][] = [2, 3, 4];
require "../../Controller/LoginController.php";
$_POST = null;

require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";

$id = $_GET['id'];
$_GET['formGet'] = 'buscarPorId';
$pedido = require_once "../../Controller/PedidoController.php";

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
                <legend>Editar Pedido -
                    <?php echo $pedido['id'] ?>
                </legend>
                <div class="col-12 row">

                    <div class="form-group col-6">
                        <label for="dt_criacao">Data Criação</label>
                        <input type="date" name="dt_criacao" id="dt_criacao"
                            value="<?= $pedido['dt_criacao'] == '0000-00-00 00:00:00' ? ' ' :  date('Y-m-d', strtotime($pedido['dt_criacao'])) ?>"
                            class="form-control" placeholder="15.00" readonly></input>
                        <small id="DepHelp" class="form-text text-muted">Data de criação do pedido.</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="dt_prazo">Data de Prazo </label>
                        <input type="date" name="dt_prazo" id="dt_prazo"
                            value="<?= $pedido['dt_prazo'] == '0000-00-00 00:00:00' ? ' ' :  date('Y-m-d', strtotime($pedido['dt_prazo'])) ?>"
                            class="form-control" placeholder="15.00"></input>
                        <small id="DepHelp" class="form-text text-muted">O valor que será cobrado para entregar neste
                            bairro.</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="dt_conclusao">Data de Conclusão </label>
                        <input type="date" name="dt_conclusao" id="dt_conclusao"
                            value="<?= $pedido['dt_conclusao'] == '0000-00-00 00:00:00' ? ' ' :  date('Y-m-d', strtotime($pedido['dt_conclusao'])) ?>"
                            class="form-control" placeholder="15.00"></input>
                        <small id="DepHelp" class="form-text text-muted">O valor que será cobrado para entregar neste
                            bairro.</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="motoboy">Entregador</label>
                        <select name="motoboy" id="motoboy" class="form-control">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($listaMotoboy as $key => $value) {
                                $selecionado = '';
                                if ($value['id'] == $pedido['id_motoboy']) {
                                    $selecionado = "selected";
                                } ?>
                            <option value="<?= $value['id'] ?>" <?= $selecionado ?>><?= $value['nome'] ?></option>
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
                                $selecionado = '';
                                if ($value['id'] == $pedido['id_status_pedido']) {
                                    $selecionado = "selected";
                                }
                            ?>
                            <option value="<?= $value['id'] ?>" <?= $selecionado ?>><?= $value['nome'] ?></option>
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
                                $selecionado = '';
                                if ($value['id'] == $pedido['id_bairro_origem']) {
                                    $selecionado = "selected";
                                }
                            ?>
                            <option value="<?= $value['id'] ?>" <?= $selecionado ?>>
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
                                $selecionado = '';
                                if ($value['id'] == $pedido['id_bairro_destino']) {
                                    $selecionado = "selected";
                                }
                            ?>
                            <option value="<?= $value['id'] ?>|<?= $value['valor_entrega'] ?>">
                                <?= $value['nome'] ?> - Valor de entrega: R$<?= $value['valor_entrega'] ?>
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
                            placeholder="Ex: Objeto frágil, entregar em mãos a Pedro"><?= $pedido['descricao'] ?></textarea>
                        <small id="DepHelp" class="form-text text-muted">Informe aqui o endereço, descrição e
                            orientações do pedido.</small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <input type="hidden" value="editar" name="formPost" id="formPost">
                        <input type="hidden" value="<?= $pedido['id'] ?>" name="id" id="id">

                        <?php
                        $bloqueado = '';
                        if ($pedido['id_status_pedido'] == 3 ||  $pedido['id_status_pedido'] == 4) {
                            if ($_SESSION['Usuariologin']['idTipoUsuario'] != 2) {
                                $bloqueado = 'disabled';
                            }
                        } ?>

                        <button type="submit" class="btn btn-primary" <?= $bloqueado ?>>Salvar</button>

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