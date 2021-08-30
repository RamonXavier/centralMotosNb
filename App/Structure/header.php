<?php
$_GET['verificar'] = true;
require "../../Controller/LoginController.php";
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../../View/inicio/inicio.php"><u>Central Motos NB</u></a>
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
                        <a class="dropdown-item" href="../../View/bairro/listar.php">
                            <i class="fa fa-city"></i>
                            Bairros</a>

                        <div class="dropdown-divider"></div>


                        <?php
                        if ($_SESSION['Usuariologin']['idTipoUsuario'] == 2 || $_SESSION['Usuariologin']['idTipoUsuario'] == 4) { ?>
                        <a class="dropdown-item" href="../../View/usuario/listar.php">
                            <i class="fas fa-users"></i>
                            Usuários</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <a class="dropdown-item" href="../../View/pedido/listar.php">
                            <i class="fas fa-receipt"></i>
                            Pedidos</a>

                        <div class="dropdown-divider"></div>

                        <?php
                        if ($_SESSION['Usuariologin']['idTipoUsuario'] == 2 || $_SESSION['Usuariologin']['idTipoUsuario'] == 4 || $_SESSION['Usuariologin']['idTipoUsuario'] == 3) { ?>
                        <a class="dropdown-item" href="../../View/relatorios/relatorioPedidosAbertos.php">
                            <i class="fas fa-clipboard"></i>
                            Relatório de
                            Pedidos</a>
                        <?php } ?>
                    </div>
                </li>
                <?php
                if ($_SESSION['Usuariologin']['idTipoUsuario'] == 2 || $_SESSION['Usuariologin']['idTipoUsuario'] == 4) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Cadastros</a>
                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="../../View/bairro/criar.php">
                            <i class="fa fa-city"></i>
                            Bairros
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="../../View/usuario/criar.php">
                            <i class="fas fa-users"></i>
                            Usuários</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="../../View/pedido/editar.php">
                            <i class="fas fa-receipt"></i>
                            Pedidos</a>
                    </div>
                </li>
                <?php } ?>
                <li class="nav-item dropdown">
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
        </div>
    </nav>