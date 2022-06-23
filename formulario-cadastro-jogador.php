<?php include('config.php');?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Cadastro de Jogador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include('navbar.php');?>
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Cadastro do Jogador</legend>
            <form action="registraJogador.php" method="post" class="form">
                <div class="mb-3 form-group">
                    <label for="nomeId" class="form-label">Nome do jogador</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome do jogador">
                </div>
                <div class="mb-3 form-group">
                    <label for="equipeId" class="form-label">Equipe</label>
                    <input type="text" name="equipe" id="equipeId" class="form-control" placeholder="Informe a equipe">
                </div>
                <div class="mb-3 form-group">
                    <label for="idadeId" class="form-label">Idade</label>
                    <input type="number" name="idade" id="idadeId" class="form-control" placeholder="Informe a idade">
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
            </form>
        </fieldset>
    </div>
    <?php include("rodape.php");?>
  </body>
</html>