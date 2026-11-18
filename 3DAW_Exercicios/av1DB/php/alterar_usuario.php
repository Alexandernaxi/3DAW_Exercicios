<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if($conn->connect_error) {
    die("Nao foi possivel se conectar ao banco de dados");
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];

$sql = "UPDATE `usuarios` set `nome` = '$nome' WHERE `cpf` = $cpf";
if($conn->query($sql) === TRUE) {
    echo "Usuario alterado";
} else {
    echo "Não foi possível alterar o usuario";
}
}
?>