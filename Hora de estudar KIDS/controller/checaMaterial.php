<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_GET['id_material'];
$sql = "UPDATE tb_material SET verificado = '0' WHERE id_material = '{$id}'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_CM'] = "Material verificado com sucesso";
    header("Location:../views/materialVerificado.php");
    
} else {
    $_SESSION['erro_CM'] = "Erro ao verificar material";
    header("Location:../views/materialVerificado.php");
}
?>