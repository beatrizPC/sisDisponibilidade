<?php
include_once '../model/Cidadao.php';
include_once '../dao/CidadaoDAO.php';

class CidadaoControl{
    public function verificar (){
        extract($_REQUEST);
        $msg = NULL;
        if((!isset($nome)) || (empty($nome))){
            $msg = "Nome do cidadao não informado. Por favor, informe um nome válido! <br>";
        }
        
        if((!isset($idade)) || (empty($idade))){
            $msg = $msg . "Idade nao informada. Por favor, informe uma idade valida <br>";
        }
        
        if((!isset($telefone)) || (empty($telefone))){
            $msg = $msg . "Numero de telefone nao informado. Por favor, informe um telefone valido <br>";
        }
        
        if((!isset($cartaoSUS)) || (empty($cartaoSUS)) || ($cartaoSUS == "s" && (empty($numeroSUS)))){
            $msg = $msg . "Informe um numero de SUS valido!  <br>";
        }
        
        if(!empty($msg)) {
            header('Location: /sisDisponibilidade/view/cidadao.php?msg='.$msg);
        } else{
            $cidadao = new Cidadao($nome, $idade, $telefone, $cartaoSUS, $numeroSUS);
            return $cidadao;
        }
    }
    
    public function incluir() {
        extract($_REQUEST);
        $cidadao = $this->verificar();
        
        try{
            $cidadaoDAO = new CidadaoDAO();
            $cidadaoDAO->adicionar($cliente);
            $msg = "O cidadao " . $cidadao->getNome() . " foi registrado com sucesso";
        } catch (PDOException $e){
            $msg = "Nao foi possivel salvar! Tente novamente";
        }
        header('Location: /sisDisponibilidade/view/msg.php?msg=' . $msg);
    }
    
    public function excluir() {}
    
    public function alterar(){}
    
    public function listarUm(){}
    
    public function listar(){}
}