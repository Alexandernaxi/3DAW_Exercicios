<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $v1 = $_GET["n1"];
    $v2 = $_GET["n2"];
    $op = $_GET["op"];

    switch ($op) {
        case '+':
            $resultado = $v1 + $v2;
            break;
        case '-':
            $resultado = $v1 - $v2;
            break;
        case '*':
            $resultado = $v1 * $v2;
            break;
        case '/':
            $resultado = $v1 / $v2;
            break;
        default:
            $resultado = "Não foi possível realizar a operaçao.";
            break;
    }

    echo json_encode(["resultado" => $resultado]);
}
?>
