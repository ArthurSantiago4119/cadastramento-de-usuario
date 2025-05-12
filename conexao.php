<?php
define('HOST', '127.0.0.1');// Colocar o host do banco de dados no espaço entre aspas
define('USUARIO', 'root');// Colocar o usuário do banco de dados no espaço entre aspas
define('SENHA', 'Ca1109@#Ma1715');// Colocar a senha do banco de dados no espaço entre aspas
define('DB', 'cadastro');// Colocar o nome do banco de dados no espaço entre aspas

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Erro ao conectar ao banco de dados!');
?>