<?php

class Bancodedadosconexao {
  private $conexao;

  function __construct($servername, $username, $password, $dbname) {
    $this->conexao = new mysqli($servername, $username, $password, $dbname);

    if ($this->conexao->connect_errno) {
      echo "Falha ao conectar ao banco de dados: " . $this->conexao->connect_error;
      exit();
    }
  }

  function __destruct() {
    if ($this->conexao) {
      $this->conexao->close();
    }
  }

  function inserir_dados($nome, $documento, $telefone, $escolaridade) {

    $stmt = $this->conexao->prepare("INSERT INTO candidatos (nome, documento, telefone, escolaridade) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $documento, $telefone, $escolaridade);

    if ($stmt->execute()) {
      return true;
    } else {
      echo "Erro ao cadastrar candidato: " . $stmt->error;
      return false;
    }
  }

  function ler_dados() {
    $sql = "SELECT * FROM candidatos";
    $resultado = $this->conexao->query($sql);
    $dados = array();

    if ($resultado->num_rows > 0) {
      while ($row = $resultado->fetch_assoc()) {
        $dados[] = $row;
      }
    }

    return $dados;
  }

  function atualizar_dados($documento, $nome, $telefone, $escolaridade) {
    $stmt = $this->conexao->prepare("UPDATE candidatos SET nome=?, telefone=?, escolaridade=? WHERE documento=?");
    $stmt->bind_param("ssss", $nome, $telefone, $escolaridade, $documento);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  function remover_dados($documento) {
    $stmt = $this->conexao->prepare("DELETE FROM candidatos WHERE documento=?");
    $stmt->bind_param("s", $documento);

    if ($stmt->execute()) {
      return true;
    } else {
      echo "Erro ao remover cadastro do candidato: " . $stmt->error;
      return false;
    }
  }
}

?>
