<?php
include_once'../model/Posto.php';
include_once'../dao/PostoDAO.php';

class PostoControl
{
    public function verificar(){
        extract($_REQUEST);
        $msg=NULL;
        if((!isset($nome)) || (empty($nome))){
            $msg = "Nome do posto n�o informado. Por favor, informe um nome v�lido! <br/>";
        }if((!isset($endereco)) || (empty($endereco))){
            $msg = $msg."Endere�o n�o informado. Por favor, informe um endere�o v�lido! <br/>";
        }if((!isset($telefone)) || (empty($telefone))){
            $msg = $msg."O telefone n�o foi informado. Por favor, informe um telefone v�lido! <br/>";
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
            $msg = "N�o foi poss�vel salvar!Tente novamente. </br>".$e->getMessage();
        }
        header('Location: /sisDisponibilida/view/msg.php?msg='.$msg);
    }
    
    public function excluir(){}
    
    public function alterar(){}
}

