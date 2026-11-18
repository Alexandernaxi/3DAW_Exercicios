<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if ($conn->connect_error) {
    die("Não foi possível conectar ao banco de dados");
}

$sql = "SELECT nome, cpf FROM `usuarios`";
$usuarios = $conn->query($sql);

if ($usuarios->num_rows > 0) {
    while ($linha = $usuarios->fetch_assoc()) {
        echo "Nome: " . $linha['nome'] . "<br>";
        echo "CPF: " . $linha['cpf'] . "<br><br>";
    }
} else {
    echo "Nenhum usuário cadastrado.";
}

?>