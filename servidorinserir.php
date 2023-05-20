<?php
require_once('classes/servidor.class.php');
require_once('conf.inc.php');

// Processa o formulário de inserção do usu$servidor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $salario = $_POST['salario'];



  $servidor = new Servidor(0, $nome, $salario);
  if ($servidor->inserirServidor()) {
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inserir servidor</title>
</head>
<body>
  <h1>Inserir servidor</h1>
   <a href="servidor.php">Voltar</a>  
  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
    </div>

    <div>
      <label for="salario">Salario:</label>
      <input type="text" name="salario" id="salario">
    </div>

    <input type="submit" name="inserir" value="Inserir">
  </form>
</body>
</html>
