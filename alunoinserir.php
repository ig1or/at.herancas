<?php
require_once('classes/aluno.class.php');
require_once('conf.inc.php');

// Processa o formulário de inserção do aluno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $matricula = $_POST['matricula'];

  $aluno = new Aluno(0, $nome, $matricula);
  if ($aluno->inserirAluno()) {
    header('Location: index.php');
    exit();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inserir aluno</title>
</head>
<body>
  <h1>Inserir aluno</h1>
   <a href="aluno.php">Voltar</a>  
  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
    </div>

    <div>
      <label for="matricula">Matricula:</label>
      <input type="text" name="matricula" id="matricula">
    </div>

    <input type="submit" name="inserir" value="Inserir">
  </form>
</body>
</html>
