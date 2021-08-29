<?php
$_GET['verificar'] = true;
require "../../Controller/LoginController.php";
require "../../Structure/importsPagesStyle.php";
require "../../Structure/header.php";
?>
<br>
<center>
    <div class="container">
        <h1>Central Motos NB</h1>
    </div>
    <p>
        Gestão de entregas rápidas Central Motos NB
    </p>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-3 px-1">
                <div class="card" style="width: 18rem; height: 20rem;">
                    <img class="card-img-top" src="../../img/1.jpg" alt="Card image cap"
                        style="height: 155px; width: 285px;">
                    <div class="card-body">
                        <h5 class="card-title">Pedidos</h5>
                        <p class="card-text">Gestão de pedidos.</p>
                        <a href="../pedido/listar.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="col-3 px-1">
                <div class="card" style="width: 18rem; height:20rem">
                    <img class="card-img-top" src="../../img/3.jpg" alt="Card image cap"
                        tyle="height: 200px; width: 280px;">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Gestão de usuários do sistema.</p>
                        <a href="../usuario/listar.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-3 px-1">
                <div class="card" style="width: 18rem; height:20rem">
                    <img class="card-img-top" src="../../img/2.jpg" alt="Card image cap"
                        style="height: 150px; width: 280px;">
                    <div class="card-body">
                        <h5 class="card-title">Bairros</h5>
                        <p class="card-text">Gestão de Bairros.</p>
                        <a href="../bairro/listar.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-3 px-1">
                <div class="card" style="width: 18rem; height: 20rem;">
                    <img class="card-img-top" src="../../img/1.jpg" alt="Card image cap"
                        style="height: 155px; width: 285px;">
                    <div class="card-body">
                        <h5 class="card-title">Relatórios</h5>
                        <p class="card-text">Relatórios de Pedidos.</p>
                        <a href="../relatorio/pedidos.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
<?php
require "../../Structure/importsPagesJs.php";
require "../../Structure/footer.php";