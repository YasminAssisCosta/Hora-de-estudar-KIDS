<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_GET['id_admin'];
$sql = "UPDATE tb_admin SET verificado = '1' WHERE id_admin = '{$id}'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_VA'] = "Verificação realizada com sucesso";
    header("Location:../views/ajudantesPendentes.php");
    
} else {
    $_SESSION['erro_VA'] = "Erro ao realizar verificação";
    header("../views/ajudantesPendentes.php");
      
}
?>