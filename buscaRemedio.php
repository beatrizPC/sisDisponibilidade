<?php
include_once '../model/Remedio.php';
include_once '../dao/RemedioDAO.php';

extract($_GET);
$remedios = Array();

$remedioDAO= new RemedioDAO();
$remedios = $remedioDAO->listar($nome);
session_start();
$_SESSION['remedios'] = $remedios;

header('Location: /sisDisponibilidade/view/listaremedio.php');