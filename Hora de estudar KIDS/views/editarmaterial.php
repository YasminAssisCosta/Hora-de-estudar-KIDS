<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_admin.php';

$id = $_SESSION['id_admin'];
if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
}

$id_material= $_GET["id_material"];

$sql = "SELECT * FROM tb_nivel";
$consult = $conexao->query($sql);

$sql_dis = "SELECT * FROM tb_disciplina";
$result= $conexao->query($sql_dis);

$sql_dis = "SELECT * FROM tb_material WHERE id_material = '$id_material'";
$resultA= $conexao->query($sql_dis);


?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Material</title>
    <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/index.css">
</head>

<body>
<div class="row"> <?php
    if (isset($_SESSION['erro_EM'])) {
      echo "<div class='alert alert-danger' style='height: 40px, width:70%;'>
        $_SESSION[erro_EM]
      </div> ";
      unset($_SESSION['erro_EM']);
    }
    if (isset($_SESSION['sucesso_EM'])) {
      echo "<div class='alert alert-success' style='height: 50px;'>
          $_SESSION[sucesso_EM]
      </div> ";
      unset($_SESSION['sucesso_EM']);
    }
    ?>
    </div>
    <br>

    <form enctype="multipart/form-data" action="../controller/editarmaterial.php" method="POST" style="margin-left: 10%; max-width: 70%;">
        <input type="hidden" name="id" value="<?php echo "$id"  ?>">
        <input type="hidden" name="id_material" value="<?php echo "$id_material"  ?>">


        <h2 style="margin-top: 20px; margin-left:25%">Edite um Material:</h2><br>
        <div class="form-group">
        <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Nivel de dificuldade</label>
        <select class="form-select" aria-label="Default select example" name="nivel">

        <?php while ($dados = $consult->fetch_assoc()) { ?>
            <option value="<?php echo $dados['id_nivel'] ?>"><?php echo $dados['nivel'] ?></option>
            
            <?php   } ?>
        </select></div><br>
        <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Disciplina</label>
        <select class="form-select" aria-label="Default select example" name="disciplina">

        <?php while ($info = $result->fetch_assoc()) { ?>
           
            <option value="<?php echo $info['id_disciplina'] ?>"><?php echo $info['nome'] ?></option>
            
         <?php   } ?>
        </select></div><br>

        
           

        <div class="form-group">
            <?php while ($consuta = $resultA->fetch_assoc()) { ?>
          
            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Titulo</label>
                 <input type="text" class="form-control" name="titulo" required value="<?php echo $consuta['titulo'] ?> " required>
        </div><br>
        
        <div class="form-group">
            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Descrição:</label>
            <input type="text" class="form-control" name="descricao"  value="<?php echo $consuta['descricao'] ?> " required> 
        </div><br>

        <div class="form-group">
            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Link:</label>
            <input type="text" class="form-control" name="link"  style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" value="<?php echo $consuta['link'] ?> " required >
        </div><br>


        <div class="form-group">
            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="#ffa710" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>Autor do video:</label>
            <input type="text" class="form-control" name="autor"  value="<?php echo $consuta['autor'] ?> " required>
            <?php   } ?>
        </div><br>
       
        <input type="submit" class="btn btn" style="max-width: 200px; margin-left: 30%; ">
       
    </form>
    
</body>

</html>