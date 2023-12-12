<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hora de Estudar KIDS</title>
    <link rel="shortcut icon" href="../public/imagens/bloco_logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/menu.css">
    <link href="https://fonts.cdnfonts.com/css/patua-one" rel="stylesheet">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg" >
        <div class="container-fluid">
            <img src="../public/imagens/lapis.png" id="logo" />
            <a class="navbar-brand" style="color:#ffffff; font-family: 'Arvo', serif; font-size: 22px; " href="../views/inicio.php">Hora de estudar KIDS</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="color: #ffffff;">
                <div class="navbar-nav" style="color: #ffffff;">

                    <a href="../views/inicio.php">
                        <button type="button" class="btn btn-outline">Início</button><br>
                    </a>
                    <a href="../views/mensagem.php">
                        <button type="button" class="btn btn-outline">Mensagem</button><br>
                    </a>
                    <a href="../views/perfil.php">
                        <button type="button" class="btn btn-outline">Seu Perfil</button><br>
                    </a>
                    <a href="../controller/sair.php">
                        <button type="button" class="btn btn-outline">Sair</button><br>
                    </a>
                    
                </div>
            </div>
        </div>
    </nav>
    <div vw class="enabled" >
        
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          
          <div class="vw-plugin-top-wrapper"></div>
        </div>
      </div>
     
      <script src="https://vlibras.gov.br/app/vlibras-plugin.js" ></script>
      <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
      </script>
    
    