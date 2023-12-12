<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();


$id_material= $_GET["id_material"];

$sql = "DELETE FROM tb_material WHERE id_material = '$id_material'";

if (mysqli_query($conexao, $sql)) {
    header("Location:../views/materialVerificado.php");
} else {
    $_SESSION['erro'] = "Erro ao apagar material";
    header("Location:../views/materialVerificado.php");
}

?>