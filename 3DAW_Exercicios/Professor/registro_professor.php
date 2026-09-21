<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];

    if(!file_exists("professor.txt")) {
        $arq_professor = fopen("professor.txt", "w")or die("Não foi possível criar o arquivo.");
        $linha = $matricula . "; " . $nome . "; " . $cpf . "; " . $endereco . "\n";
        fwrite($arq_professor, $linha);
        fclose($arq_professor);
    }
    else {
        $arq_professor = fopen("professor.txt", "a")or die("Não foi possível abrir o arquivo.");
        $linha = $matricula . "; " . $nome . "; " . $cpf . "; " . $endereco . "\n";
        fwrite($arq_professor, $linha);
        fclose($arq_professor);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Professor</title>
</head>
<body>
    <center><h1>Registro Professor</h1></center>

    <form action="registro_professor.php" method="POST">
        Matrícula: <input type="text" name="matricula"><br>
        Nome: <input type="text" name="nome"><br>
        CPF: <input type="text" name="cpf"><br>
        Endereço: <input type="text" name="endereco"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <br><a href="alterar_professor.php">Alterar Professor</a>
</body>
</html>