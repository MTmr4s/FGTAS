<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login/Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
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

        input[type="text"], input[type="password"], input[type="submit"], button {
            padding: 10px;
            margin-top: 5px;
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
    </style>
</head>
<body>
    <div class="container">
        <?php 
        if($op=='login'){
            $content = '<form action="autenticaController.php" method="post">
            <label for="usuario">Nome de Usuario</label>
            <input type="text" name="loginUsuario" id="usuario" >
            <label for="senha">Senha</label>
            <input type="text" name="senhaUsuario" id="senha">
            <input type="hidden" name="op" value="autenticar">
            <input type="submit" value="enviar">
            </form>
            <h5>Não tem cadastro ainda?</h5>

            <a href="autenticaController.php?op=registrarUsuario"><button>Cadastre-se</button></a>';
            $word = 'login';

        }else{
            $word = 'Cadastro';
            $content = ' <form action="autenticaController.php" method="post">
                <label for="nome">Nome completo:</label>
                <input type="text" name="nomeUsuario" id="nome">

                <label for="email">Email:</label>
                <input type="text" name="emailUsuario" id="email">

                <label for="username">Username:</label>
                <input type="text" name="loginUsuario" id="username">

                <label for="senha">Senha:</label>
                <input type="text" name="senhaUsuario" id="senha">

                <label for="telefone">Celular:</label>
                <input type="text" name="telefoneCelular" id="telefone">

                <input type="hidden" name="op" value="criarUsuario">

                <input type="submit" value="Cadastrar">

                </form>
                <h5>Ja tem cadastro?</h5>
                

            <a href="autenticaController.php?op=loginFor"><button>Login</button></a>';
            

        }

        
        ?>
        <h1>Página de <?php echo $word;?></h1>
        <?php echo $content;?>
    </div>


    
</body>
</html>
