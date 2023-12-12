<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/erro.css">
    <title>Document</title>
</head>
<body>
    
<div class="container text-center"> 
<img src="../public/imagens/gato.png" style="max-height: 300px; width: 40%; margin-top:80px; border-radius: 8px;">
    <h1>Desculpe, você não realizou o login, volte a tela incial </h1>
    
    <div class="d-flex justify-content-center mt-3"> 
        <a href="../index.html">
            <button class="Btn">Inicio</button>
        </a>
        
    </div>
</div>

<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>

</body>
</html>
