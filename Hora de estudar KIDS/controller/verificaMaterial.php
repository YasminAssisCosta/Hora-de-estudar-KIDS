<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_GET['id_material'];
$sql = "UPDATE tb_material SET verificado = '1' WHERE id_material = '{$id}'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_VM'] = "Material adicionado com sucesso";
    header("Location:../views/materialPendente.php");
    
} else {
    $_SESSION['erro_VM'] = "Erro ao realizar verificação";
    header("Location:../views/materialPendente.php");
}
?>