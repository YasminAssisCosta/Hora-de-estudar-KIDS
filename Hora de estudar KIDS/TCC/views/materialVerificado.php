<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_admin.php';

$id = $_SESSION['id_admin'];
if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
  }

$sql = "SELECT * FROM tb_material where verificado = '1'";
$result = $conexao->query($sql);

?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materiais Pedentes</title>
    <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/table.css">
</head>

<body>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <div class="row"> <?php
    if (isset($_SESSION['erro_CM'])) {
      echo "<div class='alert alert-danger' style='height: 40px, width:70%;'>
        $_SESSION[erro_CM]
      </div> ";
      unset($_SESSION['erro_CM']);
    }
    if (isset($_SESSION['sucesso_CM'])) {
      echo "<div class='alert alert-success' style='height: 50px;'>
          $_SESSION[sucesso_CM]
      </div> ";
      unset($_SESSION['sucesso_CM']);
    }
    ?>
    </div>
    <h2 id="titleTable">Material Verificados</h2>
    <div class="table-wrapper">
    <?php
    if ($result->num_rows > 0) {
        
    ?>
            <table class="fl-table">
                <thead>
                <thead>

<tr>
        <th>Titulo</th>
        
        <th>Descrição</th>
        <th>Link </th>
        <th>Nivel</th>
        <th>Checar Novamente</th>
        <th>Editar</th>
        <th>Apagar</th>

    </tr>
</thead>
                    <?php
                    while ($dados = $result->fetch_assoc()) { ?>
                        <tbody>

                     
                            <tr>
                                <td> <?php echo $dados['titulo'] ?></td>
                                <td style="max-width: 200px; max-height: 250px; font-size: 12px; overflow: hidden; text-overflow: ellipsis; white-space: normal;"><?php echo $dados['descricao'] ?></td>
<td><a href="../views/vermaterialAdmin.php?id_material=<?php echo $dados['id_material'] ?>"><img src="https://i.pinimg.com/236x/bb/f1/f3/bbf1f3cf16a6c12aaea3a5e45f0eb766.jpg" class="img-fluid" alt="curriculo" style="width:50%; height:65px;"> </a> </td>
                                
                                
                                <td scope="row"><?php echo $dados['id_nivel'] ?></td>
                                <td> <a href="../controller/checaMaterial.php?id_material=<?php echo $dados['id_material'] ?>"class="btn btn-outline" style="background-color: #E49695; color:#ffffff;">Checar Novamente</td>
                                <td> <a href="../views/editarmaterial.php?id_material=<?php echo $dados['id_material'] ?>" class="btn btn" style="background-color: #E49695;color:#ffffff;">Editar</td>
                                <td> <a href="../controller/apagamaterial.php?id_material=<?php echo $dados['id_material'] ?>" class="btn btn" style="background-color: #E49695;color:#ffffff;">Apagar</td>

                            </tr>
                            
                          
                       </tbody>
                        <?php } ?>

                </table>
                <?php } else { ?>
  <br>
  <h1 style="text-align: center;  margin-top: 50px; font-family: 'Patua One', sans-serif;">Desculpe, ainda não há materiais verificados</h1>
    
  <br><br>
    <?php  } ?>
</body>

</html>