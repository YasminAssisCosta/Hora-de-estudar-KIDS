
<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_admin.php';

$id = $_SESSION['id_admin'];
if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
}

$sql= "SELECT * FROM tb_admin where verificado = '1' ";

$result = $conexao->query($sql);
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/table.css">
</head>

<body>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

        <div class="row"> <?php
    if (isset($_SESSION['erro_CA'])) {
      echo "<div class='alert alert-danger' style='height: 40px, width:70%;'>
        $_SESSION[erro_CA]
      </div> ";
      unset($_SESSION['erro_CA']);
    }
    if (isset($_SESSION['sucesso_CA'])) {
      echo "<div class='alert alert-success' style='height: 50px;'>
          $_SESSION[sucesso_CA]
      </div> ";
      unset($_SESSION['sucesso_CA']);
    }
    ?>
    </div>
        <h2 id="titleTable">Cheque ajudantes já verificados</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Curriculo lattes</th>
                    <th>Verificar</th> 
                    
                </tr>
                </thead>
                <?php
                    while ($dados = $result->fetch_assoc()) { ?>
                <tbody>

                <tr>
                   
                  
                    <td><?php echo $dados['nome'] ?></td>
                    <td><?php echo $dados['email'] ?></td>
                    <td><a href="<?php echo $dados['curriculo'] ?>" style="background-color: #E49695; color:#ffffff;"><img src="../public/imagens/curriculo.png" class="img-fluid" alt="curriculo" style = "width:15%; height:40px;"> </a> </td>
                    <td> <a href="../controller/checaAjudante.php?id_admin=<?php echo $dados['id_admin'] ?>" style="background-color: #E49695; color:#ffffff;"class="btn btn-outline">Checar Novamente</td>
                    
                </tr>
                
                    </tbody>
<?php } ?>

            </table>
        </div>
        
</body>

</html>