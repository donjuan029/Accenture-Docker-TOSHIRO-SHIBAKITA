<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exemplo PHP</title>
</head>
<body>

<?php
// Exibir erros apenas para desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Informações do servidor
$servername = "54.234.153.24";
$username   = "root";
$password   = "Senha123";
$database   = "meubanco";

// Exibir versão do PHP
echo "<p>Versão atual do PHP: " . phpversion() . "</p>";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Gerar dados aleatórios
$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
$host_name   = gethostname();

// Preparar query segura
$stmt = $conn->prepare(
    "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) 
     VALUES (?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "isssss",
    $valor_rand1,
    $valor_rand2,
    $valor_rand2,
    $valor_rand2,
    $valor_rand2,
    $host_name
);

// Executar query
if ($stmt->execute()) {
    echo "<p>Registro criado com sucesso.</p>";
} else {
    echo "<p>Erro ao inserir registro: " . $stmt->error . "</p>";
}

// Fechar conexão
$stmt->close();
$conn->close();
?>

</body>
</html>