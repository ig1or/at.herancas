<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
</head>
<body>
<button type="button" class="btn btn-dark"> <a href="index.php"><h2>Voltar</h2></a></button>
<a href="alunoinserir.php"><h2>Inserir um novo Aluno</h2></a>

</body>
</html>
<?php
echo "<h1>Lista de Alunos:<h1>";
require_once('classes/aluno.class.php');
require_once('conf.inc.php');

$aluno = new Aluno(0, '', '');
$alunos = $aluno->listarAluno();

foreach ($alunos as $a) {
  echo '<p>';
  echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['matricula'] . ' ';
  echo '<a href="editaraluno.php?codigo=' . $a['codigo'] . '">Editar|</a>';
  echo '<a href="editaraluno.php?codigo=' . $a['codigo'] . '">Excluir|</a>';

  echo '</p>';
}

?>
