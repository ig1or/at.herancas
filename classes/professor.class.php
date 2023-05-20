<?php
require_once('conf.inc.php');
require_once('classes/database.class.php');

class Professor extends Database {
    protected $codigo;
    protected $nome;
    protected $salario;
    

    public function __construct($codigo, $nome, $salario) {
        parent::__construct();
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function getUsuarioByCodigo($codigo) {
      $professores = $this->listarProfessor(1, $codigo);
  
      if (!empty($professores)) {
          return $professores[0];
      }
  
      return null;
  }
  
  public function getUsuarioByNome($nome) {
      $professores = $this->listarProfessor(2, $nome);
  
      if (!empty($professores)) {
          return $professores[0];
      }
  
      return null;
  }
  
  public function getUsuarioBySalario($salario) {
      $professores = $this->listarProfessor(3, $salario);
  
      if (!empty($professores)) {
          return $professores[0];
      }
  
      return null;
  }
}
?>
