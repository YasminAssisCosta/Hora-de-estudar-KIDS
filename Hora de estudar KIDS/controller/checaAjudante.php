<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_GET['id_admin'];
$sql = "UPDATE tb_admin SET verificado = '0' WHERE id_admin = '{$id}'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_CA'] = "Verificação realizada com sucesso";
    header("Location:../views/ajudantesVerificados.php");
    
} else {
    $_SESSION['erro_CA'] = "Erro ao realizar verificação";
    header("../views/ajudantesVerificados.php");
      
}
?>