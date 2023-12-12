<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();


include 'menu_user.php';

$id = $_SESSION['usuario'];

$sql = "SELECT * FROM tb_disciplina";
$result = $conexao->query($sql);

if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/index.css">
</head>

<body>
<h1 style="font-family: 'Patua One', sans-serif; margin-left: 35%; margin-bottom: 40px; margin-top: 10px; font-size: 40px;">Disciplinas disponíveis:</h1>
<div class="container" style="margin-top: 40px;">
    <div class="row">
    <?php
    while ($dados = $result->fetch_assoc()) { 
        $foto = $dados['imagem'];?>

            <div class="col-3" >
                <div class="card" id="um">
                    <img id="imagem" src="<?php echo "../controller/Upload/$foto" ?>"  style="max-height: 300px; width: 78%; margin-top:10px; border-radius: 8px;">
                    <h2 class="card-title mt-3 mb-3 text-center" style="font-family: Sticky Sans; font-size:40px"><?php echo $dados['nome'] ?></h2>
                    <a href="../views/opcaoNivel.php?disciplina=<?php echo $dados['id_disciplina'] ?>" class="btn btn" style="background-color: #E49695;color:#ffffff; margin-bottom:10px;max-width: 95%; margin-left: 6px; ">Entrar</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


</body>

</html>