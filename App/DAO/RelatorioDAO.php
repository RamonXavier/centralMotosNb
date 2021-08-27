<?php

namespace App\DAO;

use \App\Config\Conexao;

class RelatorioDAO
{

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
            bD.valor_entrega as Valor, p.*
            FROM pedido p 
            JOIN usuario uU on uU.id = p.id_usuario 
            JOIN usuario uM on uM.id = p.id_motoboy
            JOIN bairro bO on bO.id = p.id_bairro_origem 
            JOIN bairro bD on bD.id = p.id_bairro_destino
            JOIN status_pedido sp on sp.id = p.id_status_pedido";
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

    public function BuscarStatus()
    {
        $sqlBuscar =
            "SELECT 
            *
            FROM status_pedido sp";
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

    public function BuscarFiltrado($status, $dtInicio, $dtFim)
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
            WHERE 1=1";

        if($status != null){
            $sqlBuscar = $sqlBuscar." AND p.id_status_pedido = ".$status;
        }

        if($dtInicio != null && $dtFim == null) {
            $sqlBuscar = $sqlBuscar." AND p.dt_conclusao > "."'".$dtInicio."'";

        }           

        if($dtFim != null && $dtInicio == null) {
            $sqlBuscar = $sqlBuscar." AND p.dt_conclusao < "."'".$dtFim."'";
        }

        if($dtFim != null && $dtInicio != null){
            $sqlBuscar = $sqlBuscar." AND p.dt_conclusao BETWEEN "."'".$dtInicio."'"." AND "."'".$dtFim."'";
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
}