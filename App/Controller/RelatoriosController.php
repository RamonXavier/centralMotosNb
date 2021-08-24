<?php 
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

use \App\DAO\RelatorioDAO;

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'buscar') {
    $relatorioDAO = new \App\DAO\RelatorioDAO();
    $lista = $relatorioDAO->Buscar();
    echo "<pre>";
    print_r($lista);
    echo "</pre>";
    //return $lista;
}


?>