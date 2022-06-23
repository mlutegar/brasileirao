<?php 
    include('config.php');
    require_once('repository/JogadorRepository.php');
    
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
?>
    
<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de jogadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Equipe</th>
                    <th>Idade</th>
                    <th>Data cadastro</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(fnLocalizaJogadorPorNome($nome) as $jogador): ?>
                <tr>
                    <td><?= $jogador->id ?></td>
                    <td><?= $jogador->nome ?></td>
                    <td><?= $jogador->equipe ?></td>
                    <td><?= $jogador->idade ?></td>
                    <td><?= $jogador->created_at ?></td>
                    <td><a href="formulario-edita-jogador.php?id=<?= $jogador->id?>">Editar</a></td>
                    <td><a onclick="return confirm('Deseja realmente excluir?');" href="excluirJogador.php?id=<?= $jogador->id ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <?php if(isset($notificacao)) : ?>
            <tfoot>
                <tr>
                <td colspan="7"><?= $_COOKIE['notify'] ?></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
    <?php include("rodape.php"); ?>
  </body>
</html>