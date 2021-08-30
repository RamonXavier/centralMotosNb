<?php

namespace App\DAO;

use \App\Config\Conexao;
use \App\Model\Pedido;

class PedidoDAO
{

    public function Criar(Pedido $pedido)
    {
        $sqlCriar =
            "INSERT INTO pedido
        (descricao, 
        dt_criacao, 
        dt_prazo, 
        dt_conclusao, 
        id_status_pedido, 
        id_usuario, 
        id_motoboy,
        id_bairro_origem, 
        id_bairro_destino,
        valor_entrega) 
        VALUES 
        (?,now(),?,?,?,2,?,?,?,?)";

        $smtp = Conexao::getConexaoBD()->prepare($sqlCriar);
        $smtp->bindValue(1, $pedido->getDescricao());
        $smtp->bindValue(2, $pedido->getDt_prazo());
        $smtp->bindValue(3, $pedido->getDt_conclusao());
        $smtp->bindValue(4, $pedido->getId_status_pedido());
        $smtp->bindValue(5, $pedido->getId_motoboy() == null ? null : $pedido->getId_motoboy());
        $smtp->bindValue(6, $pedido->getId_bairro_origem());
        $smtp->bindValue(7, $pedido->getId_bairro_destino());
        $smtp->bindValue(8, $pedido->get_valor_entrega());
        $smtp->execute();
    }

    public function Buscar()
    {
        $sqlBuscar =
            "SELECT 
            p.id, 
            p.descricao, 
            p.dt_criacao,
            p.dt_prazo, 
            p.dt_conclusao, 
            sp.nome as Status,
            uU.nome as Usuario,
            uM.nome as Motoboy,
            bO.nome as Bairro_origem, 
            bD.nome as Bairro_destino,
            p.valor_entrega as Valor, p.*
            FROM pedido p 
            LEFT JOIN usuario uU on uU.id = p.id_usuario 
            LEFT JOIN usuario uM on uM.id = p.id_motoboy
            INNER JOIN bairro bO on bO.id = p.id_bairro_origem 
            INNER JOIN bairro bD on bD.id = p.id_bairro_destino
            INNER JOIN status_pedido sp on sp.id = p.id_status_pedido";

        if ($_SESSION['Usuariologin']['idTipoUsuario'] == 1) {
            $sqlBuscar = $sqlBuscar . " WHERE p.id_motoboy =" . $_SESSION['Usuariologin']['id'];
            $sqlBuscar = $sqlBuscar . " OR p.id_motoboy IS NULL";
            $sqlBuscar = $sqlBuscar . " AND sp.id NOT IN (3,4)";
        }

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

    public function BuscarPorId(Pedido $pedido)
    {
        $sqlBuscar =
            "SELECT 
            p.id, 
            p.descricao, 
            p.dt_criacao,
            p.dt_prazo, 
            p.dt_conclusao, 
            sp.nome as Status,
            uU.nome as Usuario,
            uM.nome as Motoboy,
            bO.nome as Bairro_origem, 
            bD.nome as Bairro_destino,
            bD.valor_entrega as Valor, p.*
            FROM pedido p 
            JOIN usuario uU on uU.id = p.id_usuario 
            JOIN usuario uM on uM.id = p.id_motoboy
            JOIN bairro bO on bO.id = p.id_bairro_origem 
            JOIN bairro bD on bD.id = p.id_bairro_destino
            JOIN status_pedido sp on sp.id = p.id_status_pedido
        WHERE p.id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlBuscar);
        $smtp->bindValue(1, $pedido->getId());
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $returnArray = $smtp->fetch(\PDO::FETCH_ASSOC);
            return $returnArray;
        } else {
            return [];
        }
    }
    public function BuscarStatus()
    {
        $sqlBuscar = "SELECT * FROM status_pedido";
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

    public function Excluir(Pedido $pedido)
    {
        $sqlExcluir = "DELETE FROM pedido WHERE id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlExcluir);
        $smtp->bindValue(1, $pedido->getId());
        $smtp->execute();
    }

    public function Editar(Pedido $pedido)
    {
        $sqlEditar =
            "UPDATE pedido SET 
        descricao = ?,
        dt_prazo = ?,
        dt_conclusao = ?,
        id_status_pedido = ?,
        id_motoboy = ?,
        id_bairro_origem = ?,
        id_bairro_destino = ?,
        valor_entrega = ?
        WHERE id = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlEditar);
        $smtp->bindValue(1, $pedido->getDescricao());
        $smtp->bindValue(2, $pedido->getDt_prazo());
        $smtp->bindValue(3, $pedido->getDt_conclusao());
        $smtp->bindValue(4, $pedido->getId_status_pedido());
        $smtp->bindValue(5, $pedido->getId_motoboy());
        $smtp->bindValue(6, $pedido->getId_bairro_origem());
        $smtp->bindValue(7, $pedido->getId_bairro_destino());
        $smtp->bindValue(8, $pedido->get_valor_entrega());
        $smtp->bindValue(9, $pedido->getId());
        $smtp->execute();
    }
}