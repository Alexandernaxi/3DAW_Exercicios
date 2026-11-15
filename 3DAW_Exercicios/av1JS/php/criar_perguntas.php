<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $pergunta = $_GET["pergunta"];
    $questao1 = $_GET["questao1"];
    $questao2 = $_GET["questao2"];
    $questao3 = $_GET["questao3"];
    $questao4 = $_GET["questao4"];
    $resposta = $_GET["resposta"];

    $arquivo = "../perguntas.txt";
    $linha = $id . ";" . $pergunta . ";" . $questao1 . ";" . $questao2 . ";" . $questao3 . ";" . $questao4 . ";" . $resposta . "\n";

    if(!file_exists($arquivo)) {
        $arq_perguntas = fopen($arquivo, "w") or die("Não foi possível criar o arquivo.");
        fwrite($arq_perguntas, $linha);
        fclose($arq_perguntas);
    } else {
        $arq_perguntas = fopen($arquivo, "a") or die("Não foi possível abrir o arquivo.");
        fwrite($arq_perguntas, $linha);
        fclose($arq_perguntas);
    }

    echo "Pergunta cadastrada";
}
?>