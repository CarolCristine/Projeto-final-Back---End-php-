<?php

class Funcionario
{
    public $id;
    public $nome;
    public $cargo;
    public $email;
    public $senha;
    public $ativo;

    function valid()
    {
    
        if ($this->nome == "" || $this->nome == null) {
            throw new Exception("Nome em branco!");
        }
        if ($this->cargo == "" || $this->cargo == null) {
            throw new Exception("cargo em branco!");
        }
        if ($this->email == "" || $this->email == null) {
            throw new Exception("E-mail em branco!");
        }
        if ($this->senha == "" || $this->senha == null) {
            throw new Exception("Senha em branco!");
        }
        
        
    }

    function mount(Object $dados)
    {
        $this->id= $dados->id;
        $this->nome = $dados->nome;
        $this->cargo = $dados->cargo;
        $this->email = $dados->email;
        $this->senha = $dados->senha;
        // $this->ativo = $dados->ativo;
    }
}