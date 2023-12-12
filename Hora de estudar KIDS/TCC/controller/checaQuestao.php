<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_GET['id_questao'];
$sql = "UPDATE tb_questao SET verificado = '0' WHERE id_questao = '{$id}'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_CQ'] = "Pergunta verificada com sucesso";
    header("Location:../views/perguntaVerificada.php");
   
} else {
    $_SESSION['erro_CQ'] = "Erro ao realizar checar questão";
    header("Location:../views/perguntaVerificada.php");
   
}
?>