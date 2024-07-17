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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: #000; /* Preto */
        }
        .navbar-brand {
            color: white !important;
        }
        .navbar .user-name {
            color: white;
            margin-right: 20px;
        }
        .sidebar {
            background-color: #333; /* Cinza Escuro */
            padding: 15px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            color: white;
        }
        .sidebar h4 {
            margin-bottom: 20px;
        }
        .sidebar .btn {
            display: block;
            width: 100%;
            text-align: left;
            color: white;
            padding: 10px;
            font-size: 18px;
            border: none;
            background: none;
            margin-bottom: 10px;
            text-decoration: none;
        }
        .sidebar .btn:hover {
            background-color: #555;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
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
            background-color: #000;
            color: white;
            font-weight: bold;
        }
        .card-body {
            background-color: #fff;
        }
        .btn-custom {
            background-color: #000;
            color: white;
        }
        .btn-custom:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-cogs"></i> Admin Sistema</a>
        <div class="ml-auto user-name">
            <i class="fas fa-user"></i> <?php echo $_SESSION['nome'];?>
        </div>
    </nav>
    
    <div class="sidebar">
        <h4>Menu</h4>
        
           <a href="controller/autenticaController.php?op=listar"><button  class="btn"><i class="fas fa-users"></i> Gerenciar Usuários</button></a> 
        
         
          
          
        <a href="controller/publicoController.php?op=listar"> <button type="submit" name="op" value="listar" class="btn" ><i class="fas fa-users-cog"></i> Gerenciar Públicos</button></a>
        
        </form></a>
        <a href="controller/formaAtendimentoController.php?op=listar"><button class="btn"><i class="fas fa-clipboard-list"></i> Tipos Atendimentos</button></a>



        <a href="controller/atendimentoController.php?op=listarAtendimento"><button  class="btn"><i class="fas fa-clipboard-list"></i> Gerenciar Atendimentos</button></a>


        <a href="controller/atendimentoController.php?op=listarPublicos"><button class="btn"><i class="fas fa-plus-circle"></i> Novo Atendimento</button></a>

        <a href="controller/autenticaController.php?op=logout">Sair</a>
        



    </div>
    
    <div class="content">
        <div class="main-header">
            <h1>Atendimento FGTAS</h1>
            <h4>Seja bem vindo <?php echo $_SESSION['nome'] ?></h4>
        </div>
        
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

