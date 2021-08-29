<?php
$_GET['verificar'] = true;
require "../../Controller/LoginController.php";
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../../View/inicio/inicio.php">Central Motos NB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto row">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Listagens</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../View/bairro/listar.php">Bairros</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../View/usuario/listar.php">Usuários</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../View/pedido/listar.php">Pedidos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../View/relatorios/relatorioPedidosAbertos.php">Relatório de
                            Pedidos</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Cadastros</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../View/bairro/criar.php">Bairros</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../View/usuario/criar.php">Usuários</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../View/pedido/editar.php">Pedidos</a>
                    </div>
                </li>
                <li class="nav-item dropdown d-flex flex-row-reverse">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Configurações</a>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#one" disabled> <i class="fas fa-user"></i> Perfil</a>
                        <a class="dropdown-item" href="#two" disabled><i class="fas fa-phone-square"></i> Chamado</a> -->
                        <!-- <div role="separator" class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="../../Controller/LoginController.php?logout=true"><i
                                class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </li>
            </ul>
            <!-- <form class="form-inline my-4 my-lg-0" action="relatorioEmpregadoFiltro.php" method="GET">
                <input class="form-control mr-sm-4" type="text" placeholder="Busca rápida de pedido" name="buscaEmp">
                <input type="hidden" name="formGet" value="listarFiltro">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button><br>
                <span style="font-size: 7px; margin-left: 5px;">Atenção, texto Case Sensitive</span>
            </form> -->
        </div>
    </nav>