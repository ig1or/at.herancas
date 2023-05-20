<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salario</title>
</head>
<body>
<button type="button" class="btn btn-dark"> <a href="index.php"><h2>Voltar</h2></a></button>
 <a href="servidorinserir.php"><h2>Inserir um Novo servidor</h2></a>
</body>
</html>
<?php
    //listagem
// require_once('biblioteca\aluno.class.php');
// require_once 'conf.inc.php';

//listagem
// $aluno = new Aluno(0, '', '');
// $alunos = $aluno->listar();
// foreach ($alunos as $a) {
//   echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['matricula'] . '<br>';
// }

    // listagem, editar e excluir
// require_once('biblioteca/aluno.class.php');
// require_once('conf.inc.php');

// $aluno = new Aluno(0, '', '');
// $alunos = $aluno->listar();

// foreach ($alunos as $a) {
//   echo '<p>';
//   echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['matricula'] . ' ';
//   echo '<a href="editar.php?codigo=' . $a['codigo'] . '">Editar</a>';
//   echo '<a href="editar.php?codigo=' . $a['codigo'] . '">Excluir</a>';
//   echo '</p>';
// }
echo "<h1>Lista de Servidores<h1>";
require_once('classes/servidor.class.php');
require_once('conf.inc.php');

$servidor = new Servidor(0, '', '');
$servidores = $servidor->listarServidor();

foreach ($servidores as $a) {
  echo '<p>';
  echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['salario'] . ' ';
  echo '<a href="servidoreditar.php?codigo=' . $a['codigo'] . '">Editar|</a>';
  echo '<a href="servidoreditar.php?codigo=' . $a['codigo'] . '">Excluir|</a>';
 
  echo '</p>';
}

?>
