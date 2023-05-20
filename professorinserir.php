<?php
require_once('classes/professor.class.php');
require_once('conf.inc.php');

// Processa o formulário de inserção do usu$professor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $salario = $_POST['salario'];

  $professor = new Professor(0, $nome, $salario);
  if ($professor->inserirProfessor()) {
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inserir professor</title>
</head>
<body>
  <h1>Inserir professor</h1>
   <a href="professor.php">Voltar</a>  
  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
    </div>

    <div>
      <label for="salario">Salário:</label>
      <input type="text" name="salario" id="salario">
    </div>

    <input type="submit" name="inserir" value="Inserir">
  </form>
</body>
</html>
