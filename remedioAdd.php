<?php
include_once '../model/Remedio.php';
include_once '../dao/RemedioDAO.php';

$nome = $_POST['nomeR'];
$descricao = $_POST['descricao'];

$remedio = new Remedio();
$remedio->setNome($nome);
$remedio->setDescricao($descricao);

$remedioDAO = new RemedioDAO();
$remedioDAO->adicionar($remedio);