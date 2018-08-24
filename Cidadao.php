<?php
class Cidadao
{
    private $id;
    private $nome;
    private $idade;
    private $telefone;
    private $cartaoSUS;
    private $numeroSUS;

    public function __construct($nome, $telefone, $idade, $cartaoSUS, $numeroSUS)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->telefone = $telefone;
        $this->cartaoSUS = $cartaoSUS;
        $this->numeroSUS = $numeroSUS;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getCartaoSUS()
    {
        return $this->cartaoSUS;
    }

    public function getNumeroSUS()
    {
        return $this->numeroSUS;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setCartaoSUS($cartaoSUS)
    {
        $this->cartaoSUS = $cartaoSUS;
    }

    public function setNumeroSUS($numeroSUS)
    {
        $this->numeroSUS = $numeroSUS;
    }
}

