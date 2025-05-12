<?php
define('HOST', '');// Colocar o host do banco de dados no espaço entre aspas
define('USUARIO', '');// Colocar o usuário do banco de dados no espaço entre aspas
define('SENHA', '');// Colocar a senha do banco de dados no espaço entre aspas
define('DB', '');// Colocar o nome do banco de dados no espaço entre aspas

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Erro ao conectar ao banco de dados!');
?>
