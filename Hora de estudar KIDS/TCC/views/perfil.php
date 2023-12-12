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
$result = $conexao->query($sql);

$sql_U = "SELECT * FROM tb_questao_usuario";
$consult = $conexao->query($sql_U);

$sql_Q = "SELECT * FROM tb_questao";
$consult_q = $conexao->query($sql_Q);

$sql_corretas = "SELECT tb_questao.id_questao FROM tb_questao
                JOIN tb_questao_usuario ON tb_questao.id_questao = tb_questao_usuario.id_questao
                WHERE tb_questao.op_correto = tb_questao_usuario.resposta
                AND tb_questao_usuario.id_usuario = $id"; 

$result_corretas = $conexao->query($sql_corretas);
if ($result_corretas) {
    $questoes_corretas = [];
    while ($row = $result_corretas->fetch_assoc()) {
        $questoes_corretas[] = $row['id_questao'];
    }
} else {
 
    echo "Query error: " . $conexao->error;
}

$respostas_corretas_usuario = count($questoes_corretas);

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
</head>

<body>

<?php
while ($dados = $result->fetch_assoc()) { 
    $foto = $dados['imagem'];
    $imagemPerfil = "../controller/Usuario/$foto";
    
    
    if (empty($foto) || !file_exists($imagemPerfil)) {
        
        $imagemPerfil = "https://img.freepik.com/psd-gratuitas/ilustracao-3d-de-uma-pessoa-com-oculos_23-2149436191.jpg?w=740&t=st=1696959754~exp=1696960354~hmac=332eb159f2653c2493f0588f9009800fd2b59e58aea0f8d8d035dcba23f802e9";
    }
?>
        

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 20rem;">
                
                <img src="<?php echo $imagemPerfil; ?>"
                    class="card-img-top" alt="..." style="width: 16rem; border-radius: 50%;margin-left:28px; margin-top: 5px;">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3">Seu Perfil</h5>
                        <p class="card-text">Nome: <?php echo $dados['nome']?></p>
                        <p class="card-text">Email: <?php echo $dados['email']?></p>
                        

                        <a href="../views/editePerfil.php?id_usuario=<?php echo $id?>">
                            <button type="button" class="btn btn-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>  Edite seu perfil
                            </button><br>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-8">

                <div class="card" style="width: 50rem; ">
                    <img src="../public/imagens/ponto.png" 
                    class="card-img-top" alt="..." style="margin-top: 10px; margin-left: 40px; width: 45rem; height: 250px;border-radius: 30px;">
                    <hr style=" border-top: 4px dashed #8c8b8b;">
  <div class=" card-body">
                    <h1 class="card-title text-center mb-3">SUA PONTUAÇÃO:</h1>
                    <p class="card-text" style="text-align: center; font-size: 50px;"><?php echo $respostas_corretas_usuario; ?> PONTOS</p>
                </div>
                
            </div>
        </div>
    </div>
    <?php  } ?>
    </div>
    
</body>