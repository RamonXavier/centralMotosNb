<?php

namespace App\Config;

use \App\Config\Conexao;
use \App\Model\Login;

class LogarConfig
{

    public function Logar(Login $login)
    {
        session_start();

        $sqlValidarUsuario =
            "SELECT * 
       FROM usuario
       WHERE nome = ? 
       AND senha = MD5(?)";

        $smtp = Conexao::getConexaoBD()->prepare($sqlValidarUsuario);
        $smtp->bindValue(1, $login->getNome());
        $smtp->bindValue(2, $login->getSenha());
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $returnArray = $smtp->fetch(\PDO::FETCH_ASSOC);
            $_SESSION["Usuariologin"] = $returnArray;
            return true;
        } else {
            session_destroy();
            return false;
        }
    }

    public function VerificarLogin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION)) {
            header("Location: ../inicio/login.php");
            die();
        }

        $user_check = $_SESSION;

        $sqlValidarUsuario =
            "SELECT * 
                FROM usuario
                WHERE id = ? ";

        $smtp = Conexao::getConexaoBD()->prepare($sqlValidarUsuario);
        $smtp->bindValue(1, $user_check['Usuariologin']['id']);
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows <= 0) {
            session_destroy();
            header("Location: ../inicio/login.php?error=true");
        }
    }
}