<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$nome = $_POST['nome'];
$email= $_POST['email'];
$senha = $_POST['senha'];
$senha_crip= md5($senha);

$sql = "INSERT INTO tb_usuario(nome, email, senha) VALUES ('$nome', '$email', '$senha_crip')";
if (mysqli_query($conexao, $sql)) {

    $_SESSION['sucesso_CU'] = "Cadatsro de usuario realizado com sucesso";
    header("Location:../views/login.php");

} else {

    $_SESSION['erro_CU'] = "E-mail ou senha inválidos";
    header("Location:../views/cadastroUsuario.php");
  
}

?>