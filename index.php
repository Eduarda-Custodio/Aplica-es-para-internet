<?php
// Inclua a definição da classe DatabaseConnection
require_once 'DatabaseConnection.php';

// Informações de conexão com o banco de dados
$dsn = "mysql:host=localhost;dbname=usuarios";
$username = "Eduarda";
$password = "123";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

// Obtém a instância da classe DatabaseConnection
$db = DatabaseConnection::getInstance($dsn, $username, $password, $options);

// Conecta-se ao banco de dados
$db->connect();

// Executa uma consulta SQL
$result = $db->query("SELECT * FROM usuarios");

// Exibe os resultados na tela
foreach ($result as $row) {
    echo $row["username"] . "\n";
}
