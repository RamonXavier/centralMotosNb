<?php

namespace App\Controller;

use \App\Model\Login;
use \App\Config\LogarConfig;

if (
    isset($_GET['verificar']) && $_GET['verificar'] == true
    || isset($_POST['perfis']) && $_POST['perfis'] == true
) {
    require_once "../../../vendor/autoload.php";
}

if (
    isset($_POST['formPost']) && $_POST['formPost'] == 'logar'
    || isset($_GET['logout']) && $_GET['logout'] == true
) {
    require_once "../../vendor/autoload.php";
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'logar') {
    $loginConfig = new \App\Config\LogarConfig;
    $loginModel = new \App\Model\Login();

    $loginModel->setNome($_POST['nome']);
    $loginModel->setSenha($_POST['senha']);

    $returnLogin = $loginConfig->Logar($loginModel);
    if ($returnLogin) {
        header("Location: ../View/inicio/inicio.php");
    } else {
        header("Location: ../View/inicio/login.php?error=true");
    }
}

if (isset($_GET['verificar']) == true && $_GET['verificar'] == true) {
    $loginConfig = new \App\Config\LogarConfig;
    $loginConfig->VerificarLogin();
}

if (isset($_GET['logout']) == true && $_GET['logout'] == true) {
    session_start();
    if (session_destroy()) {
        header("Location: ../View/inicio/login.php");
    }
}

if (isset($_POST['perfis']) == true && $_POST['perfis'] == true) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $permitido = false;
    foreach ($_POST['permissao'][0] as $key => $value) {
        echo 'aaaa';
        if ($value == $_SESSION['Usuariologin']['idTipoUsuario'])
            $permitido = true;
    }
    if ($permitido == false)
        header("Location: ../pageAlert/semPermissao.php");
}