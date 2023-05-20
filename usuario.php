<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
<button type="button" class="btn btn-dark"> <a href="index.php"><h2>Voltar</h2></a></button><br>
 <a href="usuarioinserir.php"><h2>Inserir um Novo Usuario</h2></a>

</body>
</html>
<?php
echo "<h1>Lista de Usuarios:<h1>";
require_once('classes/usuario.class.php');
require_once('conf.inc.php');

$usuario = new Usuario(0,'', '', '');
$usuarios = $usuario->listar();

foreach ($usuarios as $a) {
  echo '<p>';
  echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['senha'] . ' - ' . $a['endereco'].'';
  echo '<a href="usuarioeditar.php?codigo=' . $a['codigo'] . '">Editar|</a>';
  echo '<a href="usuarioeditar.php?codigo=' . $a['codigo'] . '">Excluir|</a>';
 
  echo '</p>';
}
?>
