<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_user.php';

$id = $_SESSION['usuario'];
$id_material = $_REQUEST['material'];

if (empty($id)) {
  header('Location: erro.php'); 
  exit; 
}

$sql = "SELECT * FROM tb_questao_usuario a 
INNER JOIN tb_questao b ON a.id_questao = b.id_questao 
WHERE id_material = '{$id_material}'  AND id_usuario = '{$id}' ";

$result = $conexao->query($sql);


?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Perguntas</title>
  <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/quizz.css">
</head>

<body>

                

  <div class="container">
    <h1 class="text-center" style="margin-top: 10px; font-family: 'Patua One', sans-serif;"> Perguntas Disponíveis</h1>
    <form method="post" action="../controller/armazenaResposta.php">
    <input type="hidden" name="id_usuario" value="<?php echo "$id"  ?>">
    <?php
    while ($dados = $result->fetch_assoc()) { 
        $foto = $dados['imagem_questao'];?>

        <div class="row">
          <div class="col-8">
            
         
<div class="card">
  <h2 style="text-align: center; font-family: 'Patua One', sans-serif; margin-top: 10px;"><?php echo $dados['questao'] ?></h2>
  <div class="image-container">
    <img src="<?php echo "../controller/Upload/$foto" ?>" alt="Imagem da Questão" class="card-image">
  </div>
</div>
</div>
          
          <div class="col-4">
           
            <div class="row">
          <div class="" id="resposta">
            <h1> Opção correta</h1>
            <h3> <?php echo $dados['op_correto'] ?></h3>
          </div>
          </div>
          <div class="row">
          <div class="" id="resposta">
             <h1> Opção informada</h1>
            <h3> <?php echo $dados['resposta'] ?></h3>
          </div>
          
</div>
</div>
<?php  } ?>
          </div>
        </div>

      
     
        
      
 
  </div>

</body>

</html>