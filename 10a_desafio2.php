<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>Cadastrar Produto</h2>
    
    <!-- Formulário de Cadastro -->
    <form method="post" action="">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="preco">Preço (R$):</label>
        <input type="number" step="0.01" name="preco" id="preco" required><br><br>

        <button type="submit">Cadastrar Produto</button>
    </form>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $preco = $_POST['preco'] ?? '';

    // Validação dos dados
    if (empty($nome)) {
        echo "<p style='color: red;'>Ops! Está área não pode ficar vazia.</p>";
    } elseif (!is_numeric($preco) || floatval($preco) <= 0) {
        echo "<p style='color: red;'>Erro: O preço deve ser um número positivo.</p>";
    } else {
        $preco_validado = floatval($preco);

        $servername = "localhost";
        $username = "root";
        $password = "Senai@118";
        $dbname = "exercicio";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Insere o registro no banco de dados usando Prepared Statement (Mais seguro)
        $stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
        $stmt->bind_param("sd", $nome, $preco_validado);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Produto cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color: red;'>Erro ao cadastrar: " . $stmt->error . "</p>";
        }

        // Fecha a declaração e a conexão
        $stmt->close();
        $conn->close();
    }
}
?>
</body>
</html>

<!--
  SQL para criar a tabela no banco de dados 'exercicio':

  CREATE TABLE produtos (
      id INT AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(100) NOT NULL,
      preco DECIMAL(10, 2) NOT NULL
  );
-->