<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: controller/autenticaController.php?op=loginForm');
    exit(); 

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema FGTAS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body {
            background-color: grey;
           
        }
        .navbar {
            background-color: #000; 
        }
        .navbar-brand {
            color: white !important;
        }
        .navbar .user-name {
            color: white;
            margin-right: 20px;
        }
        
         .nav-item {
        list-style: none;
        }
        
        
        .main-header {
            padding: 20px;
            background-color: #000;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
            border: none;
        }
        .card-header {
            background-color: blue;
            color: white;
            font-weight: bold;
        }
        .card-body {
            background-color: #fff;
        }
        .btn-custom {
            background-color: mediumblue;
            color: white;
        }
        .btn-custom:hover {
            background-color: #444;
        }
      
        .main-header{
            background-color: blue;
        }
        
        .carousel-container {
            max-width: 700px;
            margin: 0 auto;
        }
        #flecha1{
            margin-left: 170px;
            margin-top: 350px;

        }

        #flecha2{
            margin-right: 170px;
            margin-top: 350px;

        }
        #tamanho{
            height:50px;
             margin-top: 300px;
            
        }
        
        .nav-item.dropdown {
    position: relative;
}
.dropdown-menu {
    top: 100% !important;
    right: 0 !important;
    left: auto !important;
    transform: none !important;
}
       
        
      
        
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="imagens/logo.png" alt="Logo FGTAS" style="width: 80px; height: 50px; margin-left: 10px;">
  </a>

  <div class="ml-auto user-name">
    <i class="fas fa-user"></i> <?php echo $_SESSION['nome']; ?>
  </div>

  
  <li class="nav-item dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="navbarDropdownMenuLink"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="navbar-toggler-icon" id="icone"></span>
  </button>

  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
    <a class="dropdown-item" href="controller/publicoController.php?op=listar">Gerenciar Públicos</a>
    <a class="dropdown-item" href="controller/formAtendimentoController.php?op=listar">Tipos Atendimentos</a>
    <a class="dropdown-item" href="controller/atendimentoController.php?op=listarAtendimento">Gerenciar Atendimentos</a>
    <a class="dropdown-item" href="controller/atendimentoController.php?op=listarPublicos">Novo Atendimento</a>
    <a class="dropdown-item" href="controller/autenticaController.php?op=logout">Sair</a>
  </div>
</li>
  
</nav>

    
    <div class="content">
        <div class="main-header">
            <h1>Atendimento FGTAS</h1>
            <h4>Seja bem vindo <?php echo $_SESSION['nome'] ?></h4>
            
        </div>

        <div class="carousel-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div  class="carousel-item active"  >
          <img id="imagem" class="d-block w-100 img-fluid" src="imagens/Vaga_de_emprego_3.png" alt="Primeiro Slide">
        </div>
        <div class="carousel-item" >
          <img id="imagem" class="d-block w-100 img-fluid" src="imagens/Vaga_de_emprego.png"  alt="Segundo Slide">
        </div>
        <div class="carousel-item " >
          <img id="imagem" class="d-block w-100 img-fluid" src="imagens/Vaga_de_emprego_2.png" alt="Terceiro Slide">
        </div>
      </div>
      </div>
      <a id="tamanho" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span id="flecha1" class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span id="flecha1" class="sr-only">Anterior</span>
      </a>
      <a id="tamanho" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span id="flecha2" class="carousel-control-next-icon" aria-hidden="true"></span>
        <span id="flecha2" class="sr-only">Próximo</span>
      </a>
    </div>
    
        <br>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-users"></i> Gerenciar Usuários
                        </div>
                        <div class="card-body">
                            <p>Gerencie todos os usuários do sistema.</p>
                            <a href="controller/atendimentoController.php?op=listarAtendimento" class="btn btn-custom">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-users-cog"></i> Gerenciar Públicos
                        </div>
                        <div class="card-body">
                            <p>Gerencie todos os públicos cadastrados.</p>
                            <a href="controller/publicoController.php?op=listar" class="btn btn-custom">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-clipboard-list"></i> Gerenciar Atendimentos
                        </div>
                        <div class="card-body">
                            <p>Gerencie todos os tipos de atendimentos cadastrados.</p>
                            <a href="controller/formaAtendimentoController.php?op=listar" class="btn btn-custom">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-plus-circle"></i> Novo Atendimento
                        </div>
                        <div class="card-body">
                            <p>Realize um novo atendimento.</p>
                            <a href="controller/atendimentoController.php?op=listarPublicos" class="btn btn-custom">Iniciar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

