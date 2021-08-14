<?php

namespace App\Model;

class Bairro
{
    private $id, $nome, $valorEntrega;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getValorEntrega()
    {
        return $this->valorEntrega;
    }

    public function setValorEntrega($valorEntrega)
    {
        $this->valorEntrega = $valorEntrega;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}