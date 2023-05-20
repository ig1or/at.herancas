<?php
require_once('classes/usuario.class.php');
require_once('conf.inc.php');

// Processa o formulário de inserção do usu$usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $senha = $_POST['senha'];
  $endereco = $_POST['endereco'];


  $usuario = new Usuario(0, $nome, $senha, $endereco);
  if ($usuario->inserir()) {
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inserir usuario</title>
</head>
<body>
  <h1>Inserir usuario</h1>
   <a href="usuario.php">Voltar</a>  
  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
    </div>

    <div>
      <label for="senha">Senha:</label>
      <input type="text" name="senha" id="senha">
    </div>

    <div>
      <label for="endereco">Endereço:</label>
      <input type="text" name="endereco" id="endereco">
    </div>

    <input type="submit" name="inserir" value="Inserir">
  </form>
</body>
</html>
