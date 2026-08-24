<?php
$v1 = $_GET["fnumber"];
$v2 = $_GET["lnumber"];
$op = $_GET["operação"];

switch ($op) {
    case '+';
        $result = $v1 + $v2;
        break;
    case '-';
        $result = $v1 - $v2;
        break;
    case '*';
        $result = $v1 * $v2;
        break;
    case '/';
        $result = $v1 / $v2;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php echo "<h1>Resultado da conta: $result</h1>"; ?>
</body>
</html>