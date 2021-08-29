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
            header("Location: ../View/inicio/inicio.php");
        } else {
            session_destroy();
            $_SESSION["errorLogin"] = "Usuário ou Senha Inválidos";
            header("Location: ../View/inicio/login.php");
        }
    }
}
    

//     $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
//     $result = mysqli_query($db, $sql);
//     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//     $active = $row['active'];

//     $count = mysqli_num_rows($result);

//     // If result matched $myusername and $mypassword, table row must be 1 row

//     if ($count == 1) {
//         session_register("myusername");
//         $_SESSION['login_user'] = $myusername;

//         header("location: welcome.php");
//     } else {
//         $error = "Your Login Name or Password is invalid";
//     }
// }