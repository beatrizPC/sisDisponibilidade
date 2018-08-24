<?php
include_once '../model/Remedio.php';
include_once '../dao/RemedioDAO.php';

class RemedioControl{
    public function verificar(){
        extract($_REQUEST);
        $msg= NULL;
        if ((! isset($nome)) || (empty($nome))){
            $msg = "Nome do remédio não informado. Por favor, informe um nome válido!<br>";
        }
        if ((! isset($descricao)) || (empty($descricao))){
            $msg = $msg . "Descricao do remédio não informada. Por favor, informe uma descricao válida<br>";
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
            $msg = "O remédio " . $remedio->getNome() . " foi registrado com sucesso";
            
        } catch (PDOException $e) {
            $msg = "Não foi possível salvar! Tente novamente";
        }
        header('Location: /sisDisponibilidade/view/msg.php?msg=' . $msg);
    }
}