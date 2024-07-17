
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
            background-color: #f4f4f4;
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
    <h1>Gerrenciar Atendimentos</h1>
    <div class="buttons">
        <form action="atendimentoController.php" method="post">
        <button type="submit" name="op" value="listarAtendimento" class="btn btn-custom"></i> Gerenciar Atendimentos</button>
        <button type="submit" name="op" value="listarAtendimentoInativo" class="btn btn-custom"><i class="fas fa-eye-slash"></i> Gerenciar Atendimentos Inativos</button>
        
        </form>
        
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Tipos Atendimento</th>
            <th>Pergunta</th>
            <th>Resposta</th>
            <th>Data Cadastro</th>
            <th>#</th>
        </tr>


        <?php foreach ($atendimentos as $atendimento): ?>
            <tr>
                <td><?php echo $atendimento['idAtendimento']; ?></td>
                <td><?php echo $atendimento['nomeUsuario']; ?></td>
                <td><?php echo $atendimento['nomeAtendimento']; ?></td>
                <td><?php echo $atendimento['descricaoPergunta']; ?></td>
                <td><?php echo $atendimento['respostaAtendimento']; ?></td>
                <td><?php echo formatarDataHora($atendimento['dataCadastro']); ?></td>
                <td><a class="fas fa-ban deactivate-btn" href="atendimentoController.php?op=alterar&idAtendimento=<?php echo $atendimento['idAtendimento'];?>&ativo=<?php if ($atendimento['ativo']=='S') {
                    echo 'N';
                }else{echo 'S';}?>"></a></td>

            </tr>
        <?php endforeach; ?>
    </table>



    
    <a href="../index.php " class="button">Voltar</a>

    

        
   
</body>
</html>






