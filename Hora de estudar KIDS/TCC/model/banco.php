<?php
$conexao = mysqli_connect("localhost", "root", "", "tcc");


if (!$conexao) {
  
    die("Falha na conexão com o banco: " . mysqli_connect_error());
   
}

?>