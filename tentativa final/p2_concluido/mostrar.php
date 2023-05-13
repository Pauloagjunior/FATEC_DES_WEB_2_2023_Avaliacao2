<?php
require_once('Bancodedadosconexao.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p2bd";

$objeto1 = new Bancodedadosconexao($servername, $username, $password, $dbname);
$dados = $objeto1->ler_dados();

if ($dados) {
    echo "<h1>Dados Cadastrados:</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>Documento</th><th>Telefone</th><th>Escolaridade</th></tr>";
    foreach ($dados as $row) {
        echo "<tr>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['documento']."</td>";
        echo "<td>".$row['telefone']."</td>";
        echo "<td>".$row['escolaridade']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
