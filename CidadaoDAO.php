<?php
include_once '../model/Cidadao.php';
include_once '../dao/Conexao.php';

class cidadaoDAO{
    function adicionar ($cidadao){
        try {
            $pdo = Conexao::connect();
            $sql = 'INSERT cidadao( nome, telefone, idade, cartaoSus, numeroSus) VALUES(:nome, :telefone, :idade, :cartaoSus, :numeroSus)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome'=> $cidadao->getNome(),
                ':telefone'=>  $cidadao->getTelefone(),
                ':idade'=>  $cidadao->getIdade(),
                ':cartaoSus'=>  $cidadao->getCartaoSus(),
                ':numeroSus'=>  $cidadao->getNumeroSus()
            ));
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    function excluir ($cidadao)
    {
        try {
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare('DELETE from cidadao where id = :id');
            $stmt->execute(array(
                ':id'=> $cidadao->getId()));
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    function alterar ($cidadao)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'Update cidadao SET nome = :nome, telefone = :telefone, idade = :idade, cartaoSus = :cartaoSus, numeroSus = :numeroSus where id = :id';
            $stmt = $pdo-> prepare($sql);
            $stmt->execute(array(
                ':id' => $cidadao->getId(),
                ':nome' => $cidadao->getNome(),
                ':idade' => $cidadao->getIdade(),
                ':telefone' =>$cidadao->getTelefone(),
                ':cartaoSus' => $cidadao->getCartaoSus(),
                ':numeroSus' => $cidadao->getNumeroSus()
            ));
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function listar($nome){
        $nome = "%" . $nome . "%";
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id, nome, telefone, idade, cartaoSus, numeroSus FROM cidadao where nome like :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' =>$nome
            ));
            $cidadaos = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cidadao = new Cidadao();
                $cidadao->setId($linha['id']);
                $cidadao->setNome($linha['nome']);
                $cidadao->setTelefone($linha['telefone']);
                $cidadao->setIdade($linha['idade']);
                $cidadao->setCartaoSus($linha['cartaoSus']);
                $cidadao->setNumeroSus($linha['numeroSus']);
                $cidadaos[] = $cidadao;
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $cidadaos;
    }


}