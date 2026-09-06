<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST['matricula'];
    $alterar = $_POST['alterar'] ?? "";

    if ($alterar == "sim") {
        $novoNome = $_POST['nome'];
        $novoEmail = $_POST['email'];
        $novaMatricula = $_POST['nova_matricula'];
        $aluno = "";

        $arqAluno = fopen("Registro_Aluno.txt", "r");
        while (($linha = fgets($arqAluno)) !== false) {
            $arqAlterar = explode(";", trim($linha));

            if ($arqAlterar[2] == $matricula) {
                $linhaAtualizada = $novoNome . ";" . $novoEmail . ";" . $novaMatricula . "\n";
                $aluno = $aluno . $linhaAtualizada;
                $msg = "Aluno atlerado";
            } else {
                $aluno = $aluno . $linha;
            }
        }
        fclose($arqAluno);

        $arqAluno = fopen("Registro_Aluno.txt", "w");
        fwrite($arqAluno, $aluno);
        fclose($arqAluno);
    } else {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
    }
}
?>

<title>Alterar Aluno</title>
<center><h1>Alterar Aluno</h1></center>

    <form action="alterar_aluno.php" method="POST">
        <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
        <input type="hidden" name="alterar" value="sim">
        
            Nome:<input type="text" name="nome" value="<?php echo $nome; ?>"><br>
            Email:<input type="text" name="email" value="<?php echo $email; ?>"><br>
            Matrícula:<input type="text" name="nova_matricula" value="<?php echo $matricula; ?>"><br>

        <input type="submit" value="Salvar Alterações">
    </form>

<p><?php echo $msg ?></p>
<a href="listar_aluno.php">Cancelar e Retornar</a>
