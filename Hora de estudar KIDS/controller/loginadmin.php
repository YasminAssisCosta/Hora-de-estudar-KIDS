<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip= md5($senha);

$sql= "SELECT * FROM tb_admin WHERE email = '{$email}' AND senha = '{$senha_crip}'";

$consulta= mysqli_query($conexao, $sql);

if ($consulta) { 
    $dados = mysqli_fetch_assoc($consulta);
    
    if ($dados) { 
        $id = $dados["id_admin"];
        $verificado = $dados["verificado"];
        $tipo = $dados["tipo"];
        
        if($verificado == 0) {
            $_SESSION['erro'] = "Você ainda não foi verificado, tente mais tarde.";
            header("Location:../views/loginAdmin.php");
        } elseif ($tipo == 0) {
            session_start();
            $_SESSION['id_admin']= $id;
            $_SESSION['sucesso'] = "Login realizado com sucesso";
            header("Location:../views/inicioADM.php");
        } elseif ($tipo == 1) {
            session_start();
            $_SESSION['id_admin']= $id;
            $_SESSION['sucesso'] = "Login realizado com sucesso";
            header("Location:../views/inicioajudante.php");
        } else {
            $_SESSION['erro'] = "E-mail ou senha inválidos";
            header("Location:../views/loginAdmin.php");
        }
    } else {
        $_SESSION['erro'] = "E-mail ou senha inválidos";
        header("Location:../views/loginAdmin.php");
    }
} else {
    $_SESSION['erro'] = "Erro na consulta ao banco de dados";
    header("Location:../views/loginAdmin.php");
}

?>
