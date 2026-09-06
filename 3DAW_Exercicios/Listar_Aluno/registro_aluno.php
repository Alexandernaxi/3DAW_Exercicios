<?php
//Pegando as informações do aluno
if ($_SERVER['REQUEST_METHOD']=='POST') {
   $nome = $_POST["nome"];
   $email = $_POST["email"];
   $matricula = $_POST["matricula"];
   $msg = "";
   echo "Nome: " . $nome . "; Email: " . $email . "; Matrícula: " . $matricula;
  
   //Criando o arquivo de texto caso não exista
   if (!file_exists("Registro_Aluno.txt")) {
      $arqRegistro = fopen("Registro_Aluno.txt", "w")or die("Não foi possível criar o arquivo.");
      $linha = $nome . "; " . $email . "; " . $matricula . "\n";
      fwrite($arqRegistro,$linha);
      fclose($arqRegistro);
   }
   else
      {
   //Caso o arquivo já exista, adiciona ao arquivo as novas informações dos alunos registrados
   $arqRegistro = fopen("Registro_Aluno.txt", "a")or die("Não foi possível abrir o arquivo.");
   $linha = $nome . "; " . $email . "; " . $matricula . "\n";
   fwrite($arqRegistro, $linha);
   fclose($arqRegistro);
   $msg = "Aluno registrado com sucesso";
      }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Aluno</title>
</head>
<body>
   <!--Título da Página-->
   <h1><center>Registar aluno</center></h1>

   <!--Registro de aluno-->
   <form action="registro_aluno.php" method="POST">
       Nome: <input type="text" name="nome"><br>
       Email: <input type="text" name="email"><br>
       Matricula: <input type="text" name="matricula"><br>
       <input type="submit" value="Registar Aluno">
   </form>

   <a href="listar_aluno.php"><h3>Listar Aluno</h3></a>

   <!--Mensagem caso dê tudo certo-->
   <p><?php echo $msg ?></p>
</body>
</html>