<?php

namespace App\Model;

class Pedido
{
    private $id;
    private $descricao;
    private $dt_criacao;
    private $dt_prazo;
    private $dt_conclusao;
    private $id_status_pedido;
    private $id_usuario;
    private $id_motoboy;
    private $id_bairro_origem;
    private $id_bairro_destino;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDt_criacao()
    {
        return $this->dt_criacao;
    }

    public function setDt_criacao($dt_criacao)
    {
        $this->dt_criacao = $dt_criacao;
    }

    public function getDt_prazo()
    {
        return $this->dt_prazo;
    }

    public function setDt_prazo($dt_prazo)
    {
        $this->dt_prazo = $dt_prazo;
    }

    public function getDt_conclusao()
    {
        return $this->dt_conclusao;
    }

    public function setDt_conclusao($dt_conclusao)
    {
        $this->dt_conclusao = $dt_conclusao;
    }

    public function getId_status_pedido()
    {
        return $this->id_status_pedido;
    }

    public function setId_status_pedido($id_status_pedido)
    {
        $this->id_status_pedido = $id_status_pedido;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getId_motoboy()
    {
        return $this->id_motoboy;
    }

    public function setId_motoboy($id_motoboy)
    {
        $this->id_motoboy = $id_motoboy;
    }

    public function getId_bairro_origem()
    {
        return $this->id_bairro_origem;
    }

    public function setId_bairro_origem($id_bairro_origem)
    {
        $this->id_bairro_origem = $id_bairro_origem;
    }

    public function getId_bairro_destino()
    {
        return $this->id_bairro_destino;
    }

    public function setId_bairro_destino($id_bairro_destino)
    {
        $this->id_bairro_destino = $id_bairro_destino;
    }
}