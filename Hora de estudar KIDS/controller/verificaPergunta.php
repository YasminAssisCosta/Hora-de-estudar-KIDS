<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_GET['id_questao'];
$sql = "UPDATE tb_questao SET verificado = '1' WHERE id_questao = '{$id}'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_VP'] = "Questão verificada verificado com sucesso!";
    header("Location:../views/perguntaPendente.php");
  
} else {
    $_SESSION['erro_VP'] = "Questão não verificada, tente novamente mais tarde.";
   header("Location:../views/perguntaPendente.php");
  
}
?>