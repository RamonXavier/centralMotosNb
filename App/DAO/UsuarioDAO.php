<?php

namespace App\DAO;

use \App\Config\Conexao;
use \App\Model\Usuario;

class UsuarioDao
{

    public function Criar(Usuario $usuario)
    {
        $sqlCriar = "INSERT INTO usuario (nome, senha, idTipoUsuario, telefone1, telefone2) VALUES (?, MD5(?), ?, ?, ?)";
        $smtp = Conexao::getConexaoBD()->prepare($sqlCriar);
        $smtp->bindValue(1, $usuario->getNome());
        $smtp->bindValue(2, $usuario->getSenha());
        $smtp->bindValue(3, $usuario->getId_tipo_usuario());
        $smtp->bindValue(4, $usuario->getTelefone1());
        $smtp->bindValue(5, $usuario->getTelefone2());
        $smtp->execute();
    }

    public function Buscar()
    {
        $sqlBuscar = "SELECT u.id, u.nome, u.telefone1, u.telefone2, tu.nome as tipo FROM usuario u join tipousuario tu on u.idTipoUsuario = tu.id";
        $smtp = Conexao::getConexaoBD()->prepare($sqlBuscar);
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $returnArray = $smtp->fetchAll(\PDO::FETCH_ASSOC);
            return $returnArray;
        } else {
            return [];
        }
    }

    public function BuscarPorId(Usuario $usuario)
    {
        $sqlBuscar = "SELECT * FROM usuario where id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlBuscar);
        $smtp->bindValue(1, $usuario->getId());
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $returnArray = $smtp->fetch(\PDO::FETCH_ASSOC);
            return $returnArray;
        } else {
            return [];
        }
    }

    public function BuscarPorTipo(Usuario $usuario)
    {
        $sqlBuscar = "SELECT * FROM usuario where idTipoUsuario = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlBuscar);
        $smtp->bindValue(1, $usuario->getId_tipo_usuario());
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $returnArray = $smtp->fetchAll(\PDO::FETCH_ASSOC);
            return $returnArray;
        } else {
            return [];
        }
    }

    public function Excluir(Usuario $usuario)
    {
        $sqlExcluir = "DELETE FROM usuario WHERE id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlExcluir);
        $smtp->bindValue(1, $usuario->getId());
        $smtp->execute();
    }

    public function Editar(Usuario $usuario)
    {
        $sqlEditar = "UPDATE usuario SET nome = ?, senha = MD5(?), idTipoUsuario = ?, telefone1 = ?, telefone2 = ? WHERE id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlEditar);
        $smtp->bindValue(1, $usuario->getNome());
        $smtp->bindValue(2, $usuario->getSenha());
        $smtp->bindValue(3, $usuario->getId_tipo_usuario());
        $smtp->bindValue(4, $usuario->getTelefone1());
        $smtp->bindValue(5, $usuario->getTelefone2());
        $smtp->bindValue(6, $usuario->getId());
        $smtp->execute();
    }

    public function AlterarSenha(Usuario $usuario)
    {
        $sqlEditar = "UPDATE usuario SET senha = MD5(?) WHERE id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlEditar);
        $smtp->bindValue(1, $usuario->getSenha());
        $smtp->bindValue(2, $usuario->getId());
        $smtp->execute();
    }
}