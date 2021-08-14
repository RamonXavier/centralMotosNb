<?php

namespace App\DAO;

use \App\Config\Conexao;
use \App\Model\Bairro;

class BairroDao
{

    public function Criar(Bairro $bairro)
    {
        $sqlCriar = "INSERT INTO bairro (nome, valor_entrega) VALUES (?, ?)";
        $smtp = Conexao::getConexaoBD()->prepare($sqlCriar);
        $smtp->bindValue(1, $bairro->getNome());
        $smtp->bindValue(2, $bairro->getValorEntrega());
        $smtp->execute();
    }

    public function Buscar()
    {
        $sqlBuscar = "SELECT * FROM bairro";
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

    public function BuscarPorId(Bairro $bairro)
    {
        $sqlBuscar = "SELECT * FROM bairro where id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlBuscar);
        $smtp->bindValue(1, $bairro->getId());
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $returnArray = $smtp->fetch(\PDO::FETCH_ASSOC);
            return $returnArray;
        } else {
            return [];
        }
    }

    public function Excluir(Bairro $bairro)
    {
        $sqlExcluir = "DELETE FROM bairro WHERE id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlExcluir);
        $smtp->bindValue(1, $bairro->getId());
        $smtp->execute();
    }

    public function Editar(Bairro $bairro)
    {
        $sqlEditar = "UPDATE bairro SET nome = ?, valor_entrega = ? WHERE id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlEditar);
        $smtp->bindValue(1, $bairro->getNome());
        $smtp->bindValue(2, $bairro->getValorEntrega());
        $smtp->bindValue(3, $bairro->getId());
        $smtp->execute();
    }
}