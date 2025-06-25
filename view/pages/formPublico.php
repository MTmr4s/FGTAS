<?php   

        
        if(isset($op) && $op=="alterar"){
        $operacao = "alterar";
        $nomePublico = $publico['nomePublico'];
        $ativo = $publico['ativo'];


        $checkedS = ($ativo=='S')?'checked': '';
        $checkedN = ($ativo=='N')?'checked': '';


        $divContentAtivo = 
            '<div class="radio-container">
                <label for="ativoSim">Ativo</label>
                <input type="radio" id="ativoSim" value="S" name="ativo"'.$checkedS.'>
                <label for="ativoNao">Desativo</label>
                <input type="radio" id="ativoNao" value="N" name="ativo"'.$checkedN.'>
            </div>';
        
    }
    else
    {
        $operacao = "incluir";
        $nomePublico = '';
        $ativo = '';
        $divContentAtivo = 'Ativo';

    }
    ?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Público</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: grey;
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 50%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="submit"], .btn-back, .radio-container {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0 15px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        input[type="text"] {
            background-color: #f9f9f9;
        }
        input[type="submit"], .btn-back {
            background-color: #000;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }
        input[type="submit"]:hover, .btn-back:hover {
            background-color: #444;
        }
        .btn-back {
            display: block;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
        }
        .radio-container {
            display: flex;
            align-items: center;
        }
        .radio-container label {
            margin-right: 10px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Cadastrar Novo Público</h2>
        <form action="publicoController.php" method="post">
            <label for="nomePublico">Nome do Público:</label>
            <input type="text" id="nomePublico" name="nomePublico" value="<?php echo $nomePublico?>" required>
            
            <input type="hidden" name="op" value="<?php echo $operacao;?>">
            <input type="hidden" name="idPublico" value="<?php echo $idPublico;?>">
            
            <?php echo $divContentAtivo;?>
            
            
            <input type="submit" value="Enviar">
        </form>

        <form action="publicoController.php" method="post">
            <input type="hidden" name="op" value="listar">
            <input type="submit" class="btn-back" value="Voltar">
        </form>
    </div>
</body>
</html>

