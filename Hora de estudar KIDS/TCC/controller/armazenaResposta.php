<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();


$id_material = $_POST['material'];
$id = $_POST['id_usuario'];

$questoes = $_POST['questoes'];
$array_q = explode(",", $questoes);
foreach($array_q as $id_questao){
    $sql = "INSERT INTO tb_questao_usuario (id_usuario, resposta, id_questao ) 
    VALUES ('$id', '$_POST[$id_questao]', '$id_questao')";
    if (mysqli_query($conexao, $sql)) {
        $_SESSION['sucesso_AR'] = "Login realizado com sucesso";
        header("Location:../views/quizzResposta.php?material=$id_material");
    
    } else {
        $_SESSION['sucesso_AR'] = "Login realizado com sucesso";
        header("Location:../views/quizz.php?material=$id_material");
    }   
}

?>
