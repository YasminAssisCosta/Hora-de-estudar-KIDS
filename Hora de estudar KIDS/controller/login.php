<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip= md5($senha);

$sql= "SELECT * FROM tb_usuario WHERE email = '{$email}' AND senha = '{$senha_crip}'";

$consulta= mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($consulta);
$id = $dados["id_usuario"];
$usuario = $dados["usuario"];

if (mysqli_num_rows($consulta) == 1) {
    $_SESSION['usuario']= $id;

   if($usuario == 0){
    $_SESSION['sucesso'] = "Login realizado com sucesso";
    header("Location:../views/inicio.php");

    }
  }
   else{
    
    $_SESSION['erro'] = "E-mail ou senha inválidos";
    header("Location:../views/login.php");

 }
?>

