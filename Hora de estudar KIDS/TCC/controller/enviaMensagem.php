<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();


$id = $_POST['id_usuario'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];


$sql = "INSERT INTO tb_mensagem (id_usuario, assunto, mensagem) 
VALUES ('$id', '$assunto', '$mensagem')";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucessos'] = "Mensagem enviada com sucesso";
    header("Location:../views/inicio.php");
      
} else {
    $_SESSION['erros'] = "Erro ao enviar mensagem, tente mais tarde";
    header("Location:../views/mensagem.php");
           
}

?>