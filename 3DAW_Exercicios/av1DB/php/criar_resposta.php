<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if ($conn->connect_error) {
    die("Erro ao se conectar ao banco de dados.");
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $IDperg = $_GET["IDperg"];
    $IDresp = $_GET["IDresp"];

$sql = "INSERT INTO resposta (idperg, idresp) VALUES ($IDperg, $IDresp)";
if($conn->query($sql) === TRUE) {
    echo "Resposta cadastrada";
} else {
    echo "Não foi possível cadastrar a resposta";
}
}
?>