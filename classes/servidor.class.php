<?php
require_once('conf.inc.php');
require_once('classes/database.class.php');

class Servidor extends Database {
    protected $codigo;
    protected $nome;
    protected $salario;
    

    public function __construct($codigo, $nome, $salario) {
        parent::__construct();
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function getServidorByCodigo($codigo) {
      $servidores = $this->listarServidor(1, $codigo);
  
      if (!empty($servidores)) {
          return $servidores[0];
      }
  
      return null;
  }
  
  public function getServidorByNome($nome) {
      $servidores = $this->listarServidor(2, $nome);
  
      if (!empty($servidores)) {
          return $servidores[0];
      }
  
      return null;
  }
  
  public function getServidorBySalario($salario) {
      $servidores = $this->listarServidor(3, $salario);
  
      if (!empty($servidores)) {
          return $servidores[0];
      }
  
      return null;
  }
}
?>
