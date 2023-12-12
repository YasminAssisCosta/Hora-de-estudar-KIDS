<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
$imagem_u = md5(time()) . $extensao;
$diretorio = "Usuario/";

move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imagem_u);

$sql = "UPDATE tb_usuario SET 
        id_usuario = '$id', 
        nome = '$nome', 
        email = '$email', 
        imagem = '$imagem_u'
        WHERE id_usuario = '$id'";


if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_EP'] = "Perfil atualizado com sucesso";
    header("Location:../views/perfil.php");

} else {
    $_SESSION['erro_EP'] = "Erro ao editar perfil";
    header("Location:../views/editePerfi.php?id_material=$id_material");
}

?>
