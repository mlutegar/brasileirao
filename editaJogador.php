<?php
    require_once('repository/JogadorRepository.php');
    
    $id = filter_input(INPUT_POST, 'idJogador', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $equipe = filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_EMAIL);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";
    if(fnUpdateJogador($id, $nome, $equipe, $idade)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }

    #
    header("location: formulario-edita-jogador.php?notify={$msg}&id=$id");
    exit;