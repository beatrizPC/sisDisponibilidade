<?php
include_once '../model/Posto.php';
include_once '../dao/Conexao.php';

class PostoDAO
{
    public function adicionar($posto){
        try{
            $pdo = Conexao::connect();
            $sql = 'INSERT posto (nome, endereco, telefone) VALUES (:nome, :endereco, :telefone)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $posto->getNome(),
                ':endereco' => $posto->getEndereco(),
                ':telefone' => $posto->getTelefone()
            ));
        } catch (PDOException $e){
            throw $e;
        }
    }
    
    public function alterar($posto){
        try{
            $pdo = Conexao::connect();
            $sql = 'UPDATE posto SET nome =:nome, endereco =:endereco, , telefone =:telefone where id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':id' => $posto->getId(),
                ':nome' => $posto->getNome(),
                ':endereco' => $posto->getEndereco(),
                ':telefone' => $posto->getTelefone()
            ));
        } catch (PDOException $e){
            echo 'Error:' . $e->getMessage();
        }
    }
    
    public function excluir ($posto){
        try{
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare('DELETE from posto where id = :id');
            $stmt->execute(array(
                ':id' => $posto->getId()
            ));
        } catch (PDOException $e){
            throw $e;
        }
    }
    function listar($nome){
        $nome = "%" . $nome . "%";
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id, nome, endereco, telefone FROM posto where nome like :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' =>$nome
            ));
            $postos = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $posto = new Posto();
                $posto->setId($linha['id']);
                $posto->setNome($linha['nome']);
                $posto->setEndereco($linha['endereco']);
                $posto->setTelefone($linha['telefone']);
                $postos[] = $posto;
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $postos;
    }
}