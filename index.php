<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
      <?php include('mensagem.php')?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"> 
              <h4> LIsta de usuários <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar usuário</a>
            </h4>
          </div>
          <div class="card-bordy">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM usuarios";
                $usuarios = mysqli_query($conexao, $sql);
                if(mysqli_num_rows($usuarios) > 0){
                  foreach($usuarios as $usuario){
                ?>
                <tr>
                  <td><?=$usuario['id']?></td>
                  <td><?=$usuario['nome']?></td>
                  <td><?=$usuario['email']?></td>
                  <td>
                  <a href="usuario-view.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                  <a href="usuario-edit.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                  <form action="acoes.php" method="POST" class="d-inline">
                    <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sm"><span class="bi-trash3-fill"></span>&nbsp;Excluir</button>
                  </form>
                  </td>
                </tr>
                <?php
                }
                } else{
                echo "<h5>Nenhum usuário encontrado</h5";
              }
              ?>
              </tbody>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>
