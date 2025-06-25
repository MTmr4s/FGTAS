<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Públicos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: grey;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        .buttons {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            margin: 0 10px;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #000;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .edit-btn {
            color: #007bff;
            cursor: pointer;
        }
        .edit-btn:hover {
            color: #0056b3;
        }
        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px 0;
            background-color: #000;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <h1>Lista de Atendimentos</h1>
    <div class="buttons">
        <form action="formaAtendimentoController.php" method="post">
        <button type="submit" name="op" value="formAtendimento" name class="btn btn-custom"><i class="fas fa-plus-circle"></i> Adicionar Atendimento</button>
        <button type="submit" name="op" value="listar" class="btn btn-custom"></i> Ver Atendimentos</button>
        <button type="submit" name="op" value="listarN" class="btn btn-custom"><i class="fas fa-eye-slash"></i> Ver Atendimentos Inativos</button>
        
        </form>
        
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome Do Tipo Atendimento</th>
            <th>Data Cadastro</th>
            
            <th>#</th>
        </tr>


        <?php foreach ($formAtendimentos as $formAtendimento): ?>
            <tr>
                <td><?php echo $formAtendimento['idFormaAtendimento']; ?></td>
                <td><?php echo $formAtendimento['nomeAtendimento']; ?></td>
                <td><?php echo formatarDataHora($formAtendimento['dataCadastro']); ?></td>
                <td><a class="fas fa-edit edit-btn" href="formaAtendimentoController.php?op=buscaId&idFormAtendimento=<?php echo $formAtendimento['idFormaAtendimento'];?>"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>



    
    <a href="../index.php " class="button">Voltar</a>

    

        
   
</body>
</html>
