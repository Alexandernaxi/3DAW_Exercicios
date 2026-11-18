<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if($conn->connect_error) {
    die("Conexão com o banco de dados falhou");
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $pergunta = $_GET["pergunta"];
    $questao1 = $_GET["questao1"];
    $questao2 = $_GET["questao2"];
    $questao3 = $_GET["questao3"];
    $questao4 = $_GET["questao4"];
    $resposta = $_GET["resposta"];

$sql = "INSERT into perguntas (id, pergunta, alt1, alt2, alt3, alt4, resposta) VALUES ($id, '$pergunta', '$questao1', '$questao2', '$questao3', '$questao4', $resposta)";
if($conn->query($sql) === TRUE) {
    echo "Pergunta cadastrada";
} else {
    echo "Erro ao cadastrar pergunta";
}
}
?>