<?php
require_once('conf.inc.php');
require_once('classes/database.class.php');

class Aluno extends Database {
    protected $codigo;
    protected $nome;
    protected $matricula;
    

    public function __construct($codigo, $nome, $matricula) {
        parent::__construct();
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->matricula = $matricula;
    }

    public function getAlunoByCodigo($codigo) {
      $Alunos = $this->listarAluno(1, $codigo);
  
      if (!empty($Alunos)) {
          return $Alunos[0];
      }
  
      return null;
  }
  
  public function getAlunoByNome($nome) {
      $Alunos = $this->listarAluno(2, $nome);
  
      if (!empty($Alunos)) {
          return $Alunos[0];
      }
  
      return null;
  }
  
  public function getAlunoByMatricula($matricula) {
      $Alunos = $this->listarAluno(3, $matricula);
  
      if (!empty($Alunos)) {
          return $Alunos[0];
      }
  
      return null;
  }
}
?>
