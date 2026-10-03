<?php
$pergunta = "";

if(file_exists("perguntas.txt")) {
    $arq_perguntas = fopen("perguntas.txt", "r");

    while(($linha = fgets($arq_perguntas)) !== false) {
        if(trim($linha) != "") {
            $perg = explode(";", trim($linha));
            
            $pergunta .= "ID:" . $perg[0] . "<br>";
            $pergunta .= "Pergunta:" . $perg[1] . "<br>";
            $pergunta .= "1) " . $perg[2] . "<br>";
            $pergunta .= "2) " . $perg[3] . "<br>";
            $pergunta .= "3) " . $perg[4] . "<br>";
            $pergunta .= "4) " . $perg[5] . "<br>";
            $pergunta .= "Resposta Correta:" . $perg[6] . "<br>";
        }
    }
    fclose($arq_perguntas);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Perguntas</title>
</head>
<body>
    <h1><center>Lista de Perguntas</center></h1>
    <?php 
        echo $pergunta; 
    ?>
    <br>
    <a href="criar_perguntas.php">Voltar</a>
</body>
</html>