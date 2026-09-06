<?php
    $nome="";
    $email="";
    $matricula="";

    if(file_exists("Registro_Aluno.txt")) {
        $arqListar = fopen("Registro_Aluno.txt", "r")or die("Não foi possível abrir o arquivo.");
?>
        <center><h1>Listagem de Alunos</h1></center><br>

        <center>
            <table border="2">
                <tr>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Matricula</td>
                </tr>
        </center>
<?php
        while(($linha = fgets($arqListar)) !== false) {
            $info = explode(";", $linha);
            $nome = $info[0];
            $email = $info[1];
            $matricula = $info[2];
?>
        <center>
            <table border="2">
            <tr>
                <td><?php echo $nome; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $matricula; ?></td>
                <td>
                <form action="alterar_aluno.php" method="POST">
                    <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
                    <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="submit" value="Alterar" name="alt">
                </form>
                </td>

                <td>
                <form action="excluir_aluno.php" method="POST">
                    <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                    <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="submit" value="Excluir" name="exc">
                </form>
                </td>
            </tr>
            </table>
        </center>
<?php
        }
    }
    else {
        echo "Não foi possível abrir ou arquivo ou não existe.";
    }
    fclose($arqListar);
?>

<title>Listar Alunos</title>
<a href="registro_aluno.php"><h3>Retornar</h3></a>