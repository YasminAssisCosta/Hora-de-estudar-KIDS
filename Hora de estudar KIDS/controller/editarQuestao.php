<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_POST['id_admin'];
$id_questao = $_POST['id_questao'];
$id_material = $_POST['id_material'];
$questao = $_POST['questao'];
$txt_op1 = $_POST['txt_op1'];
$txt_op2 = $_POST['txt_op2'];
$txt_op3 = $_POST['txt_op3'];
$txt_op4 = $_POST['txt_op4'];
$op_correto = $_POST['op_correto'];

$extensao = strtolower(substr($_FILES['imagem_questao']['name'], -4));
$imagem_q = md5(time()) . $extensao;
$diretorio = "Upload/";

move_uploaded_file($_FILES['imagem_questao']['tmp_name'], $diretorio . $imagem_q);

$sql = "UPDATE tb_questao SET 
        id_admin = '$id', 
        id_material = '$id_material', 
        questao = '$questao', 
        imagem_questao = '$imagem_q', 
        txt_op1 = '$txt_op1', 
        txt_op2 = '$txt_op2', 
        txt_op3 = '$txt_op3', 
        txt_op4 = '$txt_op4', 
        op_correto = '$op_correto' 
        WHERE id_questao = '$id_questao'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_EQ'] = "Sucesso ao editar questao";
    header("Location:../views/perfil.php");

} else {
    $_SESSION['erro_EQ'] = "Erro ao editar questao";
    header("Location:../views/editarQuestai.php?id_questao=$id_questao");
}
?>
