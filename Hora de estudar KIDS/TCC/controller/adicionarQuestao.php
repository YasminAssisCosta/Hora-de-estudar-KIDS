<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_POST['id_admin'];

$id_material = $_POST['id_material'];

$questao = $_POST['questao'];

$txt_op1 = $_POST['txt_op1'];

$txt_op2 = $_POST['txt_op2'];

$txt_op3 = $_POST['txt_op3'];

$txt_op4 = $_POST['txt_op4'];

$op_correto = $_POST['op_correto'];

$extensao = strtolower(substr($_FILES['imagem_questao']['name'],-4));
$imagem_q = md5(time()) . $extensao;
$diretorio= "Upload/";
move_uploaded_file($_FILES['imagem_questao']['tmp_name'], $diretorio . $imagem_q);


$sql = "INSERT INTO tb_questao (id_material, questao, imagem_questao, txt_op1, txt_op2, txt_op3, txt_op4, op_correto, id_admin) 
VALUES ('$id_material', '$questao', '$imagem_q', '$txt_op1', '$txt_op2', '$txt_op3', '$txt_op4', '$op_correto', '$id')";


if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_AQ'] = "Questao adicionada com sucesso";
    header("Location: ../views/inicioADM.php");
  
} else {
    $_SESSION['erro_AQ'] = "Erro ao enviar quetão";
    header("Location: ../views/adicionarQuestao.php");
  
       
}



?>

