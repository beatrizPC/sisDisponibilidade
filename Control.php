<?php
extract($_REQUEST);
if ((! isset($nomeClasse)) || (empty($nomeClasse)) || (! isset($metodo)) || (empty($metodo))) {
    $msg = "Página inválida! Utilize as opções do sistema!";
    header('Location: /sisdisponibilidade/view/msg.php?msg=' . $msg);
}
include_once '../control/' . $nomeClasse . '.php';
$objeto = new $nomeClasse();
$objeto->$metodo();
?>