<?php
include_once '../model/Remedio.php';
include_once 'Conexao.php';

class RemedioDAO
{
    function adicionar($remedio)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'INSERT remedio(nome, descricao) VALUES (:nome, :descricao)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $remedio->getNome(),
                ':descricao' => $remedio->getDescricao()
               
            ));
        }
        catch (PDOException $e){
            throw $e;
        }
    }
    
    function excluir($remedio)
    {
        try {
            $pdo = Conexao::connect();
            $stmt =$pdo->prepare('DELETE from remedio where id = :id');
            $stmt->execute(array(
                ':id'=>$remedio->getId())
                );
        }
        catch (PDOException $e){
            throw $e;
        }
    }
    function alterar ($remedio){
        try {
            $pdo = Conexao::connect();
            $sql = 'UPDATE remedio SET nome= :nome, descricao= :descricao where id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':id'=> $remedio->getId(),
                ':nome'=>$remedio->getNome(),
                ':descricao'=> $remedio->getDescricao()
            ));
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }
    function listar($nome) {
        $nome = "%" . $nome . "%";
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id, nome, descricao FROM remedio where nome like :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' =>$nome
            ));
            $remedios = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $remedio = new Remedio();
                $remedio->setId($linha['id']);
                $remedio->setNome($linha['nome']);
                $remedio->setDescricao($linha['descricao']);
                $remedios[] = $remedio;
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $remedios;
    }
}

