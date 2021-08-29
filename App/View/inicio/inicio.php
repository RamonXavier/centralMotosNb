<?php
$_GET['verificar'] = true;
require "../../Controller/LoginController.php";
require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";
?>
<link rel="stylesheet" href="inicio.css">
<br>
<div class="container col-12">
    <h1>Central Motos NB</h1>

    <p>
        Gestão de entregas rápidas Central Motos NB
    </p>

    <div class="row">
        <div class="col-12 col-md-3 col-lg-3 col-xl-3 card_item">
            <div class="card">
                <div class="card-header card_header_person1"></div>
                <div class="card-body">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text">Gestão de pedidos.</p>
                    <a href="../pedido/listar.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg-3 col-xl-3 card_item">
            <div class="card">
                <div class="card-header card_header_person2"></div>
                <div class="card-body">
                    <h5 class="card-title">Bairros</h5>
                    <p class="card-text">Gestão de Bairros.</p>
                    <a href="../bairro/listar.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg-3 col-xl-3 card_item">
            <div class="card">
                <div class="card-header card_header_person3"></div>
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Gestão de usuários do sistema.</p>
                    <a href="../usuario/listar.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg-3 col-xl-3 card_item">
            <div class="card">
                <div class="card-header card_header_person4"></div>
                <div class="card-body">
                    <h5 class="card-title">Relatórios</h5>
                    <p class="card-text">Relatórios de Pedidos.</p>
                    <a href="../relatorio/pedidos.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";