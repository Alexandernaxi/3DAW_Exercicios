<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $arq_perg = "../perguntas.txt";
    
    if(file_exists($arq_perg)) {
        $arq_excluir = fopen($arq_perg, "r");
        $novo = "";

        while(($linha = fgets($arq_excluir)) !== false) {
            if(trim($linha) != "") {
                $excluir = explode(";", trim($linha));
                
                if($excluir[0] != $id) {
                    $novo .= $linha;
                }
            }
        }
        fclose($arq_excluir);

        $arq_perguntas = fopen($arq_perg, "w");
        fwrite($arq_perguntas, $novo);
        fclose($arq_perguntas);
    }

    $arq_resp = "../respostas.txt";
    if(file_exists($arq_resp)) {
        $arq_respostas = fopen($arq_resp, "r");
        $novo_resp = "";

        while(($linha = fgets($arq_respostas)) !== false) {
            if(trim($linha) != "") {
                $excluir_resp = explode(";", trim($linha));
                
                if($excluir_resp[0] != $id) {
                    $novo_resp .= $linha;
                }
            }
        }
        fclose($arq_respostas);

        $arq_respostas_w = fopen($arq_resp, "w");
        fwrite($arq_respostas_w, $novo_resp);
        fclose($arq_respostas_w);
    }

    echo "Pergunta excluída";
}
?>