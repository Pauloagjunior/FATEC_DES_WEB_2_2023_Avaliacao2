<?php
require_once('Bancodedadosconexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? null;
    $documento = $_POST['documento'] ?? null;
    $telefone = $_POST['telefone'] ?? null;
    $escolaridade = $_POST['escolaridade'] ?? null;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "p2bd";

    $objeto1 = new Bancodedadosconexao($servername, $username, $password, $dbname);

    if ($objeto1->inserir_dados($nome, $documento, $telefone, $escolaridade)) {
        echo "Seus dados foram armazenados no sistema";
    } else {
        echo "Ocorreu um erro, tente novamente";
    }
}
?>
