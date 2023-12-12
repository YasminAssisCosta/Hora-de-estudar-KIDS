<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id_questao = $_GET["id_questao"];

$sql = "DELETE FROM tb_questao WHERE id_questao = '$id_questao'";


if (mysqli_query($conexao, $sql)) {
    header("Location:../views/perguntaVerificada.php");
} else {
    $_SESSION['erro'] = "Erro ao apagar pergunta";
    header("Location:../views/perguntaVerificada.php");
}



?>