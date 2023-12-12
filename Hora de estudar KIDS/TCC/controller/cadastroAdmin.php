<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$nome = $_POST['nome'];
$email= $_POST['email'];
$curriculo= $_POST['curriculo'];
$senha = $_POST['senha'];
$senha_crip= md5($senha);



$sql = "INSERT INTO tb_admin(nome, email, senha, curriculo, tipo, verificado) 
VALUES ('$nome', '$email', '$senha_crip','$curriculo', '1','0')";
if (mysqli_query($conexao, $sql)) {

    $_SESSION['sucesso_Ca'] = "Cadatro de usuario realizado com sucesso";
    header("Location:../views/loginAdmin.php");

} else {

    $_SESSION['erro_Ca'] = "E-mail ou senha inválidos";
    header("Location:../views/cadastroUsuario.php");
  
}

//usuario tipo 0 é adm geral
//usuario tipo 1 é adm Ajudante
// usario verificado == 0, não pode acessar o site, pois ainda não foi verificado

?>