<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_admin.php';

$id = $_SESSION['id_admin'];

if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
  }

$sql = "SELECT m.assunto, m.mensagem, u.email 
        FROM tb_mensagem m 
        INNER JOIN tb_usuario u ON m.id_usuario = u.id_usuario";
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


    <h2 id="titleTable">Mensagens disponíveis</h2>
    <div class="table-wrapper">
            <table class="fl-table">
                <thead>

                    <tr>
                           
                           
                            <th>Assunto</th>
                            <th>Mensagem</th>
                            <th>Usuario</th>
                           

                        </tr>
                    </thead>

                    <?php while ($dados = $result->fetch_assoc()) { ?>

                        <tbody>

                        <tbody>
                            



                            <th><?php echo $dados['assunto'] ?></th>


                            
                            <th><?php echo $dados['mensagem'] ?></th>
                           


                            <td><?php echo $dados['email'] ?></td>

                          
                            </tr>


                            <?php } ?>
                        </tbody>
                       

                </table>
               
</body>

</html>