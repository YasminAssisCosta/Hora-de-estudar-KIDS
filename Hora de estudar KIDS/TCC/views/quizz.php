<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();

include 'menu_user.php';

$id = $_SESSION['usuario'];
$id_material = $_GET['material'];

if (empty($id)) {
  header('Location: erro.php'); 
  exit; 
}

$sql = "SELECT * FROM tb_questao WHERE id_material = '{$id_material}' AND verificado = 1";
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
    <div class="row"> <?php
    if (isset($_SESSION['erro_AR'])) {
      echo "<div class='alert alert-danger' style='height: 40px, width:70%;'>
        $_SESSION[erro_AR]
      </div> ";
      unset($_SESSION['erro_AR']);
    }
    if (isset($_SESSION['sucesso_AR'])) {
      echo "<div class='alert alert-success' style='height: 50px;'>
          $_SESSION[sucesso_AR]
      </div> ";
      unset($_SESSION['sucesso_AR']);
    }
    ?>

    <form method="POST" action="../controller/armazenaResposta.php">

      <input type="hidden" name="id_usuario" value="<?php echo "$id"  ?>">
      <input type="hidden" name="material" value="<?php echo "$id_material"  ?>">
      <?php
      $i = 0;
      $questoes = "";
      while ($dados = $result->fetch_assoc()) {
        $foto = $dados['imagem_questao'];

      ?>
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
            <div class="radio-input">
              <div class="glass">
                <div class="glass-inner">
                </div>
              </div>
              <div class="selector">
                <div class="choice">
                  <div>
                    <input type="radio" <?php echo "id= one_$i" ?> <?php echo "name=$dados[id_questao]" ?> value=<?php echo "'$dados[txt_op1]'" ?> class="choice-circle">
                    <div class="ball"></div>
                  </div>
                  <label class="choice-name" <?php echo "for= one_$i" ?>><?php echo $dados['txt_op1'] ?></label>
                </div>
                <div class="choice">
                  <div>
                    <input type="radio" <?php echo "id= two_$i" ?> <?php echo "name=$dados[id_questao]" ?> value=<?php echo "'$dados[txt_op2]'" ?> class="choice-circle">
                    <div class="ball"></div>
                  </div>
                  <label class="choice-name" <?php echo "for= two_$i" ?>><?php echo $dados['txt_op2'] ?></label>
                </div>
                <div class="choice">
                  <div>
                    <input type="radio" <?php echo "id= three_$i" ?> <?php echo "name=$dados[id_questao]" ?> value=<?php echo "'$dados[txt_op3]'" ?> class="choice-circle">
                    <div class="ball"></div>
                  </div>
                  <label class="choice-name" <?php echo "for=three_$i" ?>><?php echo $dados['txt_op3'] ?></label>
                </div>
                <div class="choice">
                  <div>
                    <input type="radio" <?php echo "id= four_$i" ?> <?php echo "name=$dados[id_questao]" ?> value=<?php echo "'$dados[txt_op4]'" ?> class="choice-circle">
                    <div class="ball"></div>
                  </div>
                  <label class="choice-name" <?php echo "for= four_$i" ?>><?php echo $dados['txt_op4'] ?></label>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
        if ($i == 0)
          $questoes = $dados['id_questao'];
        else
          $questoes = $questoes . "," . $dados['id_questao'];

        $i++;
      }
      ?>
      <input type="hidden" name="questoes" value="<?php echo $questoes  ?>">
      <div class="containerB">
        <button class="Btn" type="submit">
          Enviar Quizz
        </button>
      </div>
    </form>
  </div>
  
</body>
</html>