<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Atendimento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .button{
            display: inline-block;
            padding: 15px 170px;
            font-size: 16px;
            color: #fff;
            background-color: red;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="radio"] {
            display: none;
        }
        input[type="radio"] + label {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            font-size: 16px;
            line-height: 24px;
        }
        input[type="radio"] + label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 1px;
            width: 20px;
            height: 20px;
            border: 2px solid #333;
            background-color: #ccc;
            border-radius: 50%;
        }
        input[type="radio"]:checked + label:before {
            background-color: #333;
            border-color: #333;
        }
        input[type="text"] {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        
        
        <h1>Realizar Atendimento</h1>

        <form action="atendimentoController.php" method="post">
        
        <?php 
            if ($op == 'inicioAtend') {
                echo '<h2>Escolha o Público:</h2>';
                foreach ($publicos as $publico) {
                    echo '<input type="radio" name="idPublico" id="pub' . $publico['idPublico'] . '" value="' . $publico['idPublico'] . '"required>';
                    echo '<label for="pub' . $publico['idPublico'] . '">' . $publico['nomePublico'] . '</label><br>';
                }
                echo '<h2>Escolha a Forma de Atendimento:</h2>';
                foreach ($formAtendimentos as $formAtendimento) {
                    echo '<input type="radio" name="id" id="form' . $formAtendimento['idFormaAtendimento'] . '" value="' . $formAtendimento['idFormaAtendimento'] . '"required>';
                    echo '<label for="form' . $formAtendimento['idFormaAtendimento'] . '">' . $formAtendimento['nomeAtendimento'] . '</label><br>';
                }
                $op = 'listarFimAtend';
                $value = 'Próximo';
            } else {
                echo '<h2>Perguntas:</h2>';
                foreach ($perguntas as $pergunta) {
                    echo '<input type="radio" name="idPerguntaPublico" id="pergunta' . $pergunta['idPerguntaPublico'] . '" value="' . $pergunta['idPerguntaPublico'] . '"required>';
                    echo '<label for="pergunta' . $pergunta['idPerguntaPublico'] . '">' . $pergunta['descricaoPergunta'] . '</label><br>';
                }
                
                $op = 'incluir';
                $value = 'Concluir Atendimento';
                $idFormaAtendimento = $idForma;
                echo '<input type="text" placeholder="Resposta Para o Atendimento" name="respostaAtendimento" required><br>';
            }
        ?>
        
        <input type="hidden" name="op" value="<?php echo $op; ?>">
        <input type="hidden" name="idFormaAtendimento" value="<?php echo $idFormaAtendimento; ?>">

        <input type="submit" value="<?php echo $value; ?>">
        </form>
        <br>
        <a href="../index.php " class="button">Cancelar</a>

        
        
    </div>
</body>
</html>
