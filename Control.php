<?php
extract($_REQUEST);
if ((! isset($nomeClasse)) || (empty($nomeClasse)) || (! isset($metodo)) || (empty($metodo))) {
    $msg = "P�gina inv�lida! Utilize as op��es do sistema!";
    header('Location: /sisdisponibilidade/view/msg.php?msg=' . $msg);
}
include_once '../control/' . $nomeClasse . '.php';
$objeto = new $nomeClasse();
$objeto->$metodo();
?>