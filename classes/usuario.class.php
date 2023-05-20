<?php
require_once('conf.inc.php');
require_once('classes/database.class.php');

class Usuario extends Database {
    protected $codigo;
    protected $nome;
    protected $senha;
    protected $endereco;

    public function __construct($codigo, $nome, $senha, $endereco) {
        parent::__construct();
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->endereco = $endereco;
    }

    public function getUsuarioByCodigo($codigo) {
      $usuarios = $this->listar(1, $codigo);
  
      if (!empty($usuarios)) {
          return $usuarios[0];
      }
  
      return null;
  }
  
  public function getUsuarioByNome($nome) {
      $usuarios = $this->listar(2, $nome);
  
      if (!empty($usuarios)) {
          return $usuarios[0];
      }
  
      return null;
  }
  
  public function getUsuarioBySenha($senha) {
      $usuarios = $this->listar(3, $senha);
  
      if (!empty($usuarios)) {
          return $usuarios[0];
      }
  
      return null;
  }
  
  public function getUsuarioByEndereco($endereco) {
      $usuarios = $this->listar(4, $endereco);
  
      if (!empty($usuarios)) {
          return $usuarios[0];
      }
  
      return null;
  }
}
?>
