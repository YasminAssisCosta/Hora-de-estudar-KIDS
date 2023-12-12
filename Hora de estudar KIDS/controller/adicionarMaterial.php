<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id = $_POST['id_admin'];

$titulo = $_POST['titulo'];

$nivel = $_POST['nivel'];

$disciplina = $_POST['disciplina'];

$descricao = $_POST['descricao'];

$link = $_POST['link'];

$autor = $_POST['autor'];

$sql_verificar = "SELECT * FROM tb_material WHERE titulo = '$titulo' AND id_disciplina = '$disciplina'";
$result_verificar = $conexao->query($sql_verificar);

if ($result_verificar->num_rows > 0) {
    $_SESSION['erroM'] = "Já existe um material com o mesmo nome nesta disciplina.";
    header("Location:../views/adicionarMaterial.php");
    exit;
    
}

$extensao = strtolower(substr($_FILES['imagem']['name'],-4));
$imagem = md5(time()) . $extensao;
$diretorio= "Upload/";
move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imagem);


$sql = "INSERT INTO tb_material (titulo, id_nivel, descricao, imagem, link, id_admin, verificado, autor, id_disciplina) 
VALUES ('$titulo', '$nivel', '$descricao', '$imagem' ,  '$link', '$id', '0', '$autor', '$disciplina')";

if (mysqli_query($conexao, $sql)) {
$_SESSION['sucessoM'] = "Material adicionado com sucesso";
header("Location:../views/inicioADM.php");

exit;
} else {
$_SESSION['erroM'] = "Erro ao adicionar material";
header("Location:../views/adicionarMaterial.php");
exit;
}

?>

