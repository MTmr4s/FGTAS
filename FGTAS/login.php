<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
         body {
            font-family: Arial, sans-serif;
        
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;

        background-image: url("/FGTAS/imagens/PORTO ALEGRE.jpg");
        background-size: cover;
        background-position: center; 
        background-repeat: no-repeat;
        }

        .container {
            background-color: white; 
            background-image: url("/FGTAS/imagens/logo_login.png");
            background-size: contain; 
            background-repeat: no-repeat;
            background-position: center 90px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            margin-top: 50px;
            position: relative;
        }
        

        h1 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            text-align: left;
            color: #666;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            margin-top: 5px;
            margin-left: -10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        input[type="submit"], button {
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: -5px;
            padding: 10px;
             border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            margin-top: 5px;
        }

        input[type="submit"]:hover, button:hover {
            background-color: black;
        }

        h5 {
            margin-top: 20px;
            color: #333;
        }

        a {
            text-decoration: none;
        }
        #form{
            margin-top:150px;
        }
    </style>
    
</head>
<body>
   

    <div class="container">
        <?php 
        if($op=='login'){
            $content = '<div id=form>
            <form action="autenticaController.php" method="post" class="form-login">
            <label for="usuario">Nome de Usuario</label>
            <input type="text" name="loginUsuario" id="usuario" >
            <label for="senha">Senha</label>
            <input type="password" name="senhaUsuario" id="senha">
            <input type="hidden" name="op" value="autenticar">
            <input type="submit" value="Enviar">
            </form>
            
            <h5>Não tem cadastro ainda?</h5>

            <a href="autenticaController.php?op=registrarUsuario"><button>Cadastre-se</button></a> </div>';
            $word = 'login';
        
        }else{
            $word = 'Cadastro';
            $content = ' <div id=form>
                <form action="autenticaController.php" method="post">
                <label for="nome">Nome completo:</label>
                <input type="text" name="nomeUsuario" id="nome">

                <label for="email">Email:</label>
                <input type="text" name="emailUsuario" id="email">

                <label for="username">Username:</label>
                <input type="text" name="loginUsuario" id="username">

                <label for="senha">Senha:</label>
                <input type="password" name="senhaUsuario" id="senha">

                <label for="telefone">Celular:</label>
                <input type="text" name="telefoneCelular" id="telefone">

                <input type="hidden" name="op" value="criarUsuario">

                <input type="submit" value="Cadastrar">

                </form>
                <h5>Ja tem cadastro?</h5>
                

            <a href="autenticaController.php?op=loginsFor"><button>Login</button></a> </div>';
            

        }

        
        ?>
        <h1>Página de <?php echo $word;?></h1>
        <?php echo $content;?>
    </div>
    

    
</body>
</html>
