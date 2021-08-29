<?php

namespace App\Controller;

use \App\Model\Pedido;
use \App\DAO\PedidoDAO;

if (
    isset($_GET['formGet']) && $_GET['formGet'] == 'buscarPorId' //condição 1 -  escolhe item para editar
    || isset($_POST['formPost']) && $_POST['formPost'] == 'buscar' //condição 2 - listar items
    || isset($_GET['formGet']) && $_GET['formGet'] == 'buscarStatus' //condição 3 - listar status pedido
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

    $bairroDestino = $_POST['bairro_destino'];
    $bairroDestino_explode = explode('|', $bairroDestino);
    $bairro = $bairroDestino_explode[0];
    $valor_entrega = $bairroDestino_explode[1];

    $pedido = new \App\Model\Pedido();
    $pedido->setDescricao($_POST['descricao']);
    $pedido->setId_status_pedido($_POST['status']);
    $pedido->setDt_conclusao($_POST['dt_conclusao']);
    $pedido->setDt_prazo($_POST['dt_prazo']);
    $pedido->setId_bairro_destino($bairro);
    $pedido->setId_valor_entrega($valor_entrega);
    $pedido->setId_bairro_origem($_POST['bairro_origem']);
    $pedido->setId_motoboy($_POST['motoboy']);
    //$pedido->setId_usuario($_POST['usuario']);

    $pedidoDAO = new \App\DAO\PedidoDAO();
    $pedidoDAO->Criar($pedido);
    header("Location: ../View/pedido/listar.php");
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'buscar') {
    $pedidoDAO = new \App\DAO\PedidoDAO();
    $listaPedido = $pedidoDAO->Buscar();
    return $listaPedido;
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'excluir') {
    $pedido = new \App\Model\Pedido();
    $pedido->setId($_GET['id']);

    $pedidoDao = new \App\DAO\PedidoDAO();
    $pedidoDao->Excluir($pedido);
    header("Location: ../View/pedido/listar.php");
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'buscarPorId') {
    $pedido = new \App\Model\Pedido();
    $pedido->setId($_GET['id']);

    $pedidoDao = new \App\DAO\PedidoDAO();
    $pedidoEscolhido = $pedidoDao->BuscarPorId($pedido);
    return $pedidoEscolhido;
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'buscarStatus') {
    $pedidoDao = new \App\DAO\PedidoDAO();
    $listaStatus = $pedidoDao->BuscarStatus();
    return $listaStatus;
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'editar') {

    $bairroDestino = $_POST['bairro_destino'];
    $bairroDestino_explode = explode('|', $bairroDestino);
    $bairro = $bairroDestino_explode[0];
    $valor_entrega = $bairroDestino_explode[1];

    $pedido = new \App\Model\Pedido();
    $pedido->setId($_POST['id']);
    $pedido->setId_status_pedido($_POST['status']);
    $pedido->setDescricao($_POST['descricao']);
    $pedido->setDt_conclusao($_POST['dt_conclusao']);
    $pedido->setDt_prazo($_POST['dt_prazo']);
    $pedido->setId_bairro_destino($bairro);
    $pedido->setId_valor_entrega($valor_entrega);
    $pedido->setId_bairro_origem($_POST['bairro_origem']);
    $pedido->setId_motoboy($_POST['motoboy']);
    //$pedido->setId_usuario($_POST['usuario']);

    $pedidoDao = new \App\DAO\PedidoDAO();
    $pedidoDao->Editar($pedido);
    header("Location: ../View/pedido/listar.php");
}