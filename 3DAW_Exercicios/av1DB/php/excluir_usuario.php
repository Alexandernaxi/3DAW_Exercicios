<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if($conn->connect_error) {
    die("Erro ao conectar ao banco de dados.");
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $cpf = $_GET["cpf"];

$sql = "DELETE FROM `usuarios` WHERE cpf = $cpf";

if($conn->query($sql) === TRUE) {
    if($conn->affected_rows > 0) {
        echo "Usuario Excluido";
    } else {
        echo "CPF inexistente";
    }
} else {
    echo "Erro ao apagar Usuario";
}
}
?>