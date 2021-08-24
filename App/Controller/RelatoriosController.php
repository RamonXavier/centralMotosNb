<?php 

namespace App\Controller;

use \App\Model\Pedido;
use \App\DAO\PedidoDAO;

if (
    isset($_GET['formGet']) && $_GET['formGet'] == 'buscarPorId' //condição 1 -  escolhe item para editar
    || isset($_POST['formPost']) && $_POST['formPost'] == 'buscar' //condição 2 - listar items
    || isset($_POST['formPost']) && $_POST['formPost'] == 'buscarStatus' //condição 3 - listar statusPedido
) {
    require_once "../../../vendor/autoload.php";
}

if (
    isset($_POST['formPost']) && $_POST['formPost'] == 'editar' //condição 1 - recebe novos valores do item para editar
    || isset($_POST['formPost']) && $_POST['formPost'] == 'criar' //condição 2 - recebe novos valores do item para salvar novo
    || isset($_GET['formGet']) && $_GET['formGet'] == 'excluir' //condição 3 - excluir por id
    ||isset($_GET['formGet']) && $_GET['formGet'] == 'formFilter_relatorioPedido' //condição 4 -  formulário filtro rel. pedido
) {
    require_once "../../vendor/autoload.php";
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'buscar') {
    $relatorioDAO = new \App\DAO\RelatorioDAO();
    $lista = $relatorioDAO->Buscar();
    return $lista;
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'buscarStatus') {
    $relatorioDAO = new \App\DAO\RelatorioDAO();
    $lista = $relatorioDAO->BuscarStatus();
    return $lista;
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'formFilter_relatorioPedido') {
    $relatorioDAO = new \App\DAO\RelatorioDAO();
    $status = isset($_GET['statusPedido'])  ? $_GET['statusPedido'] : null;
    $dtInicio = isset($_GET['dataInicial'])? $_GET['dataInicial'] : null ;
    $dtFim = isset($_GET['dataFinal']) ? $_GET['dataFinal'] : null;

    $lista = $relatorioDAO->BuscarFiltrado($status, $dtInicio, $dtFim);
    // return $lista;
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

   // header('Location: ../View/relatorios/relatorioPedidosAbertos.php');
}


?>