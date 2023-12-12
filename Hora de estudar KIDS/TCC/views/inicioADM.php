<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_admin.php';

$id = $_SESSION['id_admin'];
if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
  }

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/index.css">
    <style>
      
      .card-container {
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 80vh; 
      }
  </style>
</head>

<body>

    <br> <br>

    <div class="container" id="con">
        <div class="row">


            <div class="col-3" >              
                    <div class="card" id="dois">
                        <img src="../public/imagens/ajudanteVerificado.png" style="margin-top:  4px; margin-left: 4px;  height: 250px; width: 98%;  margin-right:4px; border-radius:5px;">
                        <h2 class="card-title mt-3 mb-3 text-center">Ajudantes</h2>
                        
                        <a href="../views/ajudantesPendentes.php" class="btn btn-outline" style="max-width: 90%; margin-left:12px;" > Pendentes</a>
                        <a href="../views/ajudantesVerificados.php" class="btn btn-outline" style="max-width: 90%; margin-left:12px;" > Verificados</a>
                    
                    </div>
                    </div>
            



            <div class="col-3" >
                <div class="card" id="dois">
                    <img src="../public/imagens/materiaisPendentes.png"  style="margin-top:  4px; margin-left: 4px;  height: 250px; width: 98%;  margin-right:4px; border-radius:5px;">
                    <h2 class="card-title mt-3 mb-3 text-center">Materiais</h2>
                    
                      <a href="../views/materialPendente.php" class="btn btn-outline"  style="max-width: 90%; margin-left:12px;"> Pendentes</a>
                      <a href="../views/materialVerificado.php" class="btn btn-outline" style="max-width: 90%; margin-left:12px;"> Verificado</a>
                      <a href="../views/adicionarMaterial.php" class="btn btn-outline" style="max-width: 90%; margin-left:12px;"> Adicionar Material</a>
                     

                </div>
            </div>

            <div class="col-3" >
               
                    <div class="card" id="dois">
                        <img src="../public/imagens/peguntasPendetes.png"  style="margin-top:  4px; margin-left: 4px;  height: 250px; width: 98%;  margin-right:4px; border-radius:5px;">
                        <h2 class="card-title mt-3 mb-3 text-center">Perguntas </h2>
                       
                        <a href="../views/perguntaPendente.php" class="btn btn-outline"  style="max-width: 90%; margin-left:12px; "> Pendentes</a>
                        <a href="../views/perguntaVerificada.php" class="btn btn-outline"  style="max-width: 90%; margin-left:12px; "> Verificado</a>
                        <a href="../views/adicionarQuestao.php" class="btn btn-outline" style="max-width: 90%; margin-left:12px;"> Adicionar Perguntas</a>
                     
                    </div>
                    </div>
                   
          
           
                    </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>

</html>