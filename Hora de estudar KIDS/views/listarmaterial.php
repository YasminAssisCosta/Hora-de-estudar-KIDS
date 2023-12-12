
<?php
require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_user.php';

$id = $_SESSION['usuario'];
if (empty($id)) {
    header('Location: erro.php'); 
    exit; 
}

$nivel = $_GET['nivel'];
$disciplina = $_GET['disciplina'];

$sql = "SELECT m.* 
        FROM tb_material m
        WHERE m.id_nivel = '{$nivel}' 
        AND m.verificado = '1' 
        AND m.id_disciplina = '$disciplina'
        AND (SELECT COUNT(*) FROM tb_questao q WHERE q.id_material = m.id_material AND q.verificado = '1') >= 4";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/index.css">
</head>

<body>

    <br><br>

    <div class="container">

    <?php
    if ($result->num_rows > 0) {
        while ($dados = $result->fetch_assoc()) {
            $foto = $dados['imagem'];
    ?>

          

            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="row" style="width: 100%;">

<div class="col-2"  >
    <img src="<?php echo "../controller/Upload/$foto" ?>"  style=" width: 190px; border-radius:20px; margin-left:9px; border-color: black; margin-top: 4px;">
</div>

<div class="col-10" style="max-width:80%; margin-left:20px;">
    <h2 style=" margin-top:2%; font-family: 'Patua One', sans-serif;"><?php echo $dados['titulo'] ?></h2>
    <p><?php echo $dados['descricao'] ?></p>
    <a href="../views/vermaterial.php?id=<?php echo $dados['id_material']?>" class="btn btn-outline text-center" style="width: 95%; margin-left:12px; margin-top:1% ;" >Iniciar</a>
    
    <?php
    $material = $dados['id_material'];
    $sql_questoes = "SELECT * FROM tb_questao WHERE id_material = '{$material}'";
    $result_questoes = $conexao->query($sql_questoes);
    $num_questoes_respondidas = 0;

    while ($questao = $result_questoes->fetch_assoc()) {
        $id_questao = $questao['id_questao'];
        $sql_resposta = "SELECT * FROM tb_questao_usuario WHERE id_usuario = '{$id}' AND id_questao = '{$id_questao}'";
        $result_resposta = $conexao->query($sql_resposta);

        if ($result_resposta->num_rows > 0) {
            $num_questoes_respondidas++;
        }
    }

    if ($num_questoes_respondidas >= 4) {
       
    ?>
        <a href="../views/quizzResposta.php?material=<?php echo $dados['id_material'] ?>" class="btn btn-outline text-center" style="width: 95%; margin-left: 12px; margin-top: 1%;" >Ver resposta</a>
    <?php
    }
    ?>
</div>


</div>

<br>
                    </div>
                </div>
            </div>
            <br>

    <?php
        }
    } else {
       
    ?>

 <h1 style="text-align: center;  margin-top: 50px; font-family: 'Patua One', sans-serif;">Desculpe, ainda não há materiais cadastrados</h1>

    <?php
    }
    ?>

    </div>

</body>

</html>
