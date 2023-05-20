
-- tabela Aluno
CREATE TABLE `heranca`.`aluno` (
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `matriculal` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`));


-- exemplo:
INSERT INTO `classes`.`aluno` (`codigo`, `nome`, `matricula`) VALUES ('2', 'emanuel', '123');

-- tabela usuario
CREATE TABLE `heranca`.`usuario` (
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  `endereco` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`));

  -- exemplo:

  INSERT INTO `heranca`.`usuario` (`codigo`, `nome`, `senha`, `endereco`) VALUES ('1', 'igor', '123', 'rua tal');

CREATE TABLE `heranca`.`servidor` (
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `salario` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`));

-- exemplo:
INSERT INTO `heranca`.`servidor` (`codigo`, `nome`, `salario`) VALUES ('1', 'marcela', '1111');

CREATE TABLE `heranca`.`professor` (
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `salario` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`));

-- exemplo 
INSERT INTO `heranca`.`professor` (`codigo`, `nome`, `salario`) VALUES ('1', 'igor', '1000');
