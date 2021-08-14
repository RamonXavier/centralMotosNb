<?php

namespace App\Model;

class Usuario
{
    private $id;
    private $nome;
    private $senha;
    private $telefone1;
    private $telefone2;
    private $id_tipo_usuario;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getTelefone1()
    {
        return $this->telefone1;
    }

    public function setTelefone1($telefone1)
    {
        $this->telefone1 = $telefone1;
    }

    public function getTelefone2()
    {
        return $this->telefone2;
    }

    public function setTelefone2($telefone2)
    {
        $this->telefone2 = $telefone2;
    }

    public function getId_tipo_usuario()
    {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_Usuario($id_tipo_usuario)
    {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }
}