
<?php
require_once('classes/professor.class.php');
require_once('conf.inc.php');

// Verifica se o código do usu$professor foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do usu$professor no banco de dados
$professor = new Professor($codigo, '', '','');
$dados = $professor->listarProfessor(1, $codigo);

// Verifica se o usu$professor foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização ou exclusão do usu$professor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['excluir'])) {
    if ($professor->excluirProfessor()) {
      header('Location: index.php');
      exit();
    }
  } else {
    $nome = $_POST['nome'];
    $salario = $_POST['salario'];

   

    $professor->setNome($nome);
    $professor->setSalario($salario);


   

    if ($professor->editarProfessor()) {
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
  <title>Editar e Excluir professor</title>
</head>
<body>
  <h1>Editar e Excluir professor</h1>
   <a href="professor.php">Voltar</a>  
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
    <input type="submit" name="excluir" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este professor?');">
  </form>
</body>
</html>
