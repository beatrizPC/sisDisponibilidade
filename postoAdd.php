<?php
include_once '../model/Posto.php';
include_once '../dao/PostoDAO.php';

$nome = $_POST['nomeP'];
$endereco = $_POST['enderecoP'];
$telefone = $_POST['telefoneP'];

$posto = new Posto();
$posto->setNome($nome);
$posto->setEndereco($endereco);
$posto->setTelefone($telefone);

$postoDAO = new PostoDAO();
$postoDAO->adicionar($posto);