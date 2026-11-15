<?php
$listar_usuario = "";

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $arquivo = "../perguntas.txt";

    if(file_exists($arquivo)) {
        $arq_listar = fopen($arquivo, "r");

        while(($linha = fgets($arq_listar)) !== false) {
            if(trim($linha) != "") {
                $listar = explode(";", trim($linha));
                
                if($listar[0] == $id) {
                    $listar_usuario .= "ID: " . $listar[0] . "<br>";
                    $listar_usuario .= "Pergunta: " . $listar[1] . "<br>";
                    $listar_usuario .= "1) " . $listar[2] . "<br>";
                    $listar_usuario .= "2) " . $listar[3] . "<br>";
                    $listar_usuario .= "3) " . $listar[4] . "<br>";
                    $listar_usuario .= "4) " . $listar[5] . "<br>";        
                    break; 
                }
            }
        }
        fclose($arq_listar);
    }

    echo $listar_usuario;
}
?>