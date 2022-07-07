<?php 
    include('config.php');
    require_once('repository/JogadorRepository.php');

    $id = $_SESSION['id'];
    $jogador = fnLocalizaJogadorPorId($id);
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Edita Jogador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Edição de Jogador</legend>
            <form action="editaJogador.php" method="post" class="form">
            <div class="card col-4 offset-4 text-center">
                    <img src="<?= $jogador->foto ?>" id="avatarId" class="rounded" alt="foto do usuário">
                </div>
                <div class="mb-3 form-group">
                    <label for="fotoId" class="form-label">Foto</label>
                    <input type="file" name="foto" id="fotoId" class="form-control">
                    <div id="helperFoto" class="form-text">Importe a foto</div>
                </div>
                <div>
                    <input type="hidden" name="idJogador" id="jogadorId" value="<?= $jogador->id ?>"> 
                </div>
                <div class="mb-3 form-group">
                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome" value="<?= $jogador->nome ?>"> 
                    <div id="helperNome" class="form-text">Informe o nome do jogador completo</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="equipeId" class="form-label">Equipe</label>
                    <input type="equipe" name="equipe" id="equipeId" class="form-control" placeholder="Informe a equipe" value="<?= $jogador->equipe ?>">
                    <div id="helperequipe" class="form-text">Informe a equipe</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="idadeId" class="form-label">Idade</label>
                    <input type="text" name="idade" id="idadeId" class="form-control" placeholder="Informe a idade" value="<?= $jogador->idade ?>"> 
                    <div id="helperidade" class="form-text">Informe a idade</div>
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
            </form>
        </fieldset>
    </div>
    <?php include("rodape.php"); ?>
    <script src="js/base64.js"></script>
  </body>
</html>