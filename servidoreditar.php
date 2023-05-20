
<?php
require_once('classes/servidor.class.php');
require_once('conf.inc.php');

// Verifica se o código do servidor foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do servidor no banco de dados
$servidor = new Servidor($codigo, '', '');
$dados = $servidor->listarServidor(1, $codigo);

// Verifica se o servidor foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização ou exclusão do servidor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['excluir'])) {
    if ($servidor->excluirServidor()) {
      header('Location: index.php');
      exit();
    }
  } else {
    $nome = $_POST['nome'];
    $salario = $_POST['salario'];

    $servidor->setNome($nome);
    $servidor->setSalario($salario);

    if ($servidor->editarServidor()) {
      header('Location: index.php');
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar e Excluir servidor</title>
</head>
<body>
  <h1>Editar e Excluir Livro</h1>
<a href="servidor.php"><h3>Voltar</h3></a>
  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo $dados[0]['nome'] ?>">
    </div>

    <div>
      <label for="salario">Salario:</label>
      <input type="text" name="salario" id="salario" value="<?php echo $dados[0]['salario'] ?>">
    </div>

    <input type="submit" name="salvar" value="Salvar">
    <input type="submit" name="excluir" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este servidor?');">
  </form>
</body>
</html>
