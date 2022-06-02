<?php
    require_once('repository/JogadorRepository.php');

    $nome = filter_input(INPUT_POST, 'nomeJogador', FILTER_SANITIZE_SPECIAL_CHARS);
    $equipe = filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_EMAIL);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";
    if(fnAddJogador($nome, $equipe, $idade)) {
        $msg = "Sucesso ao adicionar o jogador do " . $equipe;
    } else {
        $msg = "Falha ao adicionar o jogador";
    }

    header("location: formulario-cadastro-jogador.php?notify={$msg}");
    exit;