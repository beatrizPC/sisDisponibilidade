<?php
include_once '../model/Remedio.php';
include_once '../dao/RemedioDAO.php';

class RemedioControl{
    public function verificar(){
        extract($_REQUEST);
        $msg= NULL;
        if ((! isset($nome)) || (empty($nome))){
            $msg = "Nome do rem�dio n�o informado. Por favor, informe um nome v�lido!<br>";
        }
        if ((! isset($descricao)) || (empty($descricao))){
            $msg = $msg . "Descricao do rem�dio n�o informada. Por favor, informe uma descricao v�lida<br>";
        }
        if (! empty($msg)){
            header('Location: /sisvenda/view/Remedio.php?msg=' . $msg);
        }
        else {
            $remedio = new Remedio();
            $remedio->setId($id);
            $remedio->setNome($nome);
            $remedio->setDescricao($descricao);
            return  $remedio;
        }
    }
    
    public function incluir(){
        
        extract($_REQUEST);
        $remedio = $this->verificar();
        try {
            $remedioDAO = new RemedioDAO();
            $remedioDAO->adicionar($remedio);
            $msg = "O rem�dio " . $remedio->getNome() . " foi registrado com sucesso";
            
        } catch (PDOException $e) {
            $msg = "N�o foi poss�vel salvar! Tente novamente";
        }
        header('Location: /sisDisponibilidade/view/msg.php?msg=' . $msg);
    }
}