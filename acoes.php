<?php 
session_start();
require 'conexao.php';
if(isset($_POST['create_usuario'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash( trim($_POST['senha']), PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
        header('Location: index.php'); 
        exit;
    } else {
        $_SESSION['mensagem'] = "Usuário não cadastrado!";
        header('Location: index.php');
        exit;
    }
}

if(isset($_POST['update_usuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $sql = "UPDATE usuarios SET nome='$nome', email='$email'";

    if(!empty($senha)){
        $sql .= ", senha='".password_hash($senha, PASSWORD_DEFAULT)."'";
    }

    $sql .= " WHERE id='$usuario_id'";

    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = "Usuário atualizado com sucesso!";
        header('Location: index.php'); 
        exit;
    } else {
        $_SESSION['mensagem'] = "Usuário não atualizado!";
        header('Location: index.php');
        exit;
    }
}

if(isset($_POST['delete_usuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

    $sql = "DELETE FROM usuarios WHERE id='$usuario_id'";
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = "Usuário excluído com sucesso!";
        header('Location: index.php'); 
        exit;
    } else {
        $_SESSION['mensagem'] = "Usuário não excluído!";
        header('Location: index.php');
        exit;
    }

}
?>