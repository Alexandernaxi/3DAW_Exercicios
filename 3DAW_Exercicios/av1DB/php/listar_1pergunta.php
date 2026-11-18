<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if($conn->connect_error) {
    die("Não foi possivel se conectar ao banco de dados.");
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
}

$sql = "SELECT id, pergunta, alt1, alt2, alt3, alt4, resposta FROM `perguntas`";
$pergunta = $conn->query($sql);

while($linha = $pergunta->fetch_assoc()) {
    if($linha['id'] == $id) {
        echo "ID: " . $linha['id'] . "<br>";
        echo "Pergunta: " . $linha['pergunta'] . "<br>";
        echo "A) " . $linha['alt1'] . "<br>";
        echo "B) " . $linha['alt2'] . "<br>";
        echo "C) " . $linha['alt3'] . "<br>";
        echo "D) " . $linha['alt4'] . "<br>";
        echo "Resposta: " . $linha['resposta'];
    }
}
?>