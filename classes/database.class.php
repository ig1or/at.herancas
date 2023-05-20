<?php

require_once('conf.inc.php');

class Database {
    protected $pdo;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=heranca";
        $user = "root";
        $password = "";

        try {
            $this->pdo = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            exit();
        }
    }

    public function getCodigo() {
        return $this->codigo;
    }
    
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getSenha() {
        return $this->senha;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function getEndereco() {
        return $this->endereco;
    }
    
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getSalario() {
        return $this->salario;
      }
    
      public function setSalario($salario) {
        $this->salario = $salario;
      }

      public function getMatricula() {
        return $this->matricula;
      }
    
      public function setMatricula($matricula) {
        $this->matricula = $matricula;
      }
      

      // Usuarios:
    public function inserir() {
        $sql = 'INSERT INTO usuario (codigo, nome, senha, endereco) VALUES (:codigo, :nome, :senha, :endereco)';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':senha', $this->getSenha());
        $comando->bindValue(':endereco', $this->getEndereco());

        try {
            $comando->execute();
            echo "Usuário inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir usuário: " . $e->getMessage();
        }
    }

    public function excluir() {
        $sql = 'DELETE FROM usuario WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());

        if ($comando->execute()) {
            echo "Usuário excluído com sucesso!";
        } else {
            echo "Erro ao excluir usuário!";
        }
    }

    public function editar() {
        $sql = 'UPDATE usuario SET nome = :nome, senha = :senha, endereco = :endereco WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':senha', $this->getSenha());
        $comando->bindValue(':endereco', $this->getEndereco());

        try {
            $comando->execute();
            echo "Usuário atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar usuário: " . $e->getMessage();
        }
    }

    public function listar($tipo = 0, $info = '') {
        $sql = 'SELECT * FROM usuario';

        switch ($tipo) {
            case 1:
                $sql .= ' WHERE codigo = :info';
                break;
            case 2:
                $sql .= ' WHERE nome = :info';
                break;
            case 3:
                $sql .= ' WHERE senha = :info';
                break;
            case 4:
                $sql .= ' WHERE endereco = :info';
                break;
            default:
                break;
        }

        $comando = $this->pdo->prepare($sql);

        if ($tipo) {
            $comando->bindValue(':info', $info);
        }

        if ($comando->execute()) {
            return $comando->fetchAll();
        } else {
            echo 'Erro ao listar usuários!';
        }

        return array();
    }

    // Professores:

    public function inserirProfessor() {
        $sql = 'INSERT INTO professor (codigo, nome, salario) VALUES (:codigo, :nome, :salario)';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':salario', $this->getSalario());
        

        try {
            $comando->execute();
            echo "Professor inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir Professor: " . $e->getMessage();
        }
    }

    public function excluirProfessor() {
        $sql = 'DELETE FROM professor WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());

        if ($comando->execute()) {
            echo "Professor excluído com sucesso!";
        } else {
            echo "Erro ao excluir Professor!";
        }
    }

    public function editarProfessor() {
        $sql = 'UPDATE professor SET nome = :nome, salario = :salario WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':salario', $this->getSalario());
    

        try {
            $comando->execute();
            echo "Professor atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar professor: " . $e->getMessage();
        }
    }

    public function listarProfessor($tipo = 0, $info = '') {
        $sql = 'SELECT * FROM professor';

        switch ($tipo) {
            case 1:
                $sql .= ' WHERE codigo = :info';
                break;
            case 2:
                $sql .= ' WHERE nome = :info';
                break;
            case 3:
                $sql .= ' WHERE salario = :info';
                break;
            default:
                break;
        }

        $comando = $this->pdo->prepare($sql);

        if ($tipo) {
            $comando->bindValue(':info', $info);
        }

        if ($comando->execute()) {
            return $comando->fetchAll();
        } else {
            echo 'Erro ao listar professores!';
        }

        return array();
    }

    // Servidores:

    public function inserirServidor() {
        $sql = 'INSERT INTO servidor (codigo, nome, salario) VALUES (:codigo, :nome, :salario)';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':salario', $this->getSalario());
        

        try {
            $comando->execute();
            echo "Servidor inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir Servidor: " . $e->getMessage();
        }
    }

    public function excluirServidor() {
        $sql = 'DELETE FROM servidor WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());

        if ($comando->execute()) {
            echo "Servidor excluído com sucesso!";
        } else {
            echo "Erro ao excluir Servidor!";
        }
    }

    public function editarServidor() {
        $sql = 'UPDATE servidor SET nome = :nome, salario = :salario WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':salario', $this->getSalario());
    

        try {
            $comando->execute();
            echo "Servidor atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar Servidor: " . $e->getMessage();
        }
    }

    public function listarServidor($tipo = 0, $info = '') {
        $sql = 'SELECT * FROM servidor';

        switch ($tipo) {
            case 1:
                $sql .= ' WHERE codigo = :info';
                break;
            case 2:
                $sql .= ' WHERE nome = :info';
                break;
            case 3:
                $sql .= ' WHERE salario = :info';
                break;
            default:
                break;
        }

        $comando = $this->pdo->prepare($sql);

        if ($tipo) {
            $comando->bindValue(':info', $info);
        }

        if ($comando->execute()) {
            return $comando->fetchAll();
        } else {
            echo 'Erro ao listar Servidores!';
        }

        return array();
    }

     // Alunos:

     public function inserirAluno() {
        $sql = 'INSERT INTO aluno (codigo, nome, matricula) VALUES (:codigo, :nome, :matricula)';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':matricula', $this->getMatricula());
        

        try {
            $comando->execute();
            echo "Aluno inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir Aluno: " . $e->getMessage();
        }
    }

    public function excluirAluno() {
        $sql = 'DELETE FROM aluno WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());

        if ($comando->execute()) {
            echo "Aluno excluído com sucesso!";
        } else {
            echo "Erro ao excluir Aluno!";
        }
    }

    public function editarAluno() {
        $sql = 'UPDATE aluno SET nome = :nome, matricula = :matricula WHERE codigo = :codigo';
        $comando = $this->pdo->prepare($sql);

        $comando->bindValue(':codigo', $this->getCodigo());
        $comando->bindValue(':nome', $this->getNome());
        $comando->bindValue(':matricula', $this->getMatricula());
    

        try {
            $comando->execute();
            echo "Aluno atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar Aluno: " . $e->getMessage();
        }
    }

    public function listarAluno($tipo = 0, $info = '') {
        $sql = 'SELECT * FROM aluno';

        switch ($tipo) {
            case 1:
                $sql .= ' WHERE codigo = :info';
                break;
            case 2:
                $sql .= ' WHERE nome = :info';
                break;
            case 3:
                $sql .= ' WHERE matricula = :info';
                break;
            default:
                break;
        }

        $comando = $this->pdo->prepare($sql);

        if ($tipo) {
            $comando->bindValue(':info', $info);
        }

        if ($comando->execute()) {
            return $comando->fetchAll();
        } else {
            echo 'Erro ao listar Alunos!';
        }

        return array();
    }
    }