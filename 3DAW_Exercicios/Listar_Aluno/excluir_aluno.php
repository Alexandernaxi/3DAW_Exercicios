<?php
$nome = "";
$email = "";
$matricula = "";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $matricula = $_POST['matricula'];
    $excluir = $_POST['excluir'];
    $aluno = "";

    if ($excluir == "sim") {
        $arqAluno = fopen("Registro_Aluno.txt", "r");
        while (($linha = fgets($arqAluno)) !== false) {
            $arqExcluir = explode(";", $linha);

            if ($arqExcluir[0] == $nome) {
                $msg = "Aluno excluido";
            } else {
                $aluno = $aluno . $linha;
            }
        }
        fclose($arqAluno);

        $arqAluno = fopen("Registro_Aluno.txt", "w");
        fwrite($arqAluno, $aluno);
        fclose($arqAluno);
    }
}
?>
<title>Excluir Aluno</title>

    <center><h1>Excluir aluno</h1></center>

    Nome: <?php echo $nome; ?><br>
    Email: <?php echo $email; ?><br>
    Matricula: <?php echo $matricula; ?><br>

    <h4><br>Excluir Aluno?</h4>

    <form action="excluir_aluno.php" method="POST">
        <input type="hidden" name="nome" value="<?php echo $nome; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
        <input type="submit" value="sim" name="excluir">
    </form>

<a href="listar_aluno.php">Retornar</a>
<p><?php echo $msg; ?></h3></p>