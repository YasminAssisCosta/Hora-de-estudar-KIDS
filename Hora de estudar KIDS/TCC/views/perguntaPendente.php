<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');

session_start();
include 'menu_admin.php';

$id = $_SESSION['id_admin'];
if (empty($id)) {
  header('Location: erro.php'); 
  exit; 
}

$sql = "SELECT q.*, m.id_disciplina FROM tb_questao q 
        INNER JOIN tb_material m ON q.id_material = m.id_material
        WHERE q.verificado = '0'";

if (isset($_GET['disciplina']) && !empty($_GET['disciplina'])) {
  $id_disciplina_filtrada = $_GET['disciplina'];
  $sql .= " AND m.id_disciplina = $id_disciplina_filtrada";
}

$consult = $conexao->query($sql);

$sql_disciplinas = "SELECT * FROM tb_disciplina";
$consult_disciplinas = $conexao->query($sql_disciplinas);

?>


<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Materiais Pendentes</title>
  <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/table.css">
</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <div class="row">
    <?php
    if (isset($_SESSION['erro_VP'])) {
      echo "<div class='alert alert-danger' style='height: 40px, width:70%;'>
        $_SESSION[erro_VP]
      </div> ";
      unset($_SESSION['erro_VP']);
    }
    if (isset($_SESSION['sucesso_VP'])) {
      echo "<div class='alert alert-success' style='height: 50px;'>
          $_SESSION[sucesso_VP]
      </div> ";
      unset($_SESSION['sucesso_VP']);
    }
    ?>
  </div>

  <div class="row" style="margin-top: 10px ; ">
    <div class="col-4" style="margin-left: 40px;">
      <form class="form-inline" action="" method="GET">
        <label class="mr-2" for="disciplina">Filtrar por disciplina:</label>
        <select class="form-control mr-2" name="disciplina" id="disciplina">
          <option value="">Todas as disciplinas</option>
          <?php
          while ($disciplina = $consult_disciplinas->fetch_assoc()) {
            echo "<option value='" . $disciplina['id_disciplina'] . "'>" . $disciplina['nome'] . "</option>";
          }
          ?>
        </select>
    </div>
    <div class="col-1" style="margin-left: -80px;"> <button type="submit" class="btn btn-primary" style="background-color: #E49695; border-color: #E49695;">Filtrar</button>
    </form>
    </div>
  </div>

  <h2 id="titleTable">Perguntas Pendentes</h2>

  <div class="table-container">
    <?php
    if ($consult->num_rows > 0) {
    ?>
      <table class="fl-table">
        <thead>
          <tr>
            <th>Titulo do material</th>
            <th>Questão</th>
            <th>Opção 1</th>
            <th>Opção 2</th>
            <th>Opção 3</th>
            <th>Opção 4</th>
            <th>Opção Correta</th>
            <th>Verificar</th>
            
          </tr>
        </thead>
        <?php
        while ($dados = $consult->fetch_assoc()) { ?>
          <tbody>
            <tr>
            <th><?php $id_material = $dados['id_material'];
                $query = "SELECT titulo FROM tb_material WHERE id_material =  $id_material ";
                $result = mysqli_query($conexao, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                  $id_material = mysqli_fetch_assoc($result);
                  echo $id_material['titulo'];
                } else {
                  echo "titulo não encontrado";
                } ?></th>
              <th><?php echo $dados['questao'] ?></th>
              <th><?php echo $dados['txt_op1'] ?></th>
              <th><?php echo $dados['txt_op2'] ?></th>
              <th><?php echo $dados['txt_op3'] ?></th>
              <th><?php echo $dados['txt_op4'] ?></th>
              <th><?php echo $dados['op_correto'] ?></th>
              <td> <a href="../controller/verificaPergunta.php?id_questao=<?php echo $dados['id_questao'] ?>" class="btn btn-outline" style="background-color: #E49695; color:#ffffff;">Verificar</td>
             </tr>
          </tbody>
        <?php } ?>
      </table>
    <?php } else { ?>
      <br>
      <h1 style="text-align: center;  margin-top: 50px; font-family: 'Patua One', sans-serif;">Desculpe, ainda não há perguntas verificadas</h1>
      <br><br>
    <?php } ?>
  </div>
</body>

</html>
