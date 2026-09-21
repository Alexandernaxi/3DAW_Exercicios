<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];

    if (file_exists("professor.txt")) {
        $arq_professor = fopen("professor.txt", "r");
        $professor = "";

        while (($linha = fgets($arq_professor)) !== false) {
            $alterar = explode(";", trim($linha));

            if ($alterar[0] == $matricula) {
                $linha2 = $matricula . "; " . $nome . "; " . $cpf . "; " . $endereco . "\n";
                $professor = $professor . $linha2;
            } else {
                $professor = $professor . $linha;
            }
        }
        fclose($arq_professor);

        $arq_professor = fopen("professor.txt", "w");
        fwrite($arq_professor, $professor);
        fclose($arq_professor);
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Professor</title>
</head>
<body>
    <center><h1>Alterar Professor</h1></center>

    <form action="" method="POST">
        Matrícula: <input type="text" name="matricula"><br>
        Nome: <input type="text" name="nome"><br>
        CPF: <input type="text" name="cpf"><br>
        Endereço: <input type="text" name="endereco"><br><br>
        <input type="submit" value="Alterar">
    </form>
    
    <br><a href="registro_professor.php">Voltar</a>
</body>
</html>