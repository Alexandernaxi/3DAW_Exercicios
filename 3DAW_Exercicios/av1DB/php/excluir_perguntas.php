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
    $id = $_GET["id"];
    
$sql = "DELETE FROM `perguntas` WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    if($conn->affected_rows > 0) {
        echo "Pergunta apagada";
    } else {
        echo "ID inexistente";
    }
} else {
    echo "Erro ao apagar pergunta";
}
}
?>