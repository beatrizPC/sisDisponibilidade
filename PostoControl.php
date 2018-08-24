<?php
include_once'../model/Posto.php';
include_once'../dao/PostoDAO.php';

class PostoControl
{
    public function verificar(){
        extract($_REQUEST);
        $msg=NULL;
        if((!isset($nome)) || (empty($nome))){
            $msg = "Nome do posto não informado. Por favor, informe um nome válido! <br/>";
        }if((!isset($endereco)) || (empty($endereco))){
            $msg = $msg."Endereço não informado. Por favor, informe um endereço válido! <br/>";
        }if((!isset($telefone)) || (empty($telefone))){
            $msg = $msg."O telefone não foi informado. Por favor, informe um telefone válido! <br/>";
        }if(!empty($msg)){
            header('Location: /sisDisponibilidade/view/addPosto.php?msg='.$msg);
        }        
        else{
            $posto = new Posto(); 
            $posto->setNome($nome);
            $posto->setEndereco($endereco);
            $posto->setTelefone($telefone);
            return $produto;
        }
    }
    
    public function incluir(){
        extract($_REQUEST);
        $posto = $this->verificar();
        try {
            $postoDAO = new PostoDAO();
            $postoDAO->adicionar($posto);
            $msg = "O posto ".$posto->getNome()." foi registrado com sucesso";
        } catch (PDOException $e) {
            $msg = "Não foi possível salvar!Tente novamente. </br>".$e->getMessage();
        }
        header('Location: /sisDisponibilida/view/msg.php?msg='.$msg);
    }
    
    public function excluir(){}
    
    public function alterar(){}
}

