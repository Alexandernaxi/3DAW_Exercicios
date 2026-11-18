<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if($conn->connect_error){
    die("Erro ao se conectar ao banco de dados");
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $pergunta = $_GET["pergunta"];
    $questao1 = $_GET["questao1"];
    $questao2 = $_GET["questao2"];
    $questao3 = $_GET["questao3"];
    $questao4 = $_GET["questao4"];
    $resposta = $_GET["resposta"];

$sql = "UPDATE `perguntas` set `pergunta` = '$pergunta', `alt1` = '$questao1', `alt2` = '$questao2', `alt3` = '$questao3', `alt4` = '$questao4', `resposta` = $resposta WHERE `id` = $id";
if($conn->query($sql) === TRUE) {
    echo "Pergunta alterada";
} else {
    echo "Erro ao alterar pergunta";
}
}
?>