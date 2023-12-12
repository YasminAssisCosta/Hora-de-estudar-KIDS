<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_user.php';

$id = $_SESSION['usuario'];
$id_material = $_GET['id'];

if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
}

$sql = "SELECT * FROM tb_material WHERE id_material = '{$id_material}' ";

$consulte = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($consulte);

$cons = "SELECT * FROM tb_questao";
$consultes = mysqli_query($conexao, $cons);

$dadosA = mysqli_fetch_assoc($consultes);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../public/css/index.css">
</head>

<body>
    <div class="container">
        <div class="fundo" style="margin-left:5%; margin-top:2%; width: 90%; height:530px;border-radius: 18px; background-color: #E49695;">
            <h1 class="text-center" style="margin-top:20px; color: #ffffff; margin-left:5px; font-family: 'Patua One', sans-serif;font-size:40px;"><?php echo $dados['titulo'] ?></h1>
            <br>
            
            <div class="col" style="margin-left:22%; margin-right:5px; "> <?php echo $dados['link'] ?></div>
            
            
            
            <h5 style="color: #ffffff; margin-right:58px; text-align:right;">Autor do video: <?php echo $dados['autor'] ?></h5>

            <br> 
            <?php 
            $Sql_U = "SELECT * FROM tb_usuario a INNER JOIN tb_questao_usuario b ON a.id_usuario = b.id_usuario 
            INNER JOIN tb_questao c ON b.id_questao = c.id_questao 
            INNER JOIN tb_material d ON c.id_material = d.id_material 
            WHERE a.id_usuario = '{$id}' AND c.id_material = '{$id_material}'";
          
            $consult= mysqli_query($conexao, $Sql_U);
            if (mysqli_num_rows($consult) > 0) {

           

            ?>
           
           <?php   } else{
            ?>
            <a href="../views/quizz.php?material=<?php echo $id_material?>" class="btn btn-outline text-center" style="background-color: #ead238; width:90%; margin-left: 5%; ">Responder ao questionário</a>
           
         <?php  } ?>
        </div>
    </div>
  
</body>

</html>