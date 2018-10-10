-- script para criar tabela em SQL


CREATE DATABASE crud;

CREATE OR REPLACE TABLE `crud`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  PRIMARY KEY (`idusuarios`));
