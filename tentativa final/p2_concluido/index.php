<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .form-container label {
            margin-bottom: 10px;
        }

        .form-container input {
            margin-bottom: 20px;
            padding: 5px;
            width: 300px;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
            opacity: 0.8;
        }

        .form-container .data-container {
            margin-top: 50px;
        }

        .form-container .data-container table {
            border-collapse: collapse;
        }

        .form-container .data-container th,
        .form-container .data-container td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="inserir.php" method="POST">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Nome">
            </div>
            <div>
                <label for="documento">Documento</label>
                <input type="text" name="documento" placeholder="Documento">
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" placeholder="Telefone">
            </div>
            <div>
                <label for="escolaridade">Escolaridade</label>
                <input type="text" name="escolaridade" placeholder="Escolaridade">
            </div>
            <button type="submit">Enviar</button>
        </form>

        <div class="data-container">
            <h2>Dados cadastrados</h2>
            <?php
            require_once('Bancodedadosconexao.php');

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "p2bd";

            $objeto = new Bancodedadosconexao($servername, $username, $password, $dbname);

            $dados = $objeto->ler_dados();
            if ($dados) {
                echo "<table>";
                echo "<tr><th>Nome</th><th>Documento</th><th>Telefone</th><th>Escolaridade</th><th>Ação</th></tr>";
                foreach ($dados as $candidato) {
                    echo "<tr>";
                    echo "<td>" . $candidato['nome'] . "</td>";
                    echo "<td>" . $candidato['documento'] . "</td>";
                    echo "<td>" . $candidato['telefone'] . "</td>";
                    echo "<td>" . $candidato['escolaridade'] . "</td>";
                    echo "<td><a href='remover.php?documento=" . $candidato['documento'] ."</td>";
                }
            }

            
        
    
