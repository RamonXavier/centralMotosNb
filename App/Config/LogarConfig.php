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
}