<?php

namespace App\Controller;

use \App\Model\Bairro;
use \App\DAO\BairroDao;

if (
    isset($_GET['formGet']) && $_GET['formGet'] == 'buscarPorId' //condição 1 -  escolhe item para editar
    || isset($_POST['formPost']) && $_POST['formPost'] == 'buscar' //condição 2 - listar items
) {
    require_once "../../../vendor/autoload.php";
}

if (
    isset($_POST['formPost']) && $_POST['formPost'] == 'editar' //condição 1 - recebe novos valores do item para editar
    || isset($_POST['formPost']) && $_POST['formPost'] == 'criar' //condição 2 - recebe novos valores do item para salvar novo
    || isset($_GET['formGet']) && $_GET['formGet'] == 'excluir' //condição 3 - excluir por id
) {
    require_once "../../vendor/autoload.php";
}

if (isset($_POST['formPost']) == true &&  $_POST['formPost'] == 'criar') {
    $bairro = new \App\Model\Bairro();
    $bairro->setNome($_POST['nome']);
    $bairro->setValorEntrega($_POST['valor_entrega']);

    $bairroDao = new \App\DAO\BairroDao();
    $bairroDao->Criar($bairro);
    header("Location: ../View/bairro/listar.php");
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'buscar') {
    $bairroDao = new \App\DAO\BairroDao();
    $listaBairro = $bairroDao->Buscar();
    return $listaBairro;
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'excluir') {
    $bairro = new \App\Model\Bairro();
    $bairro->setId($_GET['id']);

    $bairroDao = new \App\DAO\bairroDao();
    $bairroDao->Excluir($bairro);
    header("Location: ../View/bairro/listar.php");
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'buscarPorId') {
    $bairro = new \App\Model\Bairro();
    $bairro->setId($_GET['id']);

    $bairroDao = new \App\DAO\BairroDao();
    $bairroEscolhido = $bairroDao->BuscarPorId($bairro);
    return $bairroEscolhido;
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'editar') {
    $bairro = new \App\Model\Bairro();
    $bairro->setId($_POST['id']);
    $bairro->setNome($_POST['nome']);
    $bairro->setValorEntrega($_POST['valor_entrega']);

    $bairroDao = new \App\DAO\bairroDao();
    $bairroDao->Editar($bairro);
    header("Location: ../View/bairro/listar.php");
}