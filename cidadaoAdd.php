<?php
include_once '../model/Cidadao.php';
include_once '../dao/CidadaoDAO.php';

$nome = $_POST['nomeC'];
$telefone = $_POST['telefoneC'];
$idade = $_POST['idade'];
$cartaoSus = $_POST['cartaoSUS'];
$numeroSus = $_POST['numeroSus'];



$cidadao = new Cidadao($nome, $telefone, $idade,$cartaoSus, $numeroSus);

$cidadaoDAO = new cidadaoDAO();
$cidadaoDAO->adicionar($cidadao);