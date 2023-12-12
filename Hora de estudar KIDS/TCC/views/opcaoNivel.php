<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();

include 'menu_user.php';

$id = $_SESSION['usuario'];

$disciplina = $_GET['disciplina'];

if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
}

$sql = "SELECT * FROM tb_nivel";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/index.css">
</head>

<body>

<h1 style="font-family: 'Patua One', sans-serif; margin-left: 35%;  margin-top: 20px; font-size: 50px;">Níveis disponíveis:</h1>

<div class="row" style="margin-left: 15px; margin-right: 15px; margin-top: 15px; justify-content: center;">
    <?php
    $count = 0; 
    while ($dados = $result->fetch_assoc()) {
        if ($count % 3 == 0) {
            echo '<div class="row" style="margin-top: 15px; justify-content: center;">'; 
        }
    ?>
    <div class="col-4" style="margin-top: 15px;">
        <div class="card" style="border-color: pink;">
            <div class="card-body">
                <h1 class="card-title" style="font-family: Sticky Sans; font-size: 30px;">
                    &lt;<?php echo $dados['nivel'] ?>
                </h1>
                <p class="card-text" style="font-size: 20px; max-height: 100px; overflow: hidden; margin-top:15px;">Nesta sessão você verá conteúdos do <?php echo $dados['nivel'] ?> do ensino fundamental.</p>
                <a href="../views/listarmaterial.php?disciplina=<?php echo $disciplina ?>&&nivel=<?php echo $dados['id_nivel'] ?>"
                    class="btn btn-outline-light">Entrar</a>
            </div>
        </div>
    </div>
    <?php
        $count++;
        if ($count % 3 == 0) {
            echo '</div>'; 
        }
    }
    if ($count % 3 != 0) {
        echo '</div>'; 
    }
    ?>
</div>


</body>

</html>

