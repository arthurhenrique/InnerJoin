<?php

include("config.php");

mysql_query('CREATE DATABASE IF NOT EXISTS banco') or die (mysql_error());


mysql_query('USE banco') or die (mysql_error());

mysql_query('CREATE TABLE IF NOT EXISTS funcionario (
  ID_CARTEIRA_TRAB int(11) NOT NULL AUTO_INCREMENT,
  DT_ADMISSAO date NOT NULL,
  DS_NOME varchar(80) NOT NULL,
  DS_EMAIL varchar(45) DEFAULT NULL,
  DS_FUNCAO varchar(45) NOT NULL,
  NM_CPF mediumtext NOT NULL,
  PRIMARY KEY (ID_CARTEIRA_TRAB)
) ') or die (mysql_error());

mysql_query('CREATE TABLE IF NOT EXISTS telefone (
  ID_TELEFONE int(11) NOT NULL AUTO_INCREMENT,
  ID_CARTEIRA_TRAB int(11) NOT NULL,
  DS_TELEFONE varchar(45) NOT NULL,
  PRIMARY KEY (ID_TELEFONE)
)') or die (mysql_error());

mysql_query("INSERT INTO funcionario (ID_CARTEIRA_TRAB, DT_ADMISSAO, DS_NOME, DS_EMAIL, DS_FUNCAO, NM_CPF) VALUES
(1, '0000-00-00', 'ARTHUR HENRIQUE', 'ARTHUR@ARTHUR.COM', 'ADM', '42515728820'),
(2, '2005-12-11', 'JUCAS', 'JUCAS@JUCAS.com', 'OPE', '111111111')") or die (mysql_error());

mysql_query("INSERT INTO telefone (ID_TELEFONE, ID_CARTEIRA_TRAB, DS_TELEFONE) VALUES
(1, 1, '33721771'),
(2, 1, '981127858'),
(3, 2, '33775544')") or die (mysql_error()); 

echo "<br>banco criado";
?>