
<?php
require_once('classes/usuario.class.php');
require_once('conf.inc.php');

// Verifica se o código do usu$usuario foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do usu$usuario no banco de dados
$usuario = new Usuario($codigo, '', '', '');
$dados = $usuario->listar(1, $codigo);

// Verifica se o usu$usuario foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização ou exclusão do usu$usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['excluir'])) {
    if ($usuario->excluir()) {
      header('Location: index.php');
      exit();
    }
  } else {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];


    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setEndereco($endereco);

    if ($usuario->editar()) {
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
  <title>Editar e Excluir usuario</title>
</head>
<body>
  <h1>Editar e Excluir usu$usuario</h1>
   <a href="usuario.php">Voltar</a>  
  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo $dados[0]['nome'] ?>">
    </div>

    <div>
      <label for="senha">Senha:</label>
      <input type="text" name="senha" id="senha" value="<?php echo $dados[0]['senha'] ?>">
    </div>

    <div>
      <label for="endereco">Endereço:</label>
      <input type="text" name="endereco" id="endereco" value="<?php echo $dados[0]['endereco'] ?>">
    </div>

    <input type="submit" name="salvar" value="Salvar">
    <input type="submit" name="excluir" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este usuario?');">
  </form>
</body>
</html>
