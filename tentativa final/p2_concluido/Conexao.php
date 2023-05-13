<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p2bd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexão falhou tente novamente: " . $conn->connect_error);
}
?>