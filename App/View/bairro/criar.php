<?php
require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";
?>
<div class="container">
    <div class="col-md-12" id="div_form">
        <form action="../../Controller/BairroController.php" method="POST">
            <fieldset>
                <legend>Cadastro de Bairro</legend>
                <div class="form-group">
                    <label for="nome">Nome do Bairro</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="DepHelp"
                        placeholder="Ex: Alto dos Passos">
                    <small id="DepHelp" class="form-text text-muted">Nome descritivo do novo bairro.</small>
                </div>
                <div class="form-group">
                    <label for="valor_entrega">Valor Entrega</label>
                    <input type="text" name="valor_entrega" id="valor_entrega" class="form-control"
                        placeholder="15.00"></input>
                    <small id="DepHelp" class="form-text text-muted">O valor que será cobrado para entregar neste
                        bairro.</small>
                </div>
                <div class="row container">
                    <div class="form-group">
                        <input type="hidden" value="criar" name="formPost" id="formPost">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <div class="form-group col-md-3">
                        <a href="listar.php" class="btn btn-secondary">Listar Bairros</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";