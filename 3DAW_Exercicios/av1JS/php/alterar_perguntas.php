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

    if(file_exists($arquivo)) {
        $arq_alterar = fopen($arquivo, "r");
        $novo = "";

        while(($linha = fgets($arq_alterar)) !== false) {
            if(trim($linha) != "") {
                $alterar = explode(";", trim($linha));
                
                if($alterar[0] == $id) {
                    $linha_nova = $id . ";" . $pergunta . ";" . $questao1 . ";" . $questao2 . ";" . $questao3 . ";" . $questao4 . ";" . $resposta . "\n";
                    $novo .= $linha_nova;
                } else {
                    $novo .= $linha;
                }
            }
        }
        fclose($arq_alterar);

        $arq_perguntas = fopen($arquivo, "w");
        fwrite($arq_perguntas, $novo);
        fclose($arq_perguntas);

        echo "Pergunta alterada";
    } else {
        echo "Arquivo não encontrado.";
    }
}
?>