<?php
$server = "localhost";
$host = "root";
$password = "";
$database = "av1";

$conn = new mysqli($server, $host, $password, $database);
if($conn->connect_error) {
    die("Erro ao se conectar ao banco de dados");
}

$sql = "SELECT id, pergunta, alt1, alt2, alt3, alt4, resposta FROM `perguntas`";
$perguntas = $conn->query($sql);

if ($perguntas->num_rows > 0) {
    while ($linha = $perguntas->fetch_assoc()) {
        echo "ID: " . $linha['id'] . "<br>";
        echo "Pergunta: " . $linha['pergunta'] . "<br>";
        echo "A) " . $linha['alt1'] . "<br>";
        echo "B) " . $linha['alt2'] . "<br>";
        echo "C) " . $linha['alt3'] . "<br>";
        echo "D) " . $linha['alt4'] . "<br>";
        echo "Resposta: " . $linha['resposta'] . "<br><br>"; 
    }
} else {
    echo "Nenhuma pergunta cadastrada.";
}
?>