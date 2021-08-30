<?php

namespace App\Controller;

use \App\Model\Usuario;
use \App\DAO\UsuarioDao;

if (
    isset($_GET['formGet']) && $_GET['formGet'] == 'buscarPorId' //condição 1 -  escolhe item para editar
    || isset($_GET['formGetAux']) && $_GET['formGetAux'] == 'buscarPorId' //condição 1 -  escolhe item para editar
    || isset($_GET['formGet']) && $_GET['formGet'] == 'buscarPorTipo' //condição 1 -  escolhe item para editar
    || isset($_POST['formPost']) && $_POST['formPost'] == 'buscar' //condição 2 - listar items
) {
    require_once "../../../vendor/autoload.php";
}

if (
    isset($_POST['formPost']) && $_POST['formPost'] == 'editar' //condição 1 - recebe novos valores do item para editar
    || isset($_POST['formPost']) && $_POST['formPost'] == 'criar' //condição 2 - recebe novos valores do item para salvar novo
    || isset($_GET['formGet']) && $_GET['formGet'] == 'excluir' //condição 3 - excluir por id
    || isset($_POST['formPost']) && $_POST['formPost'] == 'alterarSenha' //condição 4 - alterar senha usuario
) {
    require_once "../../vendor/autoload.php";
}

if (isset($_POST['formPost']) == true &&  $_POST['formPost'] == 'criar') {
    $usuario = new \App\Model\Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setTelefone1($_POST['telefone1']);
    $usuario->setTelefone2($_POST['telefone2']);
    $usuario->setId_tipo_Usuario($_POST['id_tipo_usuario']);
    $usuario->setId($_POST['id']);

    $usuarioDao = new \App\DAO\UsuarioDao();
    $usuarioDao->Criar($usuario);
    header("Location: ../View/usuario/listar.php");
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'buscar') {
    $usuarioDao = new \App\DAO\UsuarioDao();
    $listaUsuario = $usuarioDao->Buscar();
    return $listaUsuario;
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'excluir') {
    $usuario = new \App\Model\Usuario();
    $usuario->setId($_GET['id']);

    $usuarioDao = new \App\DAO\UsuarioDao();
    $usuarioDao->Excluir($usuario);
    header("Location: ../View/usuario/listar.php");
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'buscarPorId' || isset($_GET['formGetAux']) == true && $_GET['formGetAux'] == 'buscarPorId') {
    $usuario = new \App\Model\Usuario();
    $usuario->setId($_GET['id']);

    $usuarioDao = new \App\DAO\UsuarioDao();
    $usuarioEscolhido = $usuarioDao->BuscarPorId($usuario);
    return $usuarioEscolhido;
}

if (isset($_GET['formGet']) == true && $_GET['formGet'] == 'buscarPorTipo') {
    $usuario = new \App\Model\Usuario();
    $usuario->setId_tipo_Usuario($_GET['tipoUsuario']);

    $usuarioDao = new \App\DAO\UsuarioDao();
    $usuarioEscolhido = $usuarioDao->BuscarPorTipo($usuario);
    return $usuarioEscolhido;
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'editar') {
    $usuario = new \App\Model\Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setId($_POST['id']);
    $usuario->setTelefone1($_POST['telefone1']);
    $usuario->setTelefone2($_POST['telefone2']);
    $usuario->setId_tipo_Usuario($_POST['id_tipo_usuario']);

    $usuarioDao = new \App\DAO\UsuarioDao();
    $usuarioDao->Editar($usuario);
    header("Location: ../View/usuario/listar.php");
}

if (isset($_POST['formPost']) == true && $_POST['formPost'] == 'alterarSenha') {
    $usuario = new \App\Model\Usuario();
    $usuario->setSenha($_POST['senhaUsuario']);
    $usuario->setId($_POST['idUsuario']);

    $usuarioDao = new \App\DAO\UsuarioDao();
    $usuarioDao->AlterarSenha($usuario);
    header("Location: ../View/usuario/listar.php");
}