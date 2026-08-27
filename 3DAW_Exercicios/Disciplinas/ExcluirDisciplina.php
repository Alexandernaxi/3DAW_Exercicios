<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $disciplina = "";

    $arqDisciplina = fopen("disciplinas.txt", "r");
    while (($linha = fgets($arqDisciplina)) !== false) {
        $arqRemover = explode(";", $linha);

        if ($arqRemover[0] == $nome) {
            $disciplina = $disciplina . "\n";
            $msg = "Disciplina excluida";
        } else {
            $disciplina = $disciplina . $linha;
        }
    }
    fclose($arqDisciplina);

    $arqDisciplina = fopen("disciplinas.txt", "w");
    fwrite($arqDisciplina, $disciplina);
    fclose($arqDisciplina);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Disciplina</title>
</head>
<body>
    <h1><center>Excluir Disciplina</center></h1>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        <input type="submit" value="Excluir">
    </form>

    <br><a href="IncluirDisciplina.php">Voltar</a>
    <p><?php echo $msg; ?></p>
</body>
</html>