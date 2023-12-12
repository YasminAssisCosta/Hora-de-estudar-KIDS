<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_user.php';

$id = $_SESSION['usuario'];
if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
  }

$sql = "SELECT * FROM tb_usuario WHERE id_usuario = '{$id}'";

$consult = $conexao->query($sql);


?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar uma Questão:</title>
    <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/index.css">
</head>

<body>


    <h2 style="margin-top: 20px; margin-left:35%">Edite seu perfil:</h2><br>
    
    <form enctype="multipart/form-data" action="../controller/editarPerfil.php" method="POST" style="margin-left: 8%; max-width: 80%;">
    <div class="row"> <?php
    if (isset($_SESSION['erro_PEP'])) {
      echo "<div class='alert alert-danger' style='height: 40px, width:70%;'>
        $_SESSION[erro_EP]
      </div> ";
      unset($_SESSION['erro_EP']);
    }
    if (isset($_SESSION['sucesso_EP'])) {
      echo "<div class='alert alert-success' style='height: 50px;'>
          $_SESSION[sucesso_EP]
      </div> ";
      unset($_SESSION['sucesso_EP']);
    }
    ?>
    </div>
    <?php while ($dados = $consult->fetch_assoc()) { ?>  
        <input type="hidden" name="id_usuario" value="<?php echo "$id"  ?>">
        <div class="form-group">
            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $dados['nome'] ?>" required>
        </div><br>
        <div class="form-group">
            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $dados['email'] ?>" required>
        </div><br>
        <div class="form-group">
            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Imagem:</label>
            <input type="file" class="form-control" name="imagem" required>
        </div><br>
        <input type="submit" class="btn btn" style="max-width: 200px; margin-left: 30%;">
        <?php   } ?>
       
    </form>
  
</body>

</html>