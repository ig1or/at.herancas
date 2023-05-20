<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor</title>
</head>
<body>
<button type="button" class="btn btn-dark"> <a href="index.php"><h2>Voltar</h2></a></button><br>
 <a href="professorinserir.php"><h2>Inserir um novo Professor</h2></a>

</body>
</html>
<?php
echo "<h1>Lista de Professores:<h1>";
require_once('classes/professor.class.php');
require_once('conf.inc.php');


$professor = new Professor(0,'','','');
$professores = $professor->listarProfessor();

foreach ($professores as $a) {
  echo '<p>';
  echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['salario'] .'';
  echo '<a href="professoreditar.php?codigo=' . $a['codigo'] . '">Editar|</a>';
  echo '<a href="professoreditar.php?codigo=' . $a['codigo'] . '">Excluir|</a>';


  echo '</p>';

  // echo '<a href="professorinserir.php?codigo=' . $a['codigo'] . '">Inserir Aluno|</a>';
}
?>
