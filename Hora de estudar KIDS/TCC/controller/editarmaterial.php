<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id_material = $_POST['id_material'];
$titulo = $_POST['titulo'];
$nivel = $_POST['nivel'];
$disciplina = $_POST['disciplina'];
$descricao = $_POST['descricao'];
$link = $_POST['link'];
$autor = $_POST['autor'];

$sql = "UPDATE tb_material SET titulo = '$titulo', id_nivel = '$nivel', id_disciplina = '$disciplina', descricao = '$descricao', link = '$link', autor = '$autor' WHERE id_material = '$id_material'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_EM'] = "Material editado com sucesso";
    header("Location:../views/materialVerificado.php");
    
} else {
    $_SESSION['erro_EM'] = "Erro ao editar material";
    header("../views/editarmaterial.php?id_material=$id_material");
   
}


?>
