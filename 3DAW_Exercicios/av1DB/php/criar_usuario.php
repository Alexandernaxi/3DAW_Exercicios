<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if($conn->connect_error){
    die("Erro ao se conectar ao banco de dados.");
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];

$sql = "INSERT INTO usuarios (nome, cpf) VALUES ('$nome', $cpf)";
if($conn->query($sql) === TRUE) {
    echo "Usuario cadastrado";
} else {
    echo "Não foi possível cadastrar o usuario.";
}
}
?>