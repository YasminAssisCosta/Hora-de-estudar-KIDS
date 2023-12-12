<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_admin.php';

$id = $_SESSION['id_admin'];
if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
  }

$id_material = $_GET['id_material'];

$sql = "SELECT * FROM tb_material WHERE id_material = '{$id_material}' ";
$consulte = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($consulte);
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
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="fundo" style="margin-left:5%; margin-top:3%; width: 90%; height:510px;border-radius: 18px; background-color: #E49695;">
        <h1 class="text-center" style="color: #ffffff; margin-left:5px; font-family: 'Righteous', cursive;s"><?php echo $dados['titulo'] ?></h1>
        <br>  
          <div class="" style="margin-left:22%; margin-right:5px; "> <?php echo $dados['link'] ?></div> 
         <h5 style="color: #ffffff; margin-top:10px; margin-left:50px;"><?php echo $dados['autor'] ?></h5>
                       
          <br>  <br>
          
        </div>
    </div>
  
</body>

</html>